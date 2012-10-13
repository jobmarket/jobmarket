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

    public function actionPost(){
        print 'post job';
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
    public function actionSearch(){
        /*
        * lay cac thong so
        */
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
}
