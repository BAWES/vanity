<div class="bg3" >
        <div class="logo">
            <a href="javascript:void(0)"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" width="78" alt="Zain (Logo)"></a>
        </div><!--logo-->
        
        <div class="thankyoubox">
            <!--<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/dil.png" width="420" alt="">-->
            <h3>شكراً لك</h3>
            <p><?php echo $text ?></p>
            <!--
            <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fzainghaliahapps.com%2Fvanity%2Findex.php">مشاركة</a>
			-->
        </div><!--thankyoubox-->

        
    </div><!--bg3-->
	<script>
	<!--http%3A%2F%2Fzainghaliahapps.com%2Fvanity%2Findex.php%2Fsite%2Ffbshared-->
$(document).ready(function() {
$(".bg3").animate({top:'0px'},600);
window.location.replace("https://www.facebook.com/sharer.php?u=http%3A%2F%2Fzainghaliahapps.com%2Fvanity%2Findex.php%2Fsite%2Ffbshared");
//window.location.href = "http%3A%2F%2Flocalhost%2FGitHub%2Fvanity%2Findex.php%2Fsite%2Ffbshared%2F";

});
</script>