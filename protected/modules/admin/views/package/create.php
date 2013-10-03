<?php
/* @var $this PackageController */
/* @var $model Package */

$this->breadcrumbs=array(
	'Packages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Packages', 'url'=>array('index')),
);
?>

<h1>Create Package</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>