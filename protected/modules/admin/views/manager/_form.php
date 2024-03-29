<?php
/* @var $this ManagerController */
/* @var $model Manager */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'manager-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'region_id'); ?>
		<?php echo $form->dropDownList($model,'region_id',$regionDropdown); ?>
		<?php echo $form->error($model,'region_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'manager_name'); ?>
		<?php echo $form->textField($model,'manager_name',array('size'=>60,'maxlength'=>160)); ?>
		<?php echo $form->error($model,'manager_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'manager_email'); ?>
		<?php echo $form->textField($model,'manager_email',array('size'=>60,'maxlength'=>160)); ?>
		<?php echo $form->error($model,'manager_email'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->