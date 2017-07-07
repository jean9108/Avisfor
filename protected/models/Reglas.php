<?php

/**
 * This is the model class for table "reglas".
 *
 * The followings are the available columns in table 'reglas':
 * @property integer $idreglas
 * @property string $inicio
 * @property string $fin
 * @property integer $Logica_idLogica
 *
 * The followings are the available model relations:
 * @property Logica $logicaIdLogica
 */
class Reglas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reglas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('inicio, fin, Logica_idLogica', 'required'),
			array('Logica_idLogica', 'numerical', 'integerOnly'=>true),
			array('inicio', 'length', 'max'=>255),
			array('fin', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idreglas, inicio, fin, Logica_idLogica', 'safe', 'on'=>'search'),
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
			'logicaIdLogica' => array(self::BELONGS_TO, 'Logica', 'Logica_idLogica'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idreglas' => 'Idreglas',
			'inicio' => 'Inicio',
			'fin' => 'Fin',
			'Logica_idLogica' => 'Logica Id Logica',
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

		$criteria->compare('idreglas',$this->idreglas);
		$criteria->compare('inicio',$this->inicio,true);
		$criteria->compare('fin',$this->fin,true);
		$criteria->compare('Logica_idLogica',$this->Logica_idLogica);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Reglas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
