<?php
/* @var $this VanityController */
/* @var $model Vanity */

$this->breadcrumbs=array(
	'Vanity Numbers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Numbers', 'url'=>array('index')),
);
?>

<h1>Add Number</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>