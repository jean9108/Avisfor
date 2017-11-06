<?php

/**
 * This is the model class for table "estudiantes".
 *
 * The followings are the available columns in table 'estudiantes':
 * @property integer $idestudiante
 * @property string $nombre
 * @property string $apellido
 * @property string $curso
 * @property string $foto
 * @property string $bachiller
 * @property integer $cruge_user_iduser
 *
 * The followings are the available model relations:
 * @property Archivos[] $archivoses
 * @property CrugeUser $crugeUserIduser
 * @property Sistemas[] $sistemases
 */
class Estudiantes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'estudiantes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, apellido, curso, cruge_user_iduser', 'required'),
			array('cruge_user_iduser', 'numerical', 'integerOnly'=>true),
			array('nombre, apellido, curso, bachiller', 'length', 'max'=>45),
			array('foto','file',
                                'types'=>'jpg,gif,png',
                                'allowEmpty' => true, 'on'=>'insert'
                            ),
                        array('foto', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idestudiante, nombre, apellido, curso, foto, bachiller, cruge_user_iduser', 'safe', 'on'=>'search'),
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
			'archivoses' => array(self::HAS_MANY, 'Archivos', 'estudiantes_idestudiante'),
			'crugeUserIduser' => array(self::BELONGS_TO, 'CrugeUser', 'cruge_user_iduser'),
			'sistemases' => array(self::HAS_MANY, 'Sistemas', 'estudiantes_idestudiante'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idestudiante' => 'Idestudiante',
			'nombre' => 'Nombres',
			'apellido' => 'Apellidos',
			'curso' => 'Curso',
			'foto' => 'Foto',
			'bachiller' => 'Bachiller',
			'cruge_user_iduser' => 'Cruge User Iduser',
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

		$criteria->compare('idestudiante',$this->idestudiante);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('curso',$this->curso,true);
		$criteria->compare('foto',$this->foto,true);
		$criteria->compare('bachiller',$this->bachiller,true);
		$criteria->compare('cruge_user_iduser',$this->cruge_user_iduser);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function  getNombresyApellidos(){
                return sprintf('%s %s' ,$this->nombre, $this->apellido);
        }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Estudiantes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
