<?php
/* @var $this VanityController */
/* @var $model Vanity */

$this->breadcrumbs=array(
	'Vanities'=>array('index'),
	$model->vanity_id,
);

$this->menu=array(
	array('label'=>'List Vanity', 'url'=>array('index')),
	array('label'=>'Create Vanity', 'url'=>array('create')),
	array('label'=>'Update Vanity', 'url'=>array('update', 'id'=>$model->vanity_id)),
	array('label'=>'Delete Vanity', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->vanity_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Vanity', 'url'=>array('admin')),
);
?>

<h1>View Vanity #<?php echo $model->vanity_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'vanity_id',
		'agent_id',
		'vanity_number',
		'vanity_status',
	),
)); ?>
