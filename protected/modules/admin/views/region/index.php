<?php
/* @var $this RegionController */
/* @var $model Region */

$this->breadcrumbs=array(
	'Regions'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create Region', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#region-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Regions</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'region-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'region_id',
		'region_name',
                array(
                    'name'=>'Cities',
                    'value'=>'$data->cityCount',
                    'filter'=>false,
                ),
                array(
                    'name'=>'Agents',
                    'value'=>'$data->agentCount',
                    'filter'=>false,
                ),
                array(
                    'name'=>'Managers',
                    'value'=>'$data->managerCount',
                    'filter'=>false,
                ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
