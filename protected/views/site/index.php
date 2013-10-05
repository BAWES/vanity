<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1> <i>Select package Here</i></h1>
<?php foreach($package as $val){ ?>
<div>
  <?php echo CHtml::button($val->package_name, array('submit' => array('/reservation/create/package_id/'.$val->package_id))); ?>
</div>
<?php } ?>

