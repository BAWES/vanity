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
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','create','ajaxCreate'),
				'users'=>array('*'),
			),

		);
	}

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
	
		$model=new Reservation;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Reservation']))
		{
			$model->attributes=$_POST['Reservation'];
			
			
			$model->reservation_datetime = new CDbExpression('NOW()');
			$model->package_id = $_REQUEST['package_id'];
			/*if($model->save()){
			    $model_vanity=Vanity::model()->findByPk($model->vanity_id);
				$model_agent=Agent::model()->findByPk($model->agent_id);
				$model_region=Region::model()->findByPk($model->package_id);
				$model_activity = new Activity();
				$model_activity->text = 'User '.$model->reservation_name.' made new reservation ('.$model_vanity->vanity_number.') , assigned to agent '.$model_agent->agent_name.' in area '.$model_region->region_name.' ';
				$model_activity->usertype = 'user';
				$model_activity->datetime = new CDbExpression('NOW()');
				$model_activity->insert();
				Vanity::model()->updateByPk($model->vanity_id,array("vanity_status"=>'reserved')); 
				$this->redirect(array('view','id'=>$model->reservation_id));
			}*/		
		}
		// fetching available vanity number with related agent
		$vanityDropdown = CHtml::listData(Vanity::model()->findAll('vanity_status="show"'),'vanity_id', 'vanity_number');$regionDropdown = CHtml::listData(Region::model()->findAll(),'region_id', 'region_name');
		$this->render('create',array(
		'model'=>$model,
		'vanityDropdown'=>$vanityDropdown,
		'regionDropdown'=>$regionDropdown,
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

		if(isset($_POST['Reservation']))
		{
			$model->attributes=$_POST['Reservation'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->reservation_id));
		}
        // fetching available package
		$packageDropdown = CHtml::listData(Package::model()->findAll(), 'package_id', 'package_name');
		// fetching available vanity number with related agent
		$vanityDropdown = CHtml::listData(Vanity::model()->findAll('agent_id='.Yii::app()->user->getState('agent_id').' AND vanity_status="show"'),'vanity_id', 'vanity_number');
		$this->render('update',array(
			'model'=>$model,
			'packageDropdown' => $packageDropdown,
		     'vanityDropdown'=>$vanityDropdown,
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
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Reservation');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Reservation('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Reservation']))
			$model->attributes=$_GET['Reservation'];

		$this->render('admin',array(
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
	/**
	* Fetching dynamiccities belong to region wise
	**/
	public function actionDynamiccities()
	{
	        $region_id = $_POST['region_id'] ;
			$city_id = City::model()->findAll(array('select'=>'city_id,city_name','condition'=>"region_id='$region_id'"));
			$data = CHtml::listData($city_id,'city_id','city_name');
			echo CHtml::tag('option',array('value' => ''),CHtml::encode('المدينة'),true);
			foreach($data as $id => $value)
			{
			echo CHtml::tag('option',array('value' => $id),CHtml::encode($value),true);
			}
	}
	/**
	* Fetching dynamic vanity number belongs to city and city belongs to region
	**/

	public function actionDynamicvanities()
	{
	        $postCity_id = $_POST['city_id'];
	        $region = City::model()->find(array('select'=>'region_id','condition'=>"city_id=".$postCity_id));
 		    $region_id = $region->region_id;
			$sql = "select a.vanity_id,a.vanity_number from vanity a join agent b on b.agent_id = a.agent_id and b.region_id = ".$region_id." AND a.vanity_status = 'show'";
			$command=Yii::app()->db->createCommand($sql);
            $results=$command->query();
			$data = CHtml::listData($results,'vanity_id','vanity_number');
			echo CHtml::tag('option',array('value' => ''),CHtml::encode('رقم الهاتف'),true);
			foreach($data as $id => $value)
			{
			echo CHtml::tag('option',array('value' => $id),CHtml::encode($value),true);
			}
	}
	public function actionAjaxCreate()
	{
	
		$model=new Reservation;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Reservation']))
		{
		    $model->attributes=$_POST['Reservation'];
			$model->reservation_datetime = new CDbExpression('NOW()');
		    $model->package_id = (int) $_REQUEST['package_id'];
			$model->vanity_id  = isset($_POST['Reservation']['vanity_id']) ? $_POST['Reservation']['vanity_id'] : 0 ;
			if($model->save()){
			    $model_vanity=Vanity::model()->findByPk($model->vanity_id);
				$model_region=Region::model()->findByPk($model->region_id);
				$model_agent=Agent::model()->findByAttributes(array('region_id'=>$model->region_id));
				$model_activity = new Activity();
				if($model->vanity_id!=0){
				$model_activity->text = 'User '.$model->reservation_name.' reserved number '.$model_vanity->vanity_number.' assigned to agent '.$model_agent->agent_name. ' in area '.$model_region->region_name ;
				}else{
				$model_activity->text = 'User '.$model->reservation_name.' selected speed4G package ';
				}
				$model_activity->usertype = 'user';
				$model_activity->datetime = new CDbExpression('NOW()');
				$model_activity->insert();
			    Vanity::model()->updateByPk($model->vanity_id,array("vanity_status"=>'reserved')); 
				
			}else{
                 echo "validation";
            }			
		}
	}	
}