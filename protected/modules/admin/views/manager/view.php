<?php
/* @var $this ManagerController */
/* @var $model Manager */

$this->breadcrumbs=array(
	'Managers'=>array('index'),
	$model->manager_id,
);

$this->menu=array(
	array('label'=>'List Managers', 'url'=>array('index')),
	array('label'=>'Create Manager', 'url'=>array('create')),
	array('label'=>'Update Manager', 'url'=>array('update', 'id'=>$model->manager_id)),
	array('label'=>'Delete Manager', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->manager_id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Manager #<?php echo $model->manager_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'manager_id',
		'region_id',
		'manager_name',
		'manager_email',
	),
)); ?>
