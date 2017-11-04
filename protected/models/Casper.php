<?php

/**
 * This is the model class for table "casper".
 *
 * The followings are the available columns in table 'casper':
 * @property integer $idcasper
 * @property string $colores
 * @property integer $Logica_idLogica
 * @property integer $reglas_idreglas
 *
 * The followings are the available model relations:
 * @property Logica $logicaIdLogica
 * @property Reglas $reglasIdreglas
 */
class Casper extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'casper';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Logica_idLogica, reglas_idreglas', 'required'),
			array('Logica_idLogica, reglas_idreglas', 'numerical', 'integerOnly'=>true),
			array('colores', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idcasper, colores, Logica_idLogica, reglas_idreglas', 'safe', 'on'=>'search'),
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
			'reglasIdreglas' => array(self::BELONGS_TO, 'Reglas', 'reglas_idreglas'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcasper' => 'Idcasper',
			'colores' => 'Colores',
			'Logica_idLogica' => 'Logica Id Logica',
			'reglas_idreglas' => 'Reglas Idreglas',
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

		$criteria->compare('idcasper',$this->idcasper);
		$criteria->compare('colores',$this->colores,true);
		$criteria->compare('Logica_idLogica',$this->Logica_idLogica);
		$criteria->compare('reglas_idreglas',$this->reglas_idreglas);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Casper the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
