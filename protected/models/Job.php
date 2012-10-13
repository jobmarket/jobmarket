<?php

/**
 * This is the model class for table "job".
 *
 * The followings are the available columns in table 'job':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $featured
 * @property integer $type
 * @property string $attach_file_path
 * @property string $start_date
 * @property string $end_date
 * @property string $create_date
 * @property integer $duration
 * @property integer $status
 * @property integer $category_id
 * @property integer $client_id
 * @property integer $freelancer_id
 * @property double $freelancer_rating
 * @property double $client_rating
 * @property string $freelancer_feedback
 * @property string $client_feedback
 */
class Job extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Job the static model class
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
        return 'job';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, description, create_date', 'required'),
            array('featured, type, duration, status, category_id, client_id, freelancer_id', 'numerical', 'integerOnly'=>true),
            array('freelancer_rating, client_rating', 'numerical'),
            array('name', 'length', 'max'=>127),
            array('attach_file_path, freelancer_feedback, client_feedback', 'length', 'max'=>255),
            array('start_date, end_date', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, description, featured, type, attach_file_path, start_date, end_date, create_date, duration, status, category_id, client_id, freelancer_id, freelancer_rating, client_rating, freelancer_feedback, client_feedback', 'safe', 'on'=>'search'),
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
            'skills'=> array(self::HAS_MANY, 'JobSkill', 'job_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'featured' => 'Featured',
            'type' => 'Type',
            'attach_file_path' => 'Attach File Path',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'create_date' => 'Create Date',
            'duration' => 'Duration',
            'status' => 'Status',
            'category_id' => 'Category',
            'client_id' => 'Client',
            'freelancer_id' => 'Freelancer',
            'freelancer_rating' => 'Freelancer Rating',
            'client_rating' => 'Client Rating',
            'freelancer_feedback' => 'Freelancer Feedback',
            'client_feedback' => 'Client Feedback',
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
        $criteria->compare('name',$this->name,true);
        $criteria->compare('description',$this->description,true);
        $criteria->compare('featured',$this->featured);
        $criteria->compare('type',$this->type);
        $criteria->compare('attach_file_path',$this->attach_file_path,true);
        $criteria->compare('start_date',$this->start_date,true);
        $criteria->compare('end_date',$this->end_date,true);
        $criteria->compare('create_date',$this->create_date,true);
        $criteria->compare('duration',$this->duration);
        $criteria->compare('status',$this->status);
        $criteria->compare('category_id',$this->category_id);
        $criteria->compare('client_id',$this->client_id);
        $criteria->compare('freelancer_id',$this->freelancer_id);
        $criteria->compare('freelancer_rating',$this->freelancer_rating);
        $criteria->compare('client_rating',$this->client_rating);
        $criteria->compare('freelancer_feedback',$this->freelancer_feedback,true);
        $criteria->compare('client_feedback',$this->client_feedback,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    static public function searchJob($keyword = null, $filters = array(), $sort = null){
        /*
        * lay tat ca cac job dua tren keyword, cac filter (localtion, category, duaration, price,...)
        * va sort by $sort
        */
        $criteria = new CDbCriteria;

        if($keyword){
            $criteria->compare('t.name', $keyword, true);
            $criteria->description('t.description', $keyword, true);
        }

        if(isset($filters['category_id'])){
            $criteria->compare('t.category_id', $filters['category_id'], true);
        }

        if(isset($filters['price'])){
            $criteria->compare('t.price', $filters['price'], true);
        }

        if(isset($filters['localtion'])){
            $criteria->compare('t.location', $filters['localtion'], true);
        }

        if(isset($filters['duration'])){
            $start = date('d-m-Y h:m:s', strtotime($filters['duration']));
            $end = date('d-m-Y h:m:s');
            $criteria->condition = 't.start_date between :start and :end';
            $criteria->params= array(':start'=>$start, ':end'=>$end);
        }

        $criteria->order = 't.create_date DESC';

        $dataProvider = new CActiveDataProvider(
            'Job', array(
                'criteria' =>$criteria,
                'pagination'=>array(
                    'pageSize'=>10,
                ),
            )
        );
        return $dataProvider;
    }
}
