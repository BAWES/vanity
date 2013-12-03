<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

       
       <div class="vwrapperin">
		<div class="logo">
            <a href="javascript:void(0)"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" width="78" alt="Zain (Logo)"></a>
        </div><!--logo-->
		<div class="vbox">
			<div class="vtop">
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/Speed_4G.png" class="vspeed">
			</div>
			<div class="vtext">
				هي الباقة التي عملنا جادين لتقديمها للنخبة، ونسعى بتفاني لنقلك لأعلى مستويات التفرد والتميز في كل وسائل الإتصال وعبر جميع فروعنا ومراكز خدماتنا.

 باقة مزايا ايليت تمنحك خصماً مباشر يساوي 1,500 ريال على كافة الأجهزة الذكية، كما تهديك رقماً مميز وتتيح لك التواصل المجاني واللامحدود على جميع الشبكات المحلية عبر الدقائق والرسائل النصية والبيانات.

ولمعرفة المزيد حول باقة ايليت تفضل بزيارة الرابط التالي <a href="https://www.sa.zain.com/autoforms/portal/site/personal/postpaid/mazayaelite">(لمزيد من التفاصيل)</a>
			</div>
			<div class="vbottom">
				<div class="vbutton" id="1" >(لمزيد من التفاصيل)</div>
			</div>
		</div>
		<div class="vbox">
			<div class="vtop">
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/MazayaElite.png">
			</div>
			<div class="vtext">
				هي الباقة التي عملنا جادين لتقديمها للنخبة، ونسعى بتفاني لنقلك لأعلى مستويات التفرد والتميز في كل وسائل الإتصال وعبر جميع فروعنا ومراكز خدماتنا.

 باقة مزايا ايليت تمنحك خصماً مباشر يساوي 1,500 ريال على كافة الأجهزة الذكية، كما تهديك رقماً مميز وتتيح لك التواصل المجاني واللامحدود على جميع الشبكات المحلية عبر الدقائق والرسائل النصية والبيانات.
 ولمعرفة المزيد حول باقة ايليت تفضل بزيارة الرابط التالي <a href="https://www.sa.zain.com/autoforms/portal/site/personal/postpaid/mazayaelite">(لمزيد من التفاصيل)</a>
			</div>
			<div class="vbottom">
				<div class="vbutton" id="2"  >(لمزيد من التفاصيل)</div>
			</div>
		</div>
	</div>
	<div class="bg2">
        <div class="logo">
            <a href="javascript:void(0)"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" width="78" alt="Zain (Logo)"></a>
        </div><!--logo-->
        
        <div class="form_wrapper">
            <div class="formbg">
                <h1 id="h1txt"></h1>
                
				<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'reservation-form',
				// Please note: When you enable ajax validation, make sure the corresponding
				// controller action is handling ajax validation correctly.
				// There is a call to performAjaxValidation() commented in generated controller code.
				// See class documentation of CActiveForm for details on this.
				'enableAjaxValidation'=>true,
				   'clientOptions'=>array(
					'validateOnSubmit'=>true,
					'validateOnChange'=>false,
					'validateOnType'=>false,
					),
					'enableClientValidation'=>true,
				)); ?>
				     <input type="hidden" name="package_id" id="package_id" value="" />
					 <div class="formerrors">
					<?php echo $form->error($model,'reservation_name'); ?>
					 <?php echo $form->error($model,'reservation_phone'); ?>
					 <?php echo $form->error($model,'reservation_email'); ?>
					 <?php echo $form->error($model,'region_id'); ?>
					 <?php echo $form->error($model,'city_id'); ?>
					 <?php echo $form->error($model,'vanity_id'); ?>
					 </div>
					 
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
            <p>سيتم التواصل معك خلال ٤٨ ساعة في أيام العمل الرسمية</p>
            
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
if(data==='validation'){
return false;
}else{
$(".bg3").animate({top:'0px'},600);
}
},
error: function(data) { // if error occured
alert("Error occured.please try again");
},
dataType:'html'
});

}
 
</script>
