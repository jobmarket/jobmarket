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
                'actions'=>array('index', 'post', 'changeStatus', 'view'),
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
        $user_type = $_GET['as'];
        $this->render('/job/view', array('user_type'=>$user_type)) ;
    }
}
