<?php
/* @var $this PackageController */
/* @var $model Package */

$this->breadcrumbs=array(
	'Packages'=>array('index'),
	$model->package_name=>array('view','id'=>$model->package_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Packages', 'url'=>array('index')),
	array('label'=>'Create Package', 'url'=>array('create')),
	array('label'=>'View Package', 'url'=>array('view', 'id'=>$model->package_id)),
);
?>

<h1>Update Package - <?php echo $model->package_name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>