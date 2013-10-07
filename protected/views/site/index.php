<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class="bg1">
        <div class="logo">
            <a href="javascript:void(0)"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" width="78" alt="Zain (Logo)"></a>
        </div><!--logo-->
        <div class="mazorspeed">
            <div class="mazorspeed_box">
			<?php 
			$i=1;
			foreach($package as $val){ 
			$class =  ($i%2==0) ? '' : 'btnSpeed'; ?>
 		        <a class="btnMaza <?=$class; ?>" id="<?=$val->package_id;?>" href="javascript:void(0)"><?php echo $val->package_name; ?></a><!--btnMaza-->
				<?php if($i%2==0){?>
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/or.png" width="100" alt="">
				<?php } ?>
                <!--<a class="btnSpeed btnMaza" href="javascript:void(0)">SPEED 4G</a>--><!--btnSpeed-->
			<?php $i++; } ?>	
            </div><!--mazorspeed_box-->
        </div><!--mazorspeed-->
    </div><!--bg1-->
	<div class="bg2">
        <div class="logo">
            <a href="javascript:void(0)"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" width="78" alt="Zain (Logo)"></a>
        </div><!--logo-->
        
        <div class="form_wrapper">
            <div class="formbg">
                <h1>مـزايـا</h1>
                
				<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'reservation-form',
				// Please note: When you enable ajax validation, make sure the corresponding
				// controller action is handling ajax validation correctly.
				// There is a call to performAjaxValidation() commented in generated controller code.
				// See class documentation of CActiveForm for details on this.
				'enableAjaxValidation'=>true,
				   'htmlOptions'=>array(
                               'onsubmit'=>"return false;",/* Disable normal form submit */
                               ),
				)); ?>
				     <input type="hidden" name="package_id" id="package_id" value="" />
					
					<?php echo $form->textField($model,'reservation_name',array('placeholder'=>'الأسم','class'=>'name','dir'=>'rtl')); ?>
					 <?php echo $form->textField($model,'reservation_phone',array('placeholder'=>'رقم الجوال','class'=>'phone','dir'=>'rtl')); ?>
					<?php echo $form->textField($model,'reservation_email',array('placeholder'=>'البريد الإلكتروني','class'=>'mail','dir'=>'rtl')); ?>
					<?php echo $form->dropDownList($model,'region_id',$regionDropdown,array(
					'class'=>'select_one',
					'prompt'=>'المنطقة',
					'dir'=>'rtl',
					'ajax' => array(
					'type' => 'POST',
					'url' => CController::createUrl('reservation/dynamiccities'),
					'update'=>'#Reservation_city_id',
					'data'=>array('region_id'=>'js:this.value'),
					))); ?>
					<?php
					$allCities = new CDbCriteria;
					$allCities->order = 'city_name ASC';
					echo  $form->dropDownList($model,'city_id',CHtml::listData(City::model()->findAll($allCities),'city_id','city_name'),
					array(
					'prompt'=>'المدينة',
					'class'=>'select_two',
					'dir'=>'rtl',
					'ajax' => array(
					'type' => 'POST',
					'url' => CController::createUrl('reservation/dynamicvanities'),
					'update'=>'#Reservation_vanity_id',
					'data'=>array('city_id'=>'js:this.value'),
					)));
					?>
					  <select name="Reservation[vanity_id]" id="Reservation_vanity_id" class="select_three" dir="rtl">
                          <option value="">رقم الهاتف</option>
                     </select>
                     <?php echo CHtml::submitButton($model->isNewRecord ? 'تم' : 'تم',array('class'=>'next')); ?>
                     <input type="reset" name="" class="reset" value="إلغاء">
                <?php $this->endWidget(); ?>
            </div><!--formbg-->
        </div><!--form_wrapper-->

        
    </div><!--bg2-->
	    <div class="bg3">
        <div class="logo">
            <a href="javascript:void(0)"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" width="78" alt="Zain (Logo)"></a>
        </div><!--logo-->
        
        <div class="thankyoubox">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/dil.png" width="420" alt="">
            <h3>شكراً لك</h3>
            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها.</p>
            
            <a href="javascript:void(0)">مشاركة</a>
        </div><!--thankyoubox-->

        
    </div><!--bg3-->
	
<script type="text/javascript">

function send()
{
var data=$("#reservation-form").serialize();
$.ajax({
type: 'POST',
url: '<?php echo Yii::app()->createAbsoluteUrl("reservation/ajaxcreate"); ?>',
data:data,
success:function(data){
$(".bg3").animate({top:'0px'},600);
},
error: function(data) { // if error occured
alert("Error occured.please try again");
},
dataType:'html'
});

}
 
</script>
