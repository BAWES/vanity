<?php
/* @var $this VanityController */
/* @var $data Vanity */
?>

<div class="view">
		<b><?php echo CHtml::encode($data->getAttributeLabel('vanity_number')); ?>:</b>
	<?php echo CHtml::encode($data->vanity_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vanity_status')); ?>:</b>
	<?php echo CHtml::encode($data->vanity_status); ?>
	<br />


</div>