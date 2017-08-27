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

    public function aplicarReglas($id) {

        $regla = Reglas::model()->find("idreglas =:id_reglas", array(":id_reglas" => $id));
        $inicio = $regla->inicio;
        $fin = $regla->fin;
        $cadena = str_split($this->axioma);
        $traeTotalCambios = $this->revisionInicio($cadena, $inicio);
        if (count($traeTotalCambios) == 0) {

            echo "<strong>Heads up!</strong> I'm a valuable information!.";
        } else {
            $cambio = $this->comparaInicioFin($inicio, $fin, $traeTotalCambios[0]);
            CVarDumper::dump($cambio, 10, true);
            $prueba = $this->revisionFin($traeTotalCambios, $cadena,$cambio);
        }

//        CVarDumper::dump($prueba, 10, true);
//        foreach ($regla as $row) {
//                
//            if ($valor == $id) {
//                $var = substr($row->inicio, 1, -1);
//                
//                $var2 = substr($row->fin, 1, -1);
//                $contar = substr_count($this->axioma, $var);
//                $arr1 = str_split($this->axioma);
//                $contar1 = strlen($var2);
//                $arreglo = '';
//                $arreglo2 = array();
//                $pos = 0;
//                for ($i = 0; $i < $contar; $i++) {
//                    $aux = 0;
//                    $aux2 = array();
//                    for ($j = $pos; $j < count($arr1); $j++) {
//                        if ($arr1[$j] == $var && $aux == 0) {
//                            $pos += $j + 1;
//                            $aux = 1;
//                            for ($k = 0; $k < $i; $k++)
//                                array_push($aux2, $arr1[$k]);
//
//
//                            for ($l = 0; $l < $contar1; $l++) {
//                                array_push($aux2, $var2[$l]);
//                            }
//                        } else {
//                            array_push($aux2, $arr1[$j]);
//                        }
//                    }
//                    $arreglo = implode(" ", $aux2);
//                    $formato = str_replace(' ', '', $arreglo);
//                    array_push($this->solucion, $formato);
//                }
//         
//            } else {
//                $valor += 1;
//            }
//        }
        return $this->solucion;
    }

    public function revisionFin($numero,$cadena,$fin) {
        $solucion = array();
        $cambio = '';
        foreach ($numero as $value):
             $value = explode(" ", $value);
             $cont = 0;
            for($i = 0; $i < count($cadena); $i++):
//                if($i == $value[$cont] && count($value)> $cont):
////                    $cont+=1; 
//                endif;
                    
            endfor;
            
//            if($cont == count($value)){
//                CVarDumper::dump($value, 10, true);
//            }
         
        endforeach;
       
        return $solucion;
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
        $resultado2 = strpos($inicio, $cadena2[$aux]);
        $x = $this->obtieneXInicio($resultado, $inicio);
        $y = $this->obtieneYInicio($fin, $inicio[$resultado2 + 1]);
        for ($i = 0; $i < strlen($fin); $i++):

            if ($i > $x - 1 && $i < $y - 1):
                array_push($accion, $fin[$i]);
            endif;

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

        for ($i = 0; $i < $aux; $i++):
            if ($resultado[$i] == $inicio):
                $y = $i + 1;
                break;
            endif;
        endfor;
        return $y;
    }

    public function revisionInicio($cadena, $inicio) {
        $accion = array();
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

        $reaccion = $this->revisionInicio2($accion, $inicio);
        $numero = $this->traerInfo($accion, $reaccion);
        return $numero;
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
        for ($i = 0; $i < count($cadena); $i++) {
            if ($i + 1 < count($cadena)):
                $value = explode(" ", $cadena[$i]);
                $expresion = explode(" ", $cadena[$i + 1]);
                array_push($cadena2, $value[0] . $expresion[0]);
                array_push($numCadena, $value[1] . " " . $expresion[1]);
            endif;
        }

        for ($i = 0; $i < count($inicio); $i++):
            $value = explode(" ", $inicio[$i]);
            $inicio2 .= $value[0];
        endfor;

        $numero = $this->traeParametros($cadena2, $inicio2, $numCadena);
        return $numero;
    }

    public function traeParametros($cadena, $inicio, $numCadena) {
        $numero = array();
        for ($i = 0; $i < count($cadena); $i++):
            if ($inicio == $cadena[$i]):
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
