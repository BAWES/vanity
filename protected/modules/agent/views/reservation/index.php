<?php
/* @var $this ReservationController */
/* @var $model Reservation */

$this->breadcrumbs=array(
	'Reservations'=>array('index'),
	'Manage',
);

$this->menu=array(
);

$this->layout = 'column1';

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#reservation-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Reservations</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php //$this->renderPartial('_search',array(	'model'=>$model,)); ?>
</div><!-- search-form -->

<?php 
$vanity_number = Vanity::model()->findByPK($model->vanity_id);
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reservation-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
            'name' => 'vanity_id',
            'value' => '$data->vanity->vanity_number',
        ),
		array(
            'name' => 'package_id',
            'value' => '$data->package->package_name',
        ),
		'reservation_name',
		'reservation_phone',
		'reservation_email',
		array(
			'class'=>'CButtonColumn',
                    'template'=>'{view}',
		),
	),
)); ?>
