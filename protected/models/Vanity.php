<?php

/**
 * This is the model class for table "vanity".
 *
 * The followings are the available columns in table 'vanity':
 * @property string $vanity_id
 * @property integer $agent_id
 * @property string $vanity_number
 * @property string $vanity_status
 *
 * The followings are the available model relations:
 * @property Reservation[] $reservations
 * @property Agent $agent
 */
class Vanity extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vanity';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('agent_id, vanity_number, vanity_status', 'required'),
			array('agent_id', 'numerical', 'integerOnly'=>true),
			array('vanity_number', 'length', 'max'=>60),
			array('vanity_status', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('vanity_id, agent_id, vanity_number, vanity_status', 'safe', 'on'=>'search'),
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
			'reservations' => array(self::HAS_MANY, 'Reservation', 'vanity_id'),
			'agent' => array(self::BELONGS_TO, 'Agent', 'agent_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'vanity_id' => 'Vanity',
			'agent_id' => 'Agent',
			'vanity_number' => 'Vanity Number',
			'vanity_status' => 'Vanity Status',
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

		$criteria->compare('vanity_id',$this->vanity_id,true);
		$criteria->compare('agent_id',$this->agent_id);
		$criteria->compare('vanity_number',$this->vanity_number,true);
		$criteria->compare('vanity_status',$this->vanity_status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Vanity the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
