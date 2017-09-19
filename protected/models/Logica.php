<?php

/**
 * This is the model class for table "logica".
 *
 * The followings are the available columns in table 'logica':
 * @property integer $idLogica
 * @property string $axioma
 * @property string $conjetura
 * @property integer $estudiantes_idestudiantes
 *
 * The followings are the available model relations:
 * @property Estudiantes $estudiantesIdestudiantes
 * @property Reglas[] $reglases
 */
class Logica extends CActiveRecord {

    public $letras = 'a';
    public $resultado;
    public $derivacion;
    public $ident = 0;
    public $prueba = array();
    public $solucion = array();

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'logica';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('axioma, conjetura', 'required'),
            array('estudiantes_idestudiantes,resultado,ident', 'numerical', 'integerOnly' => true),
            array('axioma, conjetura,letras,derivacion', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idLogica, axioma, conjetura, estudiantes_idestudiantes', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'estudiantesIdestudiantes' => array(self::BELONGS_TO, 'Estudiantes', 'estudiantes_idestudiantes'),
            'reglases' => array(self::HAS_MANY, 'Reglas', 'Logica_idLogica'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idLogica' => 'Id Logica',
            'axioma' => 'Axioma',
            'conjetura' => 'Conjetura',
            'estudiantes_idestudiantes' => 'Estudiantes Idestudiantes',
            'letras' => 'Letras',
            'resultado' => 'Resultado',
            'derivacion' => 'derivacion',
            'prueba' => 'prueba',
            'solucion' => 'solucion',
            'ident' => 'identificador',
        );
    }

    public function seleccion($id) {
        echo $id;
        return $id;
    }

    public function aplicarReglas($id, $sum) {
        $regla = Reglas::model()->find("idreglas =:id_reglas", array(":id_reglas" => $id));
        $inicio = $regla->inicio;
        $fin = $regla->fin;
        $cadena = str_split($this->axioma);
        $alfabeto = $this->traerAlfabeto($cadena, $inicio);
//        CVarDumper::dump($alfabeto, 10, true);

        $traeTotalCambios = $this->revisionInicio($cadena, $inicio, $fin, $alfabeto);
        if (count($traeTotalCambios) == 0) {

            echo "<strong>Heads up!</strong> I'm a valuable information!.";
        } else {
            $cambio = $this->comparaInicioFin($inicio, $fin, $traeTotalCambios[0]);
            $this->solucion = $this->revisionFin($traeTotalCambios, $cadena, $cambio, $sum, $inicio, $alfabeto, $fin);
        }
        return $this->solucion;
    }

    public function traerAlfabeto($cadena, $inicio) {
        $prueba = array();
        $inicio = str_split($inicio);
        $simbolo = '@#~$%&/¬()=?¿+*^[]{},.-';
        foreach ($inicio as $value):
            $cont = 0;
            foreach ($cadena as $row):
                if ($row !== $value)
                    $cont += 1;
            endforeach;
            if (count($cadena) == $cont && in_array($value, $prueba) === false && strpos($simbolo, $value) === false):
                array_push($prueba, $value);
            endif;
        endforeach;

        return $prueba;
    }

    public function revisionFin($numero, $cadena, $fin, $sum, $inicio, $alfabeto, $final) {
        $solucion = array();
        $cambio = '';
        $x = '';
        $y = '';
        $aux = 0;
        $algo = str_split($inicio);
        $valor = array();
        $valorTotal = array();
        $interseccion = $this->unirAritmetica($algo, $final);
        $prueba = $this->tieneAlfabeto($alfabeto, $interseccion);
        $k = 0;
        if ($prueba != NULL) {


            for ($i = 0; $i < count($numero); $i++):
                if ($i + 1 < count($numero)):
                    $f = explode(" ", $numero[$i]);
                    for ($j = 0; $j < count($f); $j++):
                        if ($j + 1 < count($numero)):
                            $e = intval($f[$j] + 1);

                            if (intval($f[$j + 1]) != $e):
                                array_push($valor, intval($f[$j]) . " " . intval($f[$j + 1]));

                                break;
                            endif;
                        endif;
                    endfor;
                endif;
            endfor;

            for ($value = 0; $value < count($numero); $value++):
                $pal = explode(" ", $numero[$value]);
                $cont = 0;

                for ($i = 0; $i < count($cadena); $i++):
                    for ($j = 0; $j < count($pal); $j++):
                        if (intval($pal[$j]) == $i):
                            $cont += 1;
                            $aux = intval($pal[$j]);
                        endif;
                    endfor;
                endfor;
                if ($cont == count($pal)) {
                    $x = $this->obtenerXaxioma($cadena, $pal[0]);
                    $axioma = $this->obtenerCambioAlfabeto($cadena, $valor, $fin, $numero[$value]);
                    $y = $this->obtenerYaxioma($cadena, $aux);
                    array_push($solucion, array('regla' => $sum + 1, 'x' => $x, 'axioma' => $axioma, 'y' => $y));
                }

            endfor;
        } else {
            foreach ($numero as $value):
                $pal = explode(" ", $value);
                $cont = 0;
                for ($i = 0; $i < count($cadena); $i++):
                    for ($j = 0; $j < count($pal); $j++):
                        if (intval($pal[$j]) == $i):
                            $cont += 1;
                            $aux = intval($pal[$j]);
                        endif;
                    endfor;
                endfor;

                if ($cont == count($pal)) {
                    $x = $this->obtenerXaxioma($cadena, $pal[0]);
                    $axioma = $this->hacerCambio($fin);
                    $y = $this->obtenerYaxioma($cadena, $aux);
                    array_push($solucion, array('regla' => $sum + 1, 'x' => $x, 'axioma' => $axioma, 'y' => $y));
                }
            endforeach;
        }
        return $solucion;
    }

    public function obtenerCambioAlfabeto($cadena, $valor, $fin, $numero) {
        $prueba = '';
        for ($j = 0; $j < count($valor); $j++):
            $domain = strstr($numero, $valor[$j]);
            if ($domain !== false):
                $aux = explode(" ", $valor[$j]);
                $inicio = $aux[0];
                $final = $aux[1];
                for ($i = $inicio + 1; $i < $final; $i++):
                    $prueba .= $cadena[$i];
                endfor;
            endif;
        endfor;
        return $prueba;
    }

    public function hacerCambio($cambio) {
        $accion = '';
        for ($i = 0; $i < count($cambio); $i++):
            $accion .= $cambio[$i];
        endfor;
        return $accion;
    }

    public function obtenerXaxioma($cadena, $cambio) {
        $accion = '';
        for ($i = 0; $i < count($cadena); $i++):
            if ($i < intval($cambio)):
                $pal = explode(" ", $cadena[$i]);
                $accion .= $pal[0];
            endif;
        endfor;
        return $accion;
    }

    public function obtenerYaxioma($cadena, $cambio) {
        $accion = '';
//        CVarDumper::dump($cambio, 10, true);
        for ($i = 0; $i < count($cadena); $i++):
            if ($i > intval($cambio)):
                $pal = explode(" ", $cadena[$i]);
                $accion .= $pal[0];
            endif;
        endfor;
        return $accion;
    }

    public function comparaInicioFin($inicio, $fin, $numero) {
        $accion = array();
        $cadena = str_split($this->axioma);
        $value = explode(" ", $numero);
        $cadena2 = array();
        for ($i = 0; $i < count($value); $i++):
            array_push($cadena2, $cadena[intval($value[$i])]);
        endfor;
        $resultado = strpos($inicio, $cadena2[0]);
        $aux = count($cadena2) - 1;
        if ($aux > 0) {
            $resultado2 = strpos($inicio, $cadena2[$aux]);
            if ($resultado == $resultado2):

                $value = explode(" ", $inicio);
                $cont = 0;
                for ($i = $resultado; $i < strlen($inicio); $i++):
                    if ($inicio[$i] == $inicio[$resultado]):
                        $cont = $i;
                    endif;
                endfor;
                $resultado2 = $cont;
            endif;
        }else {
            $resultado2 = $resultado;
        }
        $cantidad = $this->obtieneCantidadY($resultado2, $inicio);
        $x = $this->obtieneXInicio($resultado, $inicio);
        $prueba = strlen($inicio) - 1;

        $y = $this->obtieneYInicio($fin, $inicio[$prueba]);
        for ($i = 0; $i < strlen($fin); $i++):
            if ($i > $x - 1 && $i < $y):
                array_push($accion, $fin[$i]);
            endif;

        endfor;

        //CVarDumper::dump($accion, 10, true);
        return $accion;
    }

    public function obtieneCantidadY($resultado, $inicio) {
        $accion = 0;
        for ($i = $resultado + 1; $i < strlen($inicio); $i++):
            $accion += 1;
        endfor;
        return $accion;
    }

    public function obtieneXInicio($resultado, $inicio) {
        $x = 0;
        for ($i = 0; $i < $resultado; $i++):
            $x += 1;
        endfor;
        return $x;
    }

    public function obtieneYInicio($resultado, $inicio) {
        $y = 0;
        $aux = strlen($resultado);
        $cadena = str_split($resultado);
        $y = strpos($resultado, $inicio);
        return $y;
    }

    public function revisionInicio($cadena, $inicio, $fin, $alfabeto) {
        $accion = array();
        $inicio2 = $inicio;
        $inicio = str_split($inicio);
        $numero = array();

        for ($i = 0; $i < count($cadena); $i++) {
            $cont = 0;
            foreach ($inicio as $resp) {

                if (strpos($cadena[$i], $resp) !== false) {
                    array_push($accion, $cadena[$i] . " " . $i);
                }
            }
        }
        $aritmetica = $this->verificaAritmetica($accion, $inicio, $fin, $inicio2);
        if (count($aritmetica) == 2) {
            //$reaccion = $this->revisionInicio2($accion, $inicio);
            $numero = $this->revisarAritmetica($accion, $inicio, $fin, $alfabeto);
        } else {
            $reaccion = $this->revisionInicio2($accion, $inicio);
            $numero = $this->traerInfo($accion, $reaccion);
        }
        return $numero;
    }

    public function revisarAritmetica($accion, $inicio, $fin, $aritmetica) {
        $prueba = array();
        $letras = array();
        $numero = array();
        //$reaccion = '0123456';
//        $accion = $inicio = str_split($reaccion);

        $interseccion = $this->unirAritmetica($inicio, $fin);
        $alfabeto = $this->tieneAlfabeto($aritmetica, $interseccion);
        $numCadena = count($interseccion) - count($alfabeto);

        $cantidad = intval(count($accion) / $numCadena);
        $value = explode(" ", $accion[0]);
        $pal = '';
        $num = '';
        $cont = 0;
        $aux = '';
        $cadena = $accion;
        $parecido = array();

        for ($i = 0; $i < count($accion); $i++):
            $aux .= $accion[$i];
            $algo = $this->prueba2($accion, $aux, $numCadena, $i, $a = $i + 1);
            array_push($prueba, $algo);
            $aux = '';
            $cont += 1;
        endfor;
        CVarDumper::dump($prueba, 10, true);
        $parecido = $this->traeParametros2($prueba, $interseccion, $alfabeto);

        return $parecido;
    }

    public function traeParametros2($cadena, $inicio, $alfabeto) {
        $prueba = array();
        $prueba2 = array();
        $cont = 0;
        $aux = '';
        $letras = '';
        $cons = $this->traerResultados($cadena);
        $inicio2 = $this->traerConsecutivo($inicio, $alfabeto);
        $letrasI = $this->traerLetraInicio($inicio2);
        $numeroI = $this->traerNumInicio($inicio2);
        $c = count($numeroI) - count($alfabeto);

        foreach ($cons as $value):
            $b = explode(" ", $value);
            $cont = intval($numeroI[0]);
            $aux = '';
            $letras = '';
            for ($i = 0; $i < count($b); $i++):
                if ($i % 2 == 0)
                    $letras .= $b[$i];
                else
                    $aux .= $b[$i] . " ";
            endfor;

            if ($letras == $letrasI):
                $a = 1;


                for ($j = 0; $j < count($numeroI); $j++):

                    if ($j + 1 < count($numeroI)):
                        $d = intval($numeroI[$j]) + 1;
                        $f = explode(" ", $aux);
                        $e = intval($f[$j] + 1);
                        if (intval($f[$j + 1]) == $e && intval($numeroI[$j + 1]) == $d && $f[$j + 1] != ''):
                            $a += 1;
                        endif;
                    endif;
                endfor;

                if ($a == $c):
                    array_push($prueba, $aux);
                endif;
            endif;
        endforeach;
        return $prueba;
    }

    public function traerLetraInicio($inicio) {
        $prueba = '';
        //$algo = implode(" ", $inicio);

        for ($i = 0; $i < count($inicio); $i++):
            $aux = explode(" ", $inicio[$i]);
            $prueba .= $aux[0];
        endfor;
        return $prueba;
    }

    public function traerNumInicio($inicio) {
        $prueba = array();
        $aux = explode(" ", $inicio[0]);
        $cont = $aux[1];
        for ($i = 0; $i < count($inicio); $i++):
            $aux = explode(" ", $inicio[$i]);
            array_push($prueba, $aux[1]);
        endfor;
        return $prueba;
    }

    public function traerConsecutivo($inicio, $alfabeto) {
        $prueba = array();
        $aux = 0;
        $a = implode(" ", $alfabeto);

        for ($i = 0; $i < count($inicio); $i++):
            for ($j = 0; $j < count($a); $j++):
                if ($a == $inicio[$i]):
                    $aux = 1;
                endif;
            endfor;
            if ($aux == 0)
                array_push($prueba, $inicio[$i]);
            $aux = 0;
        endfor;
//         CVarDumper::dump($prueba, 10, true);
        return $prueba;
    }

    public function traerResultados($cadena) {
        $prueba = array();
        foreach ($cadena as $row):
            foreach ($row as $value):
                array_push($prueba, $value);
            endforeach;
        endforeach;
        return $prueba;
    }

    public function prueba2($accion, $algo, $cadena, $i, $a) {
        $prueba = array();
        $alf = array();
        $aux = $algo;
        $aux2 = array();
        $cont = 1;
        $aux3 = '';

        for ($k = $i + 1; $k < count($accion); $k++):

            if (strlen($aux) < 4) {
                $aux .= " " . $accion[$k];
                $aux3 = $aux;
            }
//            CVarDumper::dump($accion[$k], 10, true);
//            CVarDumper::dump($aux3, 10, true);
            $cantidad = intval(strlen($aux) / $cadena);

            if ($cantidad - 1 < $cadena && $k + 1 < count($accion)) {
                $aux2 = $this->prueba3($accion, $aux3, $cadena, $k + 1, $a = $k + 1);
                if ($aux2 != NULL)
                    array_push($alf, $aux2);

                $cont + 1;
            }
            $aux = $algo;
        endfor;

//        CVarDumper::dump($accion, 10, true);
        foreach ($alf as $value):
            foreach ($value as $row):
                $aux4 = explode(" ", $row);
                $cont = count($aux4) - 1;
                for ($j = 0; $j < count($accion); $j++):
                    $ban = explode(" ", $accion[$j]);
                    if ($ban[1] > intval($aux4[$cont])) {
                        array_push($prueba, $row . " " . $accion[$j]);
                    }
                endfor;
            endforeach;
        endforeach;
        return $prueba;
    }

    public function prueba3($accion, $algo, $cadena, $i, $a) {
        $aux = $algo;
        $prueba = array();
        $cont = 3;
        for ($j = $i; $j < count($accion); $j++):

            $cantidad = intval(strlen($aux) / $cadena);

            if ($cadena > $cont) {

                $aux .= " " . $accion[$j];

                array_push($prueba, $aux);
                $cont++;
            } else {
                $aux = $algo;
                $cont = 3;
                $j -= 1;
            }
        endfor;
        return $prueba;
    }

    public function tieneAlfabeto($alfabeto, $predecesor) {
        $prueba = array();
        foreach ($alfabeto as $value):
            foreach ($predecesor as $row):
                $pal = explode(" ", $row);
                if ($pal[0] == $value):
                    array_push($prueba, $row);
                endif;
            endforeach;
        endforeach;

        return $prueba;
    }

    public function unirAritmetica($inicio, $fin) {
        $interseccion = array();
        $final = str_split($fin);
        $x = '';
        $y = '';
        for ($i = 0; $i < count($inicio); $i++):
            if ($inicio [$i] == $final[0] && $i == 0):
                $x = $inicio[$i];
            endif;
            if ($inicio[$i] == $final[count($final) - 1] && $i == count($inicio) - 1):
                $y = $inicio[$i];
            endif;
        endfor;

        for ($i = 0; $i < count($inicio); $i++):
            if ($inicio[$i] != $x && $inicio[$i] != $y):
                array_push($interseccion, $inicio[$i] . ' ' . $i);
            endif;
        endfor;
//        CVarDumper::dump($numCadena, 10, true);
        return $interseccion;
    }

    public function verificaAritmetica($cadena, $inicio, $fin, $inicio2) {
        $accion = array();
        $interseccion = array();
        $final = str_split($fin);
        $algo = array();
        $result = array();
        $simbolo = array('+', '-', '/', '!', '*', '·', '#', '$', '&', '~', '%', '&', '¬', '/', '=', '?', '¿', '^');
        foreach ($simbolo as $value):
            if (strpos($inicio2, $value) !== false)
                array_push($result, strpos($inicio2, $value));
        endforeach;

        if ($result != null) {
            $x = '';
            $y = '';
            $par1 = '';
            $par2 = '';
            for ($i = 0; $i < count($inicio); $i++):
                if ($inicio [$i] == $final[0] && $i == 0):
                    $x = $inicio[$i];
                endif;
                if ($inicio[$i] == $final[count($final) - 1] && $i == count($inicio) - 1):
                    $y = $inicio[$i];
                endif;
            endfor;

            for ($i = 0; $i < count($inicio); $i++):
                if ($inicio[$i] != $x && $inicio[$i] != $y):
                    array_push($interseccion, $inicio[$i] . ' ' . $i);
                endif;
            endfor;
            foreach ($result as $value):
                $prueba = $this->verificarAritmetica($interseccion, $result);
            endforeach;
            if (strpos($inicio2, '(') !== false && strpos($inicio2, ')') !== false):
                $par1 = strpos($inicio2, '(');
                array_push($accion, $par1);
                $par2 = strpos($inicio2, ')');
                array_push($accion, $par2);
            endif;

            if (strpos($inicio2, '{') !== false && strpos($inicio2, '}') !== false):
                $par1 = strpos($inicio2, '{');
                array_push($accion, $par1);
                $par2 = strpos($inicio2, '}');
                array_push($accion, $par2);
            endif;

            if (strpos($inicio2, '[') !== false && strpos($inicio2, ']') !== false):
                $par1 = strpos($inicio2, '[');
                array_push($accion, $par1);
                $par2 = strpos($inicio2, ']');
                array_push($accion, $par2);
            endif;
        }
        return $accion;
    }

    public function verificarAritmetica($cadena, $result) {
        $simbolo = '@#~$%&/¬()=?¿+*^[]{},.';
        $prueba = array();
        $aux = $result[0];
        $x = '';
        $cont = 0;
        foreach ($cadena as $value) {
            $valor = explode(' ', $value);
            if (intval($valor[1]) === $aux)
                $x .= $cont;
            $cont++;
        }
        if (strpos($cadena[intval($x) - 1], $simbolo) === false)
            array_push($prueba, $cadena[intval($x) - 1]);
        if (strpos($cadena[intval($x) + 1], $simbolo) === false)
            array_push($prueba, $cadena[intval($x) + 1]);
        $cont = 0;


        return $prueba;
    }

    public function revisionInicio2($cadena, $inicio) {
        $accion = array();
        for ($i = 0; $i < count($inicio); $i++) {
            foreach ($cadena as $value):
                $value = explode(" ", $value);
                if ($inicio[$i] == $value[0]) {
                    array_push($accion, $inicio[$i] . " " . $i);
                    break;
                }
            endforeach;
        }
        return $accion;
    }

    public function traerInfo($cadena, $inicio) {
        $cadena2 = array();
        $numCadena = array();
        $inicio2 = '';
        $numero = array();
        $cont = 0;
        $prueba = $this->prueba($cadena);
        $aux1 = '';
        $aux2 = '';
        for ($i = 0; $i < count($prueba); $i++) {
            $value = explode(" ", $prueba[$i]);
            $aux1 .= $value[0];
            $aux2 .= $value[1] . " ";
            if (strlen($aux1) == count($inicio)):
                array_push($cadena2, $aux1);
                array_push($numCadena, $aux2);
                $aux1 = '';
                $aux2 = '';
                $i -= count($inicio) - 1;
            endif;
        }

        for ($i = 0; $i < count($inicio); $i++):
            $value = explode(" ", $inicio[$i]);
            $inicio2 .= $value[0];
        endfor;
//        CVarDumper::dump($cadena2, 10, true);
//         CVarDumper::dump($numCadena, 10, true);

        $numero = $this->traeParametros($cadena2, $inicio2, $numCadena);
        return $numero;
    }

    public function prueba($cadena) {
        $prueba = array();
        $algo = explode(" ", $cadena[0]);
        array_push($prueba, $cadena[0]);
        for ($i = 1; $i < count($cadena); $i++):
            $pal = explode(" ", $cadena[$i]);
            if ($pal[1] != $algo[1]):
                $algo = explode(" ", $cadena[$i]);
                array_push($prueba, $cadena[$i]);
            endif;
        endfor;
        return $prueba;
    }

    public function traeParametros($cadena, $inicio, $numCadena) {
        $numero = array();
        $letras = strlen($inicio);

        for ($i = 0; $i < count($cadena); $i++):
            if ($inicio == $cadena[$i]):
                if ($letras > 1) {

                    $prueba = explode(" ", $numCadena[$i]);
                    $cont = $prueba[0];
                    $aux = 1;
                    $cont += 1;
                    $string = $prueba[0];
                    for ($j = 1; $j < count($prueba) - 1; $j++):
                        if ($cont == intval($prueba[$j])) {
                            $string .= " " . $prueba[$j];
                            $aux += 1;
                            $cont += 1;
                        } else {
                            $string = '';
                        }
                    endfor;

                    if ($aux == $letras) {
                        array_push($numero, $string);
                    }
                } else
                    array_push($numero, $numCadena[$i]);
            endif;
        endfor;
        return $numero;
    }

    public function contar() {
        $contar = substr_count($this->axioma, $this->letras);
        return $contar;
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('idLogica', $this->idLogica);
        $criteria->compare('axioma', $this->axioma, true);
        $criteria->compare('conjetura', $this->conjetura, true);
        $criteria->compare('estudiantes_idestudiantes', $this->estudiantes_idestudiantes);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Logica the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
