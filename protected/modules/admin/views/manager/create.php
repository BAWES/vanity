<?php
/* @var $this ManagerController */
/* @var $model Manager */

$this->breadcrumbs=array(
	'Managers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Managers', 'url'=>array('index')),
);
?>

<h1>Create Manager</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>