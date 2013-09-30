<?php

/**
 * This is the model class for table "manager".
 *
 * The followings are the available columns in table 'manager':
 * @property integer $manager_id
 * @property integer $region_id
 * @property string $manager_name
 * @property string $manager_email
 *
 * The followings are the available model relations:
 * @property Region $region
 */
class Manager extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'manager';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('region_id, manager_name, manager_email', 'required'),
			array('region_id', 'numerical', 'integerOnly'=>true),
			array('manager_name, manager_email', 'length', 'max'=>160),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('manager_id, region_id, manager_name, manager_email', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'manager_id' => 'Manager',
			'region_id' => 'Region',
			'manager_name' => 'Manager Name',
			'manager_email' => 'Manager Email',
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

		$criteria->compare('manager_id',$this->manager_id);
		$criteria->compare('region_id',$this->region_id);
		$criteria->compare('manager_name',$this->manager_name,true);
		$criteria->compare('manager_email',$this->manager_email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Manager the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
