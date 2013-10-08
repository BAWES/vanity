<?php
class FblikeController extends Controller
{
	public function actionIndex()
	{
	   require('protected/facebook/src/facebook.php');
	  // Yii::import('application.protected.facebook.src.facebook');
	   $facebook = new Facebook(array(
       'appId'  => '212644872237479',
       'secret' => 'f309504e55d66626ec7e274061a7ae00',
       'cookie' => true,
       ));

     $signedRequest = $facebook->getSignedRequest();
     $liked = $signedRequest["page"]["liked"];
	 if($liked){
         $this->redirect('https://mocha3011.mochahost.com/~rolseq/vanity/vanity/index.php?r=fb/index/');
    }else{
      $this->layout="front.php";
	  $this->render('index');
    } 
      
	}
}
?>