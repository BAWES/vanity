<?php
/* @var $this ReservationController */
/* @var $data Reservation */
?>

<div class="view">
	<b><?php echo CHtml::encode($data->getAttributeLabel('vanity_id')); ?>:</b>
	
	<?php $vanity_number = Vanity::model()->findByPK($data->vanity_id); echo $vanity_number->vanity_number; ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('package_id')); ?>:</b>
	<?php 
     $package = Package::model()->findByPK($data->package_id);
     echo $pakage = isset($package) ? $package->package : 'Not set';
	?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reservation_name')); ?>:</b>
	<?php echo CHtml::encode($data->reservation_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reservation_phone')); ?>:</b>
	<?php echo CHtml::encode($data->reservation_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reservation_email')); ?>:</b>
	<?php echo CHtml::encode($data->reservation_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reservation_datetime')); ?>:</b>
	<?php echo CHtml::encode($data->reservation_datetime); ?>
	<br />


</div>