<?php
/* @var $this VanityController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Vanities'=>array('index'),
);

$this->menu=array(
	
	array('label'=>'List Vanity', 'url'=>array('index')),
    array('label'=>'Add Number', 'url'=>array('create')),
);
?>

<h1>Sold Numbers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_sold',
)); ?>
