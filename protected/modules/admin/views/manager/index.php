<?php
/* @var $this ManagerController */
/* @var $model Manager */

$this->breadcrumbs=array(
	'Managers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create Manager', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#manager-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Managers</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'manager-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'manager_id',
		'region_id',
		'manager_name',
		'manager_email',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
