<?php
/* @var $this ReservationController */
/* @var $model Reservation */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reservation-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'reservation_name'); ?>
		<?php echo $form->textField($model,'reservation_name',array('size'=>60,'maxlength'=>180)); ?>
		<?php echo $form->error($model,'reservation_name'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'reservation_phone'); ?>
		<?php echo $form->textField($model,'reservation_phone',array('size'=>60,'maxlength'=>160)); ?>
		<?php echo $form->error($model,'reservation_phone'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'reservation_email'); ?>
		<?php echo $form->textField($model,'reservation_email',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'reservation_email'); ?>
	</div>
   <div class="row">
		<?php echo $form->labelEx($model,'region_id'); ?>
		<?php echo $form->dropDownList($model,'region_id',$regionDropdown,array('prompt'=>'--Select Region--',
		'ajax' => array(
		'type' => 'POST',
		'url' => CController::createUrl('reservation/dynamiccities'),
		'update'=>'#Reservation_city_id',
		'data'=>array('region_id'=>'js:this.value'),
		))); ?>
		<?php echo $form->error($model,'region_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'city_id'); ?>
		<?php
		$allCities = new CDbCriteria;
		$allCities->order = 'city_name ASC';
		echo  $form->dropDownList($model,'city_id',CHtml::listData(City::model()->findAll($allCities),'city_id','city_name'),
		array(
		'prompt'=>'--Select City--',
		'ajax' => array(
		'type' => 'POST',
		'url' => CController::createUrl('reservation/dynamicvanities'),
		'update'=>'#Reservation_vanity_id',
		'data'=>array('city_id'=>'js:this.value'),
		)));
		?>
		<?php echo $form->error($model,'city_id'); ?>
	</div>
		<div class="row">
		<?php echo $form->labelEx($model,'vanity_id'); ?>
		<?php echo $form->dropDownList($model,'vanity_id',array('empty' => '--Select a number--')); ?>
		<?php echo $form->error($model,'vanity_id'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
<?php $this->endWidget(); ?>
</div><!-- form -->