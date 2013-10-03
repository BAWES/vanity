<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'agent-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        
        <div class="row">
		<?php echo $form->labelEx($model,'region_id'); ?>
		<?php echo $form->textField($model,'region_id',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'region_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'agent_name'); ?>
		<?php echo $form->textField($model,'agent_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'agent_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'agent_email'); ?>
		<?php echo $form->textField($model,'agent_email',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'agent_email'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'agent_password'); ?>
		<?php echo $form->passwordField($model,'agent_password',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'agent_password'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->