<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

    <div class="v3top">
        <div class="v3topSub">
            <div class="v3topLogo">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logov3.png" alt="" width="103" height="142">
            </div>
            
            <div class="v3topData">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/mazayav3.png" alt="" height="107" width="379">
                <p dir='rtl' lang='ar'>
                    هي الباقة التي عملنا جادين لتقديمها للنخبة، ونسعى بتفاني لنقلك لأعلى
                    مستويات التفرد والتميز في كل وسائل الإتصال وعبر جميع فروعنا ومراكز
                    خدماتنا. باقة مزايا ايليت تمنحك خصماً مباشر يساوي 1,500 ريال على كافة
                    الأجهزة الذكية، كما تهديك رقماً مميز وتتيح لك التواصل المجاني
                    واللامحدود على جميع الشبكات المحلية عبر الدقائق والرسائل النصية
                    والبيانات. ولمعرفة المزيد حول الخصم المباشر للأجهزة،
                    تفضل بزيارة الرابط التالي (لمزيد من التفاصيل)
                </p>
            </div>

            <div class="v3clearfix">&nbsp;</div>
            
            <a class="linked" id="2" href="javascript:void(0)" dir='rtl' lang='ar'>
                احجز رقمك!
            </a>

        </div>

    </div>

    <div class="v3mid">

        <div class="v3midSub">
            <div class="v3midData">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/speedv3.png" alt="" height="41" width="167">
                <p dir='rtl' lang='ar'>
                    تمتع بإنترنت غير محدود أينما كنت مع أفضل مشغل 4G في المملكة،
                    واحصل على أحدث أجهزة سبيد 4G مجاناً، كل ذلك ابتداء من 100 ريال شهرياً.
                    تعد تقنية الجيل الرابع 4G من أحدث تقنيات الاتصالات حول العالم،
                    حيث توفر سرعة هائلة لنقل بيانات عبر الشبكة تصل حتى 150 ميجابت
                    في الثانية  لتوفر بذلك تجربة إنترنت مثالية، سواء لألعاب الإنترنت،
                    أو مشاهدة البث المباشر بتقنية الـ HD، أو تحميل الملفات بسرعة فائقة.
                    تفضل بزيارة الرابط التالي (لمزيد من التفاصيل)
                </p>
            </div>
            <div class="v3clearfix">&nbsp;</div>
            <a class="linked" id="1" href="javascript:void(0)" dir='rtl' lang='ar'>
                احجز باقتك!
            </a>
        </div>

    </div>

	<div class="bg2">
        <div class="logo">
            <a href="javascript:void(0)"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" width="78" alt="Zain (Logo)"></a>
        </div><!--logo-->
        
        <div class="form_wrapper">
            <div class="formbg">
                <!--<h1 id="h1txt"></h1>-->
                <div id='imagetab' >
				<img id="dynamic_img" style="width:171px" src=""></div>
				<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'reservation-form',
				// Please note: When you enable ajax validation, make sure the corresponding
				// controller action is handling ajax validation correctly.
				// There is a call to performAjaxValidation() commented in generated controller code.
				// See class documentation of CActiveForm for details on this.
				'enableAjaxValidation'=>true,
				   'clientOptions'=>array(
					'validateOnSubmit'=>true,
					'validateOnChange'=>true,
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
					echo  $form->dropDownList($model,'city_id',array(),
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
					
					  <select  name="Reservation[vanity_id]" id="Reservation_vanity_id" class="select_three" dir="rtl">
                          <option value="">رقم الهاتف</option>
                     </select>
					<?php
					$timeing = array('9am-12'=>'9am-12','12-3'=>'12-3','3-6'=>'3-6','6-8pm'=>'6-8pm');
					echo  $form->dropDownList($model,'reservation_best_time_to_call',$timeing,
					array(
					'prompt'=>'أفضل وقت للتواصل',
					'dir'=>'rtl',
					));
					?>
				
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
            <!--<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/dil.png" width="420" alt="">-->
            <h3>شكراً لك</h3>
            <p>سيتم التواصل معك خلال ٤٨ ساعة في أيام العمل الرسمية</p>
            
            <a href="javascript:void(0)">مشاركة</a>
        </div><!--thankyoubox-->

        
    </div><!--bg3-->
	<script>
$(document).ready(function() {

	$(".linked").click(function(event) {
		$('#package_id').val(event.target.id);
		//$('#h1txt').text('MAZAYA');
		$("#dynamic_img").attr('src', '<?php echo Yii::app()->request->baseUrl; ?>/images/MazayaElite.png');
		if($('#package_id').val()=='1'){
		 // $('#h1txt').text('SPEED4G');
		  $("#dynamic_img").attr('src', '<?php echo Yii::app()->request->baseUrl; ?>/images/Speed_4G.png');
		  $('#Reservation_vanity_id').hide();
		}else{
		  $('#Reservation_vanity_id').show();
		}
		$("#Reservation_city_id").hide();
        $("#Reservation_vanity_id").hide();
		
		$("#Reservation_region_id").change(function()
        {
		  $("#Reservation_city_id").show();
		  
		});
		$("#Reservation_city_id").change(function()
        {
		  $("#Reservation_vanity_id").show();
		  if($('#package_id').val()=='1'){
		 // $('#h1txt').text('SPEED4G');
		  $("#dynamic_img").attr('src', '<?php echo Yii::app()->request->baseUrl; ?>/images/Speed_4G.png');
		  $('#Reservation_vanity_id').hide();
		}else{
		  $('#Reservation_vanity_id').show();
		}
	
		});
		//$('#h1txt').text($(this).text());	
		$(".bg2").animate({top:'0px'},600);
	});
	$(".next").click(function() {
	send();
	});
$(".reset").click(function() {
    $(".bg2").animate({top:'-750px'},600);
});

});
</script>
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
return true;
}
},
error: function(data) { // if error occured
alert("Error occured.please try again");
},
dataType:'html'
});

}
 
</script>
