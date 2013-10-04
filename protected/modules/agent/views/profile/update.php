<?php
/* @var $this AgentController */
/* @var $model Agent */
$this->menu=array(
	array('label'=>'My Profile', 'url'=>array('index')),
);
?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>