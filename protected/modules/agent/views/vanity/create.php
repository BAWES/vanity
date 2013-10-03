<?php
/* @var $this VanityController */
/* @var $model Vanity */

$this->breadcrumbs=array(
	'Vanities'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Vanity', 'url'=>array('index')),
	array('label'=>'Manage Vanity', 'url'=>array('admin')),
);
?>

<h1>Create Vanity</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>