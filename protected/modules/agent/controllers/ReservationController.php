<?php

class ReservationController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='column2';
    public $regionDropdown;
	

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
        /*
	public function actionCreate()
	{
	
		$model=new Reservation;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Reservation']))
		{
			$model->attributes=$_POST['Reservation'];
			//$model->vanity_status = 'reserved';
			$model->reservation_datetime = new CDbExpression('NOW()');
			if($model->save()){
			$model_vanity=Vanity::model()->findByPk($model->vanity_id);
			$model_activity = new Activity();
			$model_activity->text = 'Agent reserved new number '.$model_vanity->vanity_number;
			$model_activity->usertype = 'agent';
			$model_activity->datetime = new CDbExpression('NOW()');
			$model_activity->insert();
				$this->redirect(array('view','id'=>$model->reservation_id));
			}	
		}
		// fetching available package
		$packageDropdown = CHtml::listData(Package::model()->findAll(), 'package_id', 'package_name');
		// fetching available vanity number with related agent
		$vanityDropdown = CHtml::listData(Vanity::model()->findAll('agent_id='.Yii::app()->user->getState('agent_id').' AND vanity_status="show"'),'vanity_id', 'vanity_number');
		$regionDropdown = CHtml::listData(Region::model()->findAll(),'region_id', 'region_name');
		$this->render('create',array(
		'model'=>$model,
		'packageDropdown' => $packageDropdown,
		'vanityDropdown'=>$vanityDropdown,
		'regionDropdown'=>$regionDropdown,
		));
	}
         * 
         */

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
        /*
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Reservation']))
		{
			$model->attributes=$_POST['Reservation'];
			if($model->save()){
			$model_vanity=Vanity::model()->findByPk($model->vanity_id);
			$model_activity = new Activity();
			$model_activity->text = 'Agent updated reservation number '.$model_vanity->vanity_number.' With reservation ID '.$model->reservation_id;
			$model_activity->usertype = 'agent';
			$model_activity->datetime = new CDbExpression('NOW()');
			$model_activity->insert();
				$this->redirect(array('view','id'=>$model->reservation_id));
				
			}	
		}
        // fetching available package
		$packageDropdown = CHtml::listData(Package::model()->findAll(), 'package_id', 'package_name');
		// fetching available vanity number with related agent
		$vanityDropdown = CHtml::listData(Vanity::model()->findAll('agent_id='.Yii::app()->user->getState('agent_id').' AND vanity_status="show"'),'vanity_id', 'vanity_number');
		$regionDropdown = CHtml::listData(Region::model()->findAll(),'region_id', 'region_name');
		$this->render('update',array(
			'model'=>$model,
			'packageDropdown' => $packageDropdown,
			'vanityDropdown'=>$vanityDropdown,
			'regionDropdown'=>$regionDropdown,
		));
	}
         * 
         */

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
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$model=new Reservation('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Reservation']))
			$model->attributes=$_GET['Reservation'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Reservation the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Reservation::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Reservation $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='reservation-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionDynamiccities()
	{
			$region_id = $_POST['region_id'] ;
			$city_id = City::model()->findAll(array('select'=>'city_id,city_name','condition'=>"region_id='$region_id'"));
			$data = CHtml::listData($city_id,'city_id','city_name');
			echo CHtml::tag('option',array('value' => ''),CHtml::encode('Select City'),true);
			foreach($data as $id => $value)
			{
			echo CHtml::tag('option',array('value' => $id),CHtml::encode($value),true);
			}
	}
	public function actionDynamicvanities()
	{
	        $postCity_id = $_POST['city_id'];
	        $region = City::model()->find(array('select'=>'region_id','condition'=>"city_id=".$postCity_id));
 		    $region_id = $region->region_id;
			$sql = "select a.vanity_id,a.vanity_number from vanity a join agent b on b.agent_id = a.agent_id and b.region_id = ".$region_id." AND a.vanity_status = 'show'";
			$command=Yii::app()->db->createCommand($sql);
            $results=$command->query();
			$data = CHtml::listData($results,'vanity_id','vanity_number');
			echo CHtml::tag('option',array('value' => ''),CHtml::encode('Select City'),true);
			foreach($data as $id => $value)
			{
			echo CHtml::tag('option',array('value' => $id),CHtml::encode($value),true);
			}
	}
}
