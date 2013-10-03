<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'agent-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'agent_password'); ?>
		<?php echo $form->textField($model,'agent_password',array('size'=>50,'maxlength'=>50,'value'=>'')); ?>
		<?php echo $form->error($model,'agent_password'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Change Password'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->