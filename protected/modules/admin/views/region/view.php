<?php
/* @var $this RegionController */
/* @var $model Region */

$this->breadcrumbs=array(
	'Regions'=>array('index'),
	$model->region_name,
);

$this->menu=array(
	array('label'=>'List Regions', 'url'=>array('index')),
	array('label'=>'Create Region', 'url'=>array('create')),
	array('label'=>'Update Region', 'url'=>array('update', 'id'=>$model->region_id)),
	array('label'=>'Delete Region', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->region_id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Region - <?php echo $model->region_name; ?></h1>

<br/>
<h2>Region Managers</h2>
<ul>
    <?php
    foreach($model->managers as $manager){
        echo "<li><a href='".Yii::app()->createUrl('admin/manager/view',array('id'=>$manager->manager_id))."'>".$manager->manager_name."</a></li>";
    }
    ?>
</ul>

<br/>
<h2>Region Agents</h2>
<ul>
    <?php
    foreach($model->agents as $agent){
        echo "<li><a href='".Yii::app()->createUrl('admin/agent/view',array('id'=>$agent->agent_id))."'>".$agent->agent_name."</a></li>";
    }
    ?>
</ul>

<br/>
<h2>Region Cities</h2>
<ul>
    <?php
    foreach($model->cities as $city){
        echo "<li><a href='".Yii::app()->createUrl('admin/city/view',array('id'=>$city->city_id))."'>".$city->city_name."</a></li>";
    }
    ?>
</ul>

