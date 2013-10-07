<?php /* @var $this Controller */ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" rel="stylesheet" type="text/css">
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.9.1.min.js"></script>
<title>Zain</title>
</head>


<body>

<div class="wrapper">
<?php echo $content; ?>
	<div class="footer colorful">
		<a href="javascript:void(0)">www.sa.zaim.com</a>
		<a href="javascript:void(0)">زيـن. عالـم جميـل</a>
	</div><!--footer-->
    
<div class="clear"></div>
</div><!--wrapper-->
<script>
$(document).ready(function() {
	$(".btnMaza").click(function(event) {
		$('#package_id').val(event.target.id);
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
</body>
</html>
