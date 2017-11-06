<?php

/**
 * This is the model class for table "sisfor".
 *
 * The followings are the available columns in table 'sisfor':
 * @property integer $idSisfor
 * @property string $axioma
 * @property string $conjetura
 * @property string $Regla1
 * @property string $Regla2
 * @property string $Regla3
 * @property string $Regla4
 * @property string $Regla5
 * @property string $Regla6
 * @property string $Regla7
 * @property string $Regla8
 * @property string $Regla9
 * @property string $Regla10
 * @property string $Regla11
 * @property string $Regla12
 * @property string $Regla13
 * @property integer $estudiantes_idestudiante
 *
 * The followings are the available model relations:
 * @property Estudiantes $estudiantesIdestudiante
 */
class Sisfor extends CActiveRecord
{
        public $letra1;
        public $letra2;
        public $esAxioma;
        public $posibilidad;
        
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sisfor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('axioma, conjetura, Regla1, estudiantes_idestudiante', 'required'),
			array('estudiantes_idestudiante', 'numerical', 'integerOnly'=>true),
			array('axioma, conjetura,letra1,letra2,esAxioma', 'length', 'max'=>45),
			array('Regla1, Regla2, Regla3, Regla4, Regla5, Regla6, Regla7, Regla8, Regla9, Regla10, Regla11, Regla12, Regla13', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idSisfor, axioma, conjetura, Regla1, Regla2, Regla3, Regla4, Regla5, Regla6, Regla7, Regla8, Regla9, Regla10, Regla11, Regla12, Regla13, estudiantes_idestudiante', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'estudiantesIdestudiante' => array(self::BELONGS_TO, 'Estudiantes', 'estudiantes_idestudiante'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idSisfor' => 'Id Sisfor',
			'axioma' => 'Axioma',
                        'letra1' => 'letra',
                        'letra2' => 'numero',
			'conjetura' => 'Conjetura',
                        'esAxioma' => 'Escriba el Axioma. Aqui se registra la Derivación',
			'Regla1' => 'Regla1',
			'Regla2' => 'Regla2',
			'Regla3' => 'Regla3',
			'Regla4' => 'Regla4',
			'Regla5' => 'Regla5',
			'Regla6' => 'Regla6',
			'Regla7' => 'Regla7',
			'Regla8' => 'Regla8',
			'Regla9' => 'Regla9',
			'Regla10' => 'Regla10',
			'Regla11' => 'Regla11',
			'Regla12' => 'Regla12',
			'Regla13' => 'Regla13',
			'estudiantes_idestudiante' => 'Estudiantes Idestudiante',
                        'posibilidad' => 'Posibilidades',
		);
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idSisfor',$this->idSisfor);
		$criteria->compare('axioma',$this->axioma,true);
		$criteria->compare('conjetura',$this->conjetura,true);
		$criteria->compare('Regla1',$this->Regla1,true);
		$criteria->compare('Regla2',$this->Regla2,true);
		$criteria->compare('Regla3',$this->Regla3,true);
		$criteria->compare('Regla4',$this->Regla4,true);
		$criteria->compare('Regla5',$this->Regla5,true);
		$criteria->compare('Regla6',$this->Regla6,true);
		$criteria->compare('Regla7',$this->Regla7,true);
		$criteria->compare('Regla8',$this->Regla8,true);
		$criteria->compare('Regla9',$this->Regla9,true);
		$criteria->compare('Regla10',$this->Regla10,true);
		$criteria->compare('Regla11',$this->Regla11,true);
		$criteria->compare('Regla12',$this->Regla12,true);
		$criteria->compare('Regla13',$this->Regla13,true);
		$criteria->compare('estudiantes_idestudiante',$this->estudiantes_idestudiante);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sisfor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
