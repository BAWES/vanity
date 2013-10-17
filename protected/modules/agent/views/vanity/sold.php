<?php
/* @var $this VanityController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Vanity Numbers'=>array('index'),
        'Sold Numbers'
);

$this->menu=array(
	array('label'=>'Add Number', 'url'=>array('create')),
	array('label'=>'View Vanity Numbers', 'url'=>array('index')),
    
);
?>

<h1>Sold Numbers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_sold',
)); ?>
