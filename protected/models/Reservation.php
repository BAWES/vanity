<?php

/**
 * This is the model class for table "reservation".
 *
 * The followings are the available columns in table 'reservation':
 * @property string $reservation_id
 * @property string $vanity_id
 * @property integer $package_id
 * @property string $reservation_name
 * @property string $reservation_phone
 * @property string $reservation_email
 * @property string $reservation_datetime
 *
 * The followings are the available model relations:
 * @property Vanity $vanity
 * @property Package $package
 */
class Reservation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reservation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vanity_id, reservation_name, reservation_phone, reservation_email, reservation_datetime', 'required'),
			array('package_id', 'numerical', 'integerOnly'=>true),
			array('vanity_id', 'length', 'max'=>20),
			array('reservation_name', 'length', 'max'=>180),
			array('reservation_phone', 'length', 'max'=>160),
			array('reservation_email', 'length', 'max'=>120),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('reservation_id, vanity_id, package_id, reservation_name, reservation_phone, reservation_email, reservation_datetime', 'safe', 'on'=>'search'),
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
			'vanity' => array(self::BELONGS_TO, 'Vanity', 'vanity_id'),
			'package' => array(self::BELONGS_TO, 'Package', 'package_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'reservation_id' => 'Reservation',
			'vanity_id' => 'Vanity',
			'package_id' => 'Package',
			'reservation_name' => 'Reservation Name',
			'reservation_phone' => 'Reservation Phone',
			'reservation_email' => 'Reservation Email',
			'reservation_datetime' => 'Reservation Datetime',
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

		$criteria->compare('reservation_id',$this->reservation_id,true);
		$criteria->compare('vanity_id',$this->vanity_id,true);
		$criteria->compare('package_id',$this->package_id);
		$criteria->compare('reservation_name',$this->reservation_name,true);
		$criteria->compare('reservation_phone',$this->reservation_phone,true);
		$criteria->compare('reservation_email',$this->reservation_email,true);
		$criteria->compare('reservation_datetime',$this->reservation_datetime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Reservation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
