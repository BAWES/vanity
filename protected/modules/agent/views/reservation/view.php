<?php
/* @var $this ReservationController */
/* @var $model Reservation */

$vanity_number = $model->vanity;
$package = $model->package;
$pakage_name = !empty($package->package_name) ? $package->package_name : 'Not set';
$city = $model->city;
$city_name = !empty($city->city_name) ? $city->city_name : 'Not set';
$region = $model->region;
$region_name = !empty($region->region_name) ? $region->region_name : 'Not set';



$this->breadcrumbs=array(
	'Reservations'=>array('index'),
	$model->reservation_name,
);

$this->menu=array(
	array('label'=>'List Reservations', 'url'=>array('index')),
	//array('label'=>'Create Reservation', 'url'=>array('create')),
	//array('label'=>'Update Reservation', 'url'=>array('update', 'id'=>$model->reservation_id)),
	array('label'=>'Delete Reservation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->reservation_id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Reservation #<?php echo $model->reservation_id; ?></h1>

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
		array(
		'label' => 'City',
		'value' =>$city_name,
		),
		array(
		'label' => 'Region',
		'value' =>$region_name,
		),
		'reservation_best_time_to_call',
	),
)); ?>
