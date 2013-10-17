<?php
/* @var $this PackageController */
/* @var $model Package */

$this->breadcrumbs=array(
	'Packages'=>array('index'),
	'Manage',
);
$this->layout = 'column1';
$this->menu=array(
	//array('label'=>'Create Package', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#package-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Packages</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'package-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'package_id',
		'package_name',
                'reservationsCount',
		/*array(
			'class'=>'CButtonColumn',
		),*/
	),
)); ?>
