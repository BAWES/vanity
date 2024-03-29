<?php

class AgentController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='column2';

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Agent();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Agent']))
		{
			$model->attributes=$_POST['Agent'];
			if($model->save()){
			 
			$model_activity = new Activity();
			$model_activity->text = Yii::app()->user->name.' created new agent '.$model->agent_name;
			$model_activity->usertype = 'admin';
			$model_activity->datetime = new CDbExpression('NOW()');
			$model_activity->insert();
			$this->redirect(array('view','id'=>$model->agent_id));
		    }
		}
                
			//generate region dropdown list
			$regionDropdown = CHtml::listData(Region::model()->findAll(), 'region_id', 'region_name');
			$this->render('create',array(
			'model'=>$model,
			'regionDropdown' => $regionDropdown,
			));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Agent']))
		{
			$model->attributes=$_POST['Agent'];
			if($model->save()){
			
				$model_activity = new Activity();
				$model_activity->text = Yii::app()->user->name.' updated agent '.$model->agent_name;
				$model_activity->usertype = 'admin';
				$model_activity->datetime = new CDbExpression('NOW()');
				$model_activity->insert();
				$this->redirect(array('view','id'=>$model->agent_id));
			}	
		}
                
                //generate region dropdown list
        $regionDropdown = CHtml::listData(Region::model()->findAll(), 'region_id', 'region_name');

		$this->render('update',array(
			'model'=>$model,
                    'regionDropdown' => $regionDropdown,
		));
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionChangePassword($id)
	{
		$model=$this->loadModel($id);
		$model->scenario="changePw";

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Agent']))
		{
			$model->attributes=$_POST['Agent'];
			if($model->save()){
                            $model_activity = new Activity();
				$model_activity->text = Yii::app()->user->name.' changed agent password for '.$model->agent_name;
				$model_activity->usertype = 'admin';
				$model_activity->datetime = new CDbExpression('NOW()');
				$model_activity->insert();
				$this->redirect(array('view','id'=>$model->agent_id));
                                
                        }
		}

		$this->render('changePassword',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'agent' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();
                        
                        $model_activity = new Activity();
				$model_activity->text = Yii::app()->user->name.' deleted agent '.$model->agent_name;
				$model_activity->usertype = 'admin';
				$model_activity->datetime = new CDbExpression('NOW()');
				$model_activity->insert();

			// if AJAX request (triggered by deletion via agent grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$model=new Agent('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Agent']))
			$model->attributes=$_GET['Agent'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Agent::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='agent-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
