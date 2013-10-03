<?php
/* @var $this RegionController */
/* @var $model Region */

$this->breadcrumbs=array(
	'Regions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Regions', 'url'=>array('index')),
);
?>

<h1>Create Region</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>