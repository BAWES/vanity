<?php
/* @var $this AgentController */
/* @var $model Agent */

$this->breadcrumbs=array(
	'Profile'=>array('index'),
	
);

$this->menu=array(
	
	
	array('label'=>'Update My profile', 'url'=>array('update', 'id'=>$model->agent_id)),
	
);
?>

<h1>My Profile</h1>

<?php 
$agent = Region::model()->findByPK($model->region_id);
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
		'label' => 'Region',
		'value' => ucfirst($agent->region_name),
		),
		'agent_name',
		'agent_email',
                'vanityCount',
                'soldVanityCount'
		
	),
)); ?>
