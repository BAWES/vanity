<?php

class DefaultController extends Controller {

    public function actionIndex() {
        $this->layout='column1';
        
        $criteria = new CDbCriteria();
        $criteria->limit = 5;
        $criteria->condition = "usertype='user'";
        $userActivity = Activity::model()->findAll($criteria);
        
        $criteria->condition = "usertype='agent'";
        $agentActivity = Activity::model()->findAll($criteria);

        $criteria->condition = "usertype='admin'";
        $adminActivity = Activity::model()->findAll($criteria);
        
        $this->render('index',array('userActivity'=>$userActivity,
                                    'agentActivity'=>$agentActivity,
                                    'adminActivity'=>$adminActivity));
    }

    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else {
                $this->render('error', $error);
            }
        }
    }

    public function actionLogin() {
        if (Yii::app()->user->isGuest) {
            $this->layout = "notlogged";
            $model = new LoginForm;

            // if it is ajax validation request
            if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }

            // collect user input data
            if (isset($_POST['LoginForm'])) {
                $model->attributes = $_POST['LoginForm'];
                // validate user input and redirect to the previous page if valid
                if ($model->validate() && $model->login())
                    $this->redirect(Yii::app()->getModule('admin')->user->returnUrl);
            }
            // display the login form
            $this->render('login', array('model' => $model));
        }
        else $this->redirect(array('index'));
    }

    public function actionLogout() {
        Yii::app()->user->logout(false);
        $this->redirect(Yii::app()->getModule('admin')->user->loginUrl);
    }

}