<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $parent_id
 * @property string $created_at
 */
class Category extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Category the static model class
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
        return 'category';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name', 'required'),
            array('parent_id', 'numerical', 'integerOnly'=>true),
            array('name', 'length', 'max'=>64),
            array('description', 'length', 'max'=>127),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, description, parent_id, created_at', 'safe', 'on'=>'search'),
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
            'name' => 'Name',
            'description' => 'Description',
            'parent_id' => 'Parent',
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
        $criteria->compare('name',$this->name,true);
        $criteria->compare('description',$this->description,true);
        $criteria->compare('parent_id',$this->parent_id);
        $criteria->compare('created_at',$this->created_at,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public static function getCategories()
    {
$query = <<<EO_SQL
SELECT root.id as root_id, down1.id as down1_id, root.name as root_name, down1.name as down1_name
FROM category as root
    LEFT OUTER JOIN category as down1 on down1.parent_id = root.id
WHERE root.parent_id is null
ORDER BY root_name, down1_name
EO_SQL;
        $categories = Yii::app()->db->createCommand($query)->queryAll();
        $selects = array();
        if($categories){
            $pre_cat = $categories[0];
            foreach($categories as $c){
                if($c['down1_name'] === null){//root
                    $selects[$c['root_id']]=$c['root_name'];
                }else{
                    if($pre_cat['root_id']==$c['root_id']){
                        $selects[$c['down1_id']]='-- ' . $c['down1_name'];
                    }else{
                        $selects[$c['root_id']]=$c['root_name'];
                        $selects[$c['down1_id']]='-- ' . $c['down1_name'];
                    }
                }
                $pre_cat = $c;
           }
        }
        return $selects;
    }
}
