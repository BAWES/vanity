<?php
/* @var $this VanityController */
/* @var $data Vanity */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('vanity_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->vanity_id), array('view', 'id'=>$data->vanity_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agent_id')); ?>:</b>
	<?php echo CHtml::encode($data->agent_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vanity_number')); ?>:</b>
	<?php echo CHtml::encode($data->vanity_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vanity_status')); ?>:</b>
	<?php echo CHtml::encode($data->vanity_status); ?>
	<br />


</div>