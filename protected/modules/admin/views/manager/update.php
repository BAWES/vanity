<?php
/* @var $this ManagerController */
/* @var $model Manager */

$this->breadcrumbs=array(
	'Managers'=>array('index'),
	$model->manager_id=>array('view','id'=>$model->manager_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Managers', 'url'=>array('index')),
	array('label'=>'Create Manager', 'url'=>array('create')),
	array('label'=>'View Manager', 'url'=>array('view', 'id'=>$model->manager_id)),
);
?>

<h1>Update Manager <?php echo $model->manager_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>