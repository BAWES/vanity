<?php
/* @var $this AgentController */
/* @var $model Agent */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'agent-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->label($model,'region_id'); ?>
		<?php $agent = Region::model()->findByPK($model->region_id);echo ucfirst($agent->region_name); ?>
		<?php echo $form->error($model,'region_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'agent_name'); ?>
		<?php echo $form->textField($model,'agent_name',array('size'=>60,'maxlength'=>160)); ?>
		<?php echo $form->error($model,'agent_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'agent_email'); ?>
		<?php echo $form->textField($model,'agent_email',array('size'=>60,'maxlength'=>180)); ?>
		<?php echo $form->error($model,'agent_email'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->