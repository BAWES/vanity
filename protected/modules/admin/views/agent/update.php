<?php
$this->breadcrumbs=array(
	'Agents'=>array('index'),
	$model->agent_name=>array('view','id'=>$model->agent_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Manage Agents', 'url'=>array('index')),
	array('label'=>'Create Agent', 'url'=>array('create')),
	array('label'=>'View Agent', 'url'=>array('view', 'id'=>$model->agent_id)),
);
?>

<h1>Update Agent</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'regionDropdown' => $regionDropdown,)); ?>