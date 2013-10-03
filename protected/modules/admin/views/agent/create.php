<?php
$this->breadcrumbs=array(
	'Agents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Agents', 'url'=>array('index')),
);
?>

<h1>Create Agent</h1>

<?php echo $this->renderPartial('_createform', array('model'=>$model)); ?>