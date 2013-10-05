<h2>Sucessfully reserved your vanity number with below details</h2>
<?php 
$vanity_number = Vanity::model()->findByPK($model->vanity_id);
$package = Package::model()->findByPK($model->package_id);
$pakage_name = !empty($package->package_name) ? $package->package_name : 'Not set';

?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
		'label' => 'Number',
		'value' =>$vanity_number->vanity_number,
		),
		array(
		'label' => 'Package',
		'value' =>$pakage_name,
		),
		'reservation_name',
		'reservation_phone',
		'reservation_email',
		'reservation_datetime',
	),
)); ?>
