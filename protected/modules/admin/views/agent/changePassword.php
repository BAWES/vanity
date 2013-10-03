<?php
$this->breadcrumbs=array(
	'Agents'=>array('index'),
	$model->agent_name=>array('view','id'=>$model->agent_id),
	'Change Password',
);

$this->menu=array(
	array('label'=>'Manage Agents', 'url'=>array('index')),
	array('label'=>'Create Agent', 'url'=>array('create')),
	array('label'=>'View Agent', 'url'=>array('view', 'id'=>$model->agent_id)),
);
?>

<h1>Change Password for <?php echo $model->agent_name; ?></h1>

<?php echo $this->renderPartial('_changePwForm', array('model'=>$model)); ?>