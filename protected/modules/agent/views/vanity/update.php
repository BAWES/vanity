<?php
/* @var $this VanityController */
/* @var $model Vanity */

$this->breadcrumbs=array(
	'Vanity Numbers'=>array('index'),
	$model->vanity_number=>array('view','id'=>$model->vanity_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Vanity Numbers', 'url'=>array('index')),
	array('label'=>'Create Vanity Number', 'url'=>array('create')),
	array('label'=>'View Vanity Number', 'url'=>array('view', 'id'=>$model->vanity_id)),
);
?>

<h1>Update Number - <?php echo $model->vanity_number; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>