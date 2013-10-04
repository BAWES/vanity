<?php
/* @var $this ReservationController */
/* @var $model Reservation */

$this->breadcrumbs=array(
	'Reservations'=>array('index'),
	$model->reservation_id,
);

$this->menu=array(
	array('label'=>'List Reservation', 'url'=>array('index')),
	array('label'=>'Create Reservation', 'url'=>array('create')),
	array('label'=>'Update Reservation', 'url'=>array('update', 'id'=>$model->reservation_id)),
	array('label'=>'Delete Reservation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->reservation_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Reservation', 'url'=>array('admin')),
);
?>

<h1>View Reservation #<?php echo $model->reservation_id; ?></h1>
<?php 
$vanity_number = Vanity::model()->findByPK($model->vanity_id);
$package = Package::model()->findByPK($model->package_id);
$pakage = isset($package) ? $package->package : 'Not set';
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
		'value' =>$package,
		),
		
		'reservation_name',
		'reservation_phone',
		'reservation_email',
		'reservation_datetime',
	),
)); ?>
