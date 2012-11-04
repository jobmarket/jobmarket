<?php

class SiteController extends Controller {
    public function actions() {
        return array(
            # captcha action renders the CAPTCHA image displayed on the contact page
            #'captcha'=>array(
            #   'class'=>'CCaptchaAction',
            #   'backColor'=>0xFFFFFF,
            #),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
    }

    /*
    * Action nay se show trang chu neu user chua login
    * hoac redirect nguoi dung den trang ca nhan dua
    * vao loai nguoi dung
    */
    public function actionIndex() {
        /*
        * Kiem tra nguoi dung da login
        */
        if (!Yii::app()->user->isGuest){
            /*
            * Da dang nhan roi thi kiem tra nguoi dung
            * dang o mac dinh loai nguoi dung nao de redirect den
            * trang ca nhan phu hop
            */
			$this->redirect(array('/job/index'));
            /*
            $this->redirect(array('user/accountBalance', 'id'=>Yii::app()->user->_id));
            */
        } else {
            /*
            * Neu chua login thi:
            * Render trang index chua login
            */

            /*
            * Lay image slideshow
            */

            /*
            * Get category
            */

            /*
            * Get cac job moi nhat voi n truyen vao
            */

            /*
            * Get top cac freelancer voi n truyen vao
            */
            $categories = Category::model()->findAll();
            $this->render('index',array('categories'=>$categories));
        }
    }

    private function loadUser() {
      return User::model()->findbyPk(Yii::app()->user->_id);
    }

    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $error['message'];
            }
            else {
                $this->render('error', $error);
            }
        }
    }

    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes=$_POST['ContactForm'];
            if ($model->validate()) {
                $headers = "From: {$model->email}\r\nReply-To: {$model->email}";
                mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
                Yii::app()->user->setFlash('contact',
                    'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact',array('model'=>$model));
    }

    public function actionSupport() {
        $this->render('support');
    }

    public function actionLogin() {
        $model = new LoginForm;
        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes=$_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if($model->validate())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login',array('model'=>$model));
    }

	public function actionLoginAjax(){
		$model = new LoginForm;
        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes=$_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if($model->validate())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        print $this->renderPartial('login',array('model'=>$model));
	}

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionSu() {
        $form = new SuLoginForm;
        if (isset($_POST['SuLoginForm'])) {
            $form->attributes = $_POST['SuLoginForm'];
            // validate user input and redirect to previous page if valid
            if ($form->validate()) {
                ## log su
                #$u= new ActiveRecordLog;
                #$u->description=  'User ' . Yii::app()->user->Name . ' LOGIN ';
                #$u->action=       'LOGIN';
                #$u->creationdate= date('Y-m-d H:i:s');
                #$u->userid=       Yii::app()->user->id;
                #$u->save();
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        $this->render('su', array('form'=>$form)) ;
    }

    public function actionAbout(){
        print 'find about us';
    }

    /*
    * action : tim viec
    */
    public function actionFindJob(){
        /*
        * check nguoi dung chua dang nhap
        */
        $keyword = Yii::app()->request->getParam('keyword', null);

        $price = Yii::app()->request->getParam('price', null);
        $duration = Yii::app()->request->getParam('duration', null);
        $sort = Yii::app()->request->getParam('sort', null);

        $locations = Yii::app()->request->getParam('locations', null);
        $locations = isset($locations)? explode( ',', $locations) : null;

        $categories = Yii::app()->request->getParam('categories', null);
        $categories = isset($categories)? explode( ',', $categories) : null;

        if(Yii::app()->user->isGuest){
            /*
            * lay cac setting default:
            * category, average price, location roi goi ham search
             */
            $get_category_user_setting = '';
            $get_address_of_user = '';
            $get_average_price_of_user = '';

            $categories = ($categories === null)? $get_category_user_setting : $categories;
            $locations = ($locations === null)? array($get_address_of_user) : $locations;
            $price = ($price === null)? $get_average_price_of_user : $price;
        }

        $criterias = array(
            'keyword'=>$keyword,
            'price'=>$price,
            'locations'=>$locations,
            'categories'=>$categories,
            'duration'=>$duration,
            'sort_by'=> $sort,
        );

        //print_r($criterias);die();

        $dataProvider = Job::searchJob($criterias);
        $this->render('/job/find_job', array('criterias'=> $criterias, 'dataProvider'=>$dataProvider)) ;
    }

    public function actionFindFreelancer(){
        $this->render('/job/find_freelancer', array()) ;
    }
}
