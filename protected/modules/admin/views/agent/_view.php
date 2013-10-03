<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('agent_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->agent_id), array('view', 'id'=>$data->agent_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agent_name')); ?>:</b>
	<?php echo CHtml::encode($data->agent_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agent_email')); ?>:</b>
	<?php echo CHtml::encode($data->agent_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agent_password')); ?>:</b>
	<?php echo CHtml::encode("***"); ?>
	<br />


</div>