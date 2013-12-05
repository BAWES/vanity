<?php

/**
 * This is the model class for table "reservation".
 *
 * The followings are the available columns in table 'reservation':
 * @property string $reservation_id
 * @property string $vanity_id
 * @property integer $package_id
 * @property integer $city_id
 * @property integer $region_id
 * @property string $reservation_name
 * @property string $reservation_phone
 * @property string $reservation_email
 * @property string $reservation_datetime
 *
 * The followings are the available model relations:
 * @property Region $region
 * @property Vanity $vanity
 * @property Package $package
 * @property City $city
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
			array('reservation_name,reservation_email, reservation_datetime,city_id,region_id', 'required'),
			array('reservation_email', 'email'),
			array('reservation_best_time_to_call','length'),
			array('package_id', 'numerical', 'integerOnly'=>true),
			array('vanity_id', 'length', 'max'=>20),
			array('reservation_name', 'length', 'max'=>180),
			array('reservation_phone','length'),
			array('reservation_phone', 'numerical','integerOnly'=>true),
			array('reservation_email', 'length', 'max'=>120),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('reservation_id,reservation_best_time_to_call, vanity_id, package_id, city_id, region_id, reservation_name, reservation_phone, reservation_email, reservation_datetime', 'safe', 'on'=>'search'),
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
            'region' => array(self::BELONGS_TO, 'Region', 'region_id'),
			'vanity' => array(self::BELONGS_TO, 'Vanity', 'vanity_id'),
			'package' => array(self::BELONGS_TO, 'Package', 'package_id'),
            'city' => array(self::BELONGS_TO, 'City', 'city_id'),
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
			'reservation_best_time_to_call' =>'Best time to contact',
			'reservation_name' => 'Name',
			'reservation_phone' => 'Contact Number',
			'reservation_email' => 'Email',
			'city_id' => 'City',
			'region_id' => 'Region',
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
