<?php
/* @var $this CityController */
/* @var $model City */

$this->breadcrumbs=array(
	'Cities'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cities', 'url'=>array('index')),
);
?>

<h1>Create City</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'regionDropdown'=>$regionDropdown)); ?>