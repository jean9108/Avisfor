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
class Logica extends CActiveRecord
{
        public $letras = 'a';
        public $resultado;
        
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'logica';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('axioma, conjetura', 'required'),
			array('estudiantes_idestudiantes', 'numerical', 'integerOnly'=>true),
			array('axioma, conjetura,letras,resultado', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idLogica, axioma, conjetura, estudiantes_idestudiantes', 'safe', 'on'=>'search'),
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
			'estudiantesIdestudiantes' => array(self::BELONGS_TO, 'Estudiantes', 'estudiantes_idestudiantes'),
			'reglases' => array(self::HAS_MANY, 'Reglas', 'Logica_idLogica'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idLogica' => 'Id Logica',
			'axioma' => 'Axioma',
			'conjetura' => 'Conjetura',
			'estudiantes_idestudiantes' => 'Estudiantes Idestudiantes',
                        'letras' => 'Letras',
                        'resultado' => 'Resultado',
		);
	}
        
        public function contar(){
            //$algo =substr_count($this->axioma, $this->letras);
            $model->resultado = '20';
            return $this->resultado;
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

		$criteria->compare('idLogica',$this->idLogica);
		$criteria->compare('axioma',$this->axioma,true);
		$criteria->compare('conjetura',$this->conjetura,true);
		$criteria->compare('estudiantes_idestudiantes',$this->estudiantes_idestudiantes);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Logica the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}