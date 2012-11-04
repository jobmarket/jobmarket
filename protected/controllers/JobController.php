<?php

class JobController extends Controller
{
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules() {
        return array(
            array('allow',  // all users
                'actions'=>array('index', 'post', 'changeStatus', 'view', 'search'),
                'users'=>array('*'),
            ),
            array('allow', # logged in users
                'actions'=>array(),
                'users'=>array('@'),
            ),
            array('allow', # admins
                'actions'=>array(),
                'roles'=>array('admin'),
                'users'=>array('@'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionIndex()
    {
        $this->render('index');
    }

    /*
     * controller cho action Post job
     * */
    public function actionPost(){
        /*
         *tao 1 job model
         * */
        $model = new Job;
	 /*
         *tao 1 category model
         * */
        $cat_model = new Category;
	 /*
         *lay toan bo category tu database
         * */
        $cat_data = Category::getCategories();
	 /*
         *tao 1 skill model
         * */
        $skill_model = new Skill;
	 /*
         *lay toan bo skill tu database
         * */
        $skill_data = Skill::getSkills();

        if(isset($_POST['Job'])){//lay du lieu tu view
           	//neu khac rong thuc hien insert job vao database
			//assign cac thong tin cua $_POST['Job'] cho $model
			print_r($_POST['Job']); die();
            $model->attributes = $_POST['Job'];
           // $model->

			$model->save();
        }

	//render view
        $this->render('create',
            array(
                'model'=>$model,
                'cat_model' => $cat_model,
                'cat_data' => $cat_data,
                'skill_model' => $skill_model,
                'skill_data' => $skill_data
            ));
    }

    public function actionChangeStatus(){
        print 'post change status';
    }

    public function actionView(){
        $user_type = Yii::app()->request->getParam('as', 'freelancer');
        $this->render('/job/view', array('user_type'=>$user_type)) ;
    }

    /*
    * ajax function cho search job
    */
    /*
    public function actionSearch(){
        //lay cac thong so

        $keyword = isset($_GET['keyword'])? $_GET['keyword']: '';
        print $keyword;die();
        $location = isset($_GET['location'])? $_GET['location']: '';
        $price = isset($_GET['price'])? $_GET['price']: '';
        $duration = isset($_GET['duration'])? $_GET['duration']: '';
        $category = isset($_GET['category'])? $_GET['category']: '';
        $sort = isset($_GET['sort'])? $_GET['sort']: '';

        $dataProvider = Job::searchJob($keyword, array('price'=>$price,
            'location'=>$location,
            'category'=>$category,
            'duration'=>$duration), $sort);

        //print_r($jobs);die();
        print $this->renderPartial('/job/search', array('dataProvider'=> $dataProvider));
    }
     */
}
