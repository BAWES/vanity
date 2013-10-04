<?php

class VanityController extends Controller
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
		$model=new Vanity;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Vanity']))
		{
			$model->attributes=$_POST['Vanity'];
			$model->agent_id = Yii::app()->user->getState('agent_id');		
			if($model->save())
				$this->redirect(array('view','id'=>$model->vanity_id));
		}

		$this->render('create',array(
			'model'=>$model,
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

		if(isset($_POST['Vanity']))
		{
			$model->attributes=$_POST['Vanity'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->vanity_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	/**
	 * Cancel sale a particular  number.
	 */
	public function actionCancelSale($id)
	{
		
		$cancelSale=Vanity::model()->updateByPk
                      ($id,array("vanity_status"=>'show'));  

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(array('sold'));
	}	
	/**
	 * make sold status for particular number.
	 */
	public function actionSoldStatus($id)
	{
		
		$soldStatus=Vanity::model()->updateByPk
                      ($id,array("vanity_status"=>'sold'));  

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
	    
		$dataProvider=new CActiveDataProvider('Vanity');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	/**
	 * Lists all sold number.
	 */
	public function actionSold()
	{
	    
		$dataProvider=new CActiveDataProvider('Vanity',array(
        'criteria'=>array(
        'condition'=>'agent_id= '.Yii::app()->user->getState('agent_id').' AND vanity_status = "sold"',
		)));
		$this->render('sold',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Vanity('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Vanity']))
			$model->attributes=$_GET['Vanity'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Vanity the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Vanity::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Vanity $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='vanity-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
