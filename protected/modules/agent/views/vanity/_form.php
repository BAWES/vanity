<?php
/* @var $this VanityController */
/* @var $model Vanity */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vanity-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'agent_id'); ?>
		<?php echo $form->textField($model,'agent_id'); ?>
		<?php echo $form->error($model,'agent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vanity_number'); ?>
		<?php echo $form->textField($model,'vanity_number',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'vanity_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vanity_status'); ?>
		<?php echo $form->textField($model,'vanity_status',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'vanity_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->