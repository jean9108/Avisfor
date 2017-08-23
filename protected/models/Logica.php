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
        $prueba = $this->revisionInicio($cadena, $inicio);
        CVarDumper::dump($prueba,10,true);        
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
    
    public function revisionInicio($cadena,$inicio){
        $accion = array();
        $prueba = array();
        $inicio = str_split($inicio);
   
        for($i = 0; $i < count($cadena); $i++){
            $cont = 0; 
            foreach ($inicio as $resp){
               
                if(strpos($cadena[$i], $resp) !== false){
                    array_push($accion, $cadena[$i]." ".$i);
                }
            }
        }
        
       //$accion = $this->revisionInicio2($accion, $inicio);
        
        return $accion;
    }

    public function revisionInicio2($cadena,$inicio){
        return null;
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
