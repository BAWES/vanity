<?php
/* @var $this VanityController */
/* @var $model Vanity */

$this->breadcrumbs=array(
	'Vanity Numbers'=>array('index'),
);

$this->menu=array(
	array('label'=>'Add Number', 'url'=>array('create')),
	array('label'=>'View Sold Numbers', 'url'=>array('sold')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#vanity-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Vanity Numbers</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'vanity-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'vanity_number',
		'vanity_status',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{delete}{sold}',
			'buttons'=>array
            (
		       'sold' =>array(
			      'imageUrl'=>Yii::app()->request->baseUrl.'/images/sold.png',
				  'visible'=>'$data->vanity_status!="sold"',
				  'url'=>'Yii::app()->controller->createUrl("soldstatus",array("id"=>$data->primaryKey))',
			   ),
		    ),
		),
	),
)); ?>
