<?php
/* @var $this VanityController */
/* @var $data Vanity */
?>

<div class="view">
<div style="float:left">
<b><?php echo CHtml::encode($data->getAttributeLabel('vanity_number')); ?>:</b>
   <?php echo CHtml::encode($data->vanity_number); ?>
</div>
<div style="float:right">
<b><a href='<?php echo Yii::app()->createUrl('agent/vanity/cancelsale', array('id' => $data->vanity_id))?>'> Cancel Sale </a>
</div>
<br>
</div>