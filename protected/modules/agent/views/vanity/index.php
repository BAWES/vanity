<?php
/* @var $this VanityController */
/* @var $model Vanity */

$this->breadcrumbs=array(
	'Vanities'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Add Number', 'url'=>array('create')),
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

<h1>Manage Vanity Number</h1>


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

<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/agent/vanity/sold">Sold Numbers</a>
