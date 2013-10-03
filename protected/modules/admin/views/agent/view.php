<?php
$this->breadcrumbs=array(
	'Agents'=>array('index'),
	$model->agent_name,
);

$this->menu=array(
	array('label'=>'Manage Agents', 'url'=>array('index')),
	array('label'=>'Create Agent', 'url'=>array('create')),
	array('label'=>'Update Agent', 'url'=>array('update', 'id'=>$model->agent_id)),
	array('label'=>'Change Password', 'url'=>array('changePassword', 'id'=>$model->agent_id)),
	array('label'=>'Delete Agent', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->agent_id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1><?php echo $model->agent_name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'agent_id',
		'agent_name',
		'agent_email',
	),
)); ?>
