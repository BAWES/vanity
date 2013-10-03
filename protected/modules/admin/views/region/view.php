<?php
/* @var $this RegionController */
/* @var $model Region */

$this->breadcrumbs=array(
	'Regions'=>array('index'),
	$model->region_name,
);

$this->menu=array(
	array('label'=>'List Regions', 'url'=>array('index')),
	array('label'=>'Create Region', 'url'=>array('create')),
	array('label'=>'Update Region', 'url'=>array('update', 'id'=>$model->region_id)),
	array('label'=>'Delete Region', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->region_id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Region - <?php echo $model->region_name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'region_id',
		'region_name',
	),
)); ?>
