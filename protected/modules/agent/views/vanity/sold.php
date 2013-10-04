<?php
/* @var $this VanityController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Vanities',
);

$this->menu=array(
	array('label'=>'Add Number', 'url'=>array('create')),
	array('label'=>'Manage Vanity', 'url'=>array('admin')),
);
?>

<h1>Sold Numbers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_sold',
)); ?>
