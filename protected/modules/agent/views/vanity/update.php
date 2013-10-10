<?php
/* @var $this VanityController */
/* @var $model Vanity */

$this->breadcrumbs=array(
	'Vanities'=>array('index'),
	$model->vanity_id=>array('view','id'=>$model->vanity_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Vanity', 'url'=>array('index')),
	array('label'=>'Create Vanity', 'url'=>array('create')),
	array('label'=>'View Vanity', 'url'=>array('view', 'id'=>$model->vanity_id)),
);
?>

<h1>Update Number <?php echo $model->vanity_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>