<?php
/* @var $this CityController */
/* @var $model City */

$this->breadcrumbs=array(
	'Cities'=>array('index'),
	$model->city_name=>array('view','id'=>$model->city_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cities', 'url'=>array('index')),
	array('label'=>'Create City', 'url'=>array('create')),
	array('label'=>'View City', 'url'=>array('view', 'id'=>$model->city_id)),
);
?>

<h1>Update City - <?php echo $model->city_name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'regionDropdown'=>$regionDropdown)); ?>