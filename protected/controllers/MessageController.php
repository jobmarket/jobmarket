<?php

class MessageController extends Controller
{
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules() {
        return array(
            array('allow',  // all users
                'actions'=>array('index', 'send', 'view'),
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

    public function actionSend()
    {
        print 'send a message';
    }

    public function actionView()
    {
        print 'view a message';
    }
}
