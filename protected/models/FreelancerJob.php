<?php

/**
 * This is the model class for table "freelancer_job".
 *
 * The followings are the available columns in table 'freelancer_job':
 * @property integer $id
 * @property integer $freelancer_id
 * @property integer $job_id
 * @property integer $candidate_status
 * @property integer $duration
 * @property integer $price
 * @property string $created_at
 */
class FreelancerJob extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FreelancerJob the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'freelancer_job';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created_at', 'required'),
			array('freelancer_id, job_id, candidate_status, duration, price', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, freelancer_id, job_id, candidate_status, duration, price, created_at', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'freelancer_id' => 'Freelancer',
			'job_id' => 'Job',
			'candidate_status' => 'Candidate Status',
			'duration' => 'Duration',
			'price' => 'Price',
			'created_at' => 'Created At',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('freelancer_id',$this->freelancer_id);
		$criteria->compare('job_id',$this->job_id);
		$criteria->compare('candidate_status',$this->candidate_status);
		$criteria->compare('duration',$this->duration);
		$criteria->compare('price',$this->price);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}