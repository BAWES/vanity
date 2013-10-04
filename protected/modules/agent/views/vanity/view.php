<?php
/* @var $this VanityController */
/* @var $model Vanity */

$this->breadcrumbs=array(
	'Vanities'=>array('index'),
	$model->vanity_id,
);

$this->menu=array(
	array('label'=>'List Number', 'url'=>array('index')),
	array('label'=>'Add Number', 'url'=>array('create')),
	array('label'=>'Update Number', 'url'=>array('update', 'id'=>$model->vanity_id)),
	array('label'=>'Delete Number', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->vanity_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Number', 'url'=>array('admin')),
);
?>

<h1>View Vanity Number #<?php echo $model->vanity_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'vanity_number',
		'vanity_status',
	),
)); ?>
