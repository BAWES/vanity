<?php
/* @var $this VanityController */
/* @var $model Vanity */

$this->breadcrumbs=array(
	'Vanities'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Number', 'url'=>array('index')),
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

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p> -->

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php //$this->renderPartial('_search',array(	'model'=>$model,)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'vanity-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'vanity_number',
		'vanity_status',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/agent/vanity/sold">Sold Numbers</a>
