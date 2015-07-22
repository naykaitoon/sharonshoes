<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
    function __construct(){
	   parent::__construct();
	   require 'sdk/facebook.php';
		$this->checkLogin();
    }
	
	function index($lang="th")
	{	
		/*$a= $this->session->userdata("loginDataUser");
		$b= $this->session->userdata("loginDatafabookValue");
		$c = $this->session->userdata("facebookAll");
		var_dump($a,$b,$c);*/
				 $this->loadheader($lang);
		
				$datas['types'] = $this->SiteModel->getAlltypeCountProduct();

		$d = $this->SiteModel->getTypeAll();
		$newProduct = array();
		$datas['sumAll'] = 0;
		$i = 0;
		foreach($d as $t){
			$newp = $this->SiteModel->getProductByType($t['typeId']);
			$sum = 0;
				foreach($newp as $np){
						
						array_push($newProduct,$np);
						$sum++;
						$datas['sumAll'] = $datas['sumAll']+1;
				}
			
	
	
			$i++;
			
		}
		$datas['products'] = $newProduct;
		shuffle($datas['products']);
		
		$this->loadContentFooter($datas,"user/WebHomesite","user/footerHeader");
		
	}
	function loadheader($lang){
		
				if($lang=="th"){
			$l = "th";
			$datas['select'] = "th";
		}else if($lang=="en"){
			$l = "en";
			$datas['select'] = "en";
		}else{
			$l = "en";
			$datas['select'] = "en";
		}
		$this->session->set_userdata("lag",$l);
		$data = $this->SiteModel->getLang($l);
	
		foreach($data as $d){
			$datas[$d['type']] = $d['text'];
			if($d['size']>0){
				$datas[$d['type']."size"] = 'style="font-size:'.$d['size'].'px;"';
			}else{
				$datas[$d['type']."size"] = '';
			}
		}
		///////////////////////////   fb /////////////////////////////////////
		
		$facebook = new Facebook(array(
		  'appId'  => '1458199551164642',
		  'secret' => 'c85e0bc13252f28f0f27a8b0e88e7dc2',
		));
		
		$user = $facebook->getUser();

		if ($user) {
		  try {
			$user_profile = $facebook->api('/me');
			$datas['user_profile'] = $user_profile;
			
		  } catch (FacebookApiException $e) {
		
			$user = NULL;
		  }
		}		
		if ($user) {
		  $logoutUrl = $facebook->getLoginUrl();
		  $datas['fbbtUrl'] = $logoutUrl;
		  $datas['faLoginStatus'] = "yes";
		  $datas['user'] = $user;
		  
		} else {
		  $loginUrl = $facebook->getLoginUrl();
		   $datas['fbbtUrl'] = $loginUrl;
		    $datas['faLoginStatus'] = "no";
			 $datas['user'] = NULL;
		}
		$this->load->view('user/homeHeader',$datas);
	}
	function loadContentFooter($datas,$view,$footerVew){
		
		$this->load->view($view,$datas);
		$this->load->view($footerVew,$datas);
	}
	function fbLogout(){
	
		$facebook = new Facebook(array(
		  'appId'  => '1458199551164642',
		  'secret' => 'c85e0bc13252f28f0f27a8b0e88e7dc2',
		));
	$facebook->destroySession();
		echo "<script>window.location.href ='".base_url()."';</script>";
	}
	
	function getDetialProduct($porductId){
			$facebook = new Facebook(array(
		  'appId'  => '1458199551164642',
		  'secret' => 'c85e0bc13252f28f0f27a8b0e88e7dc2',
		));
		
		$user = $facebook->getUser();
		$loginUrl = $facebook->getLoginUrl();
		$data['fbbtUrl'] = $loginUrl;
			$data['size'] = $this->SiteModel->getAllsizePro($porductId);
				$data['detial'] = $this->SiteModel->getProductDetialAll($porductId);
		$i=0;

		foreach($data['detial'] as $d){
			$data['imgall'][$i] = $this->SiteModel->getImgAllcolor($d['colorId']);
			
			$i++;

		}

		$data['titledetial'] = $this->SiteModel->getCurrentImg($porductId);
		$this->load->view('productDetial',$data);
	}
	
	function getColorProduct(){
		$sizeId = $this->input->post('sizeId');
		if($sizeId!=0){
		 $data = $this->SiteModel->getAllcolorBuy($sizeId);
		 	echo '<option>กรุณาเลือกสี</option>';
		 foreach($data as $d){
			echo '<option value="'.$d['colorId'].'">'.$d['color'].'</option>';
		 }
		 
		}else{
			echo '<option>กรุณาเลือกSizeก่อน</option>';
		}
	}
	

	function getimageColor($id){
		$data = $this->SiteModel->getimgOks($id);

		if($data){
			echo '<img class="img-thumbnail" style="display:none;" id="imgResult" src="data:image/jpeg;base64,'.$data[0]['imgBase64'].'" width="300px" height="300px" />';

		}else{
			echo "ไม่พบรูปภาพอยู่ในระบบ หรืออาจเสียหาย";
		}
	
	}
	
		
	function countBuyitem(){
		$data = $this->session->userdata("buy");
		if($data!=FALSE){
			echo "<small><strong>".count($data)."</strong></small>";
		}else{
			echo "";
		}
		
	}
	//////////////////////////////////////////////////////
	function checkLogin(){
		$a= $this->session->userdata("loginDataUser");
		$b= $this->session->userdata("loginDatafabookValue");
		if(!$a&&!$b){
			echo "<script>window.location.href ='".base_url()."index.php/site/logins?error=notlogin';</script>";
		}
		$facebook = new Facebook(array(
		  'appId'  => '1458199551164642',
		  'secret' => 'c85e0bc13252f28f0f27a8b0e88e7dc2',
		));
		
		$user = $facebook->getUser();

		if (!$user&&!$a&&!$b) {
			echo "<script>window.location.href ='".base_url()."index.php/site/logins?error=notlogin';</script>";
			}
	}
	
	
	
	function indexoil($lang = "th",$script=""){
		if($lang=="th"){
			$l = "th";
			$datas['select'] = "th";
		}else if($lang=="en"){
			$l = "en";
			$datas['select'] = "en";
		}else{
			$l = "en";
			$datas['select'] = "en";
		}
		$this->session->set_userdata("lag",$l);
		$data = $this->SiteModel->getLang($l);
	
		foreach($data as $d){
			$datas[$d['type']] = $d['text'];
			if($d['size']>0){
				$datas[$d['type']."size"] = 'style="font-size:'.$d['size'].'px;"';
			}else{
				$datas[$d['type']."size"] = '';
			}
		}
		$datas['types'] = $this->SiteModel->getAlltypeCountProduct();

		$d = $this->SiteModel->getTypeAll();
		$newProduct = array();
		$datas['sumAll'] = 0;
		$i = 0;
		foreach($d as $t){
			$newp = $this->SiteModel->getProductByType($t['typeId']);
			$sum = 0;
				foreach($newp as $np){
						
						array_push($newProduct,$np);
						$sum++;
						$datas['sumAll'] = $datas['sumAll']+1;
				}
			
	
	
			$i++;
			
		}
		$datas['products'] = $newProduct;
		shuffle($datas['products']);
		$datas['script'] = $script;
		
		///////////////////////////   fb /////////////////////////////////////
		
		$facebook = new Facebook(array(
		  'appId'  => '1458199551164642',
		  'secret' => 'c85e0bc13252f28f0f27a8b0e88e7dc2',
		));
		
		$user = $facebook->getUser();

		if ($user) {
		  try {
			$user_profile = $facebook->api('/me');
			$datas['user_profile'] = $user_profile;
			
		  } catch (FacebookApiException $e) {
		
			$user = NULL;
		  }
		}		
		if ($user) {
		  $logoutUrl = $facebook->getLogoutUrl();
		  $datas['fbbtUrl'] = $logoutUrl;
		  $datas['faLoginStatus'] = "yes";
		  $datas['user'] = $user;
		  
		} else {
		  $loginUrl = $facebook->getLoginUrl();
		   $datas['fbbtUrl'] = $loginUrl;
		    $datas['faLoginStatus'] = "no";
		}
		
	
			///////////////////////////  end fb /////////////////////////////////////

		$this->load->view('WebHomesite',$datas);
	}

	function page($page=""){
		
		$lag =$this->session->userdata("lag");

		$script = '$("#loadinfo").load("'.base_url().'index.php/site/'.$page.'");
	
		$("#portfolio").ScrollTo({
   			 duration: 2000,
   			 easing: "linear"
		});
		';
		$this->index($lag,$script);
	}
	
	function register(){
		$this->load->view('register');
	}
	function login($lang="th"){

		
		
		if($lang=="th"){
			$l = "th";
			$datas['select'] = "th";
		}else if($lang=="en"){
			$l = "en";
			$datas['select'] = "en";
		}else{
			$l = "en";
			$datas['select'] = "en";
		}
		$this->session->set_userdata("lag",$l);
		$data = $this->SiteModel->getLang($l);
	
		foreach($data as $d){
			$datas[$d['type']] = $d['text'];
			if($d['size']>0){
				$datas[$d['type']."size"] = 'style="font-size:'.$d['size'].'px;"';
			}else{
				$datas[$d['type']."size"] = '';
			}
		}
		$datas['types'] = $this->SiteModel->getAlltypeCountProduct();

		$d = $this->SiteModel->getTypeAll();
		$newProduct = array();
		$datas['sumAll'] = 0;
		$i = 0;
		foreach($d as $t){
			$newp = $this->SiteModel->getProductByType($t['typeId']);
			$sum = 0;
				foreach($newp as $np){
						
						array_push($newProduct,$np);
						$sum++;
						$datas['sumAll'] = $datas['sumAll']+1;
				}
			
	
	
			$i++;
			
		}
		$datas['products'] = $newProduct;
		shuffle($datas['products']);

		
		///////////////////////////   fb /////////////////////////////////////
		
		$facebook = new Facebook(array(
		  'appId'  => '1458199551164642',
		  'secret' => 'c85e0bc13252f28f0f27a8b0e88e7dc2',
		));
		
		$user = $facebook->getUser();

		if ($user) {
		  try {
			$user_profile = $facebook->api('/me');
			$datas['user_profile'] = $user_profile;
			
			
		  } catch (FacebookApiException $e) {
		
			$user = NULL;
		  }
		}		
		if ($user) {
		  $logoutUrl = $facebook->getLogoutUrl();
		  $datas['fbbtUrl'] = $logoutUrl;
		  $datas['faLoginStatus'] = "yes";
		  $datas['user'] = $user;
		  	if(!$_GET['code']){
					$data['FACEBOOK_ID'] = $user_profile["id"];
					$data['NAME'] =  $user_profile["name"];
					$data['LINK'] =	$user_profile["link"];
					$data['CREATE_DATE'] = 	date("Y-m-d H:i:s");
					$this->SiteModel->register($data);
					
					
				 	$this->load->view('addNewUser',$datas);
				}else{
					echo "<script>window.location.href='".base_url()."'</script>";
				}
		  
		} else {
		  $loginUrl = $facebook->getLoginUrl();
		   $datas['fbbtUrl'] = $loginUrl;
		    $datas['faLoginStatus'] = "no";
		}
		
			$this->load->view('login',$datas);



		

	}
	function profile(){
			$this->load->view('profile');		
	}
	
	function addNewUser(){
			$this->load->view('addNewUser');		
	}

	
	

	function buyItem(){
		$sizeId = $this->input->post('sizeId');
		$colorId = $this->input->post('colorId');
		$valueNum = $this->input->post('valueNum');
		$productId = $this->input->post('productId');

		$addData = array();
		$data = $this->session->userdata("buy");
		if($productId){
			if(!$data){
				$p['productId']=$productId;
				$p['sizeId']=$sizeId;
				$p['colorId']=$colorId;
				$p['valueNum']=$valueNum;
				 array_push($addData,$p);
	
				$this->session->set_userdata("buy",$addData);
			}else{
				
				$p['productId']=$productId;
				$p['sizeId']=$sizeId;
				$p['colorId']=$colorId;
				$p['valueNum']=$valueNum;
				 array_push($data,$p);
	
				$this->session->set_userdata("buy",$data);
				
			}
			$d = $this->session->userdata("buy");

		}
		
	}

	
	function getAllBuy(){
		$data = $this->session->userdata("buy");
		$sent = array();
		$sum = 0;
		if($data){
		foreach($data as $d){
			$getData = $this->SiteModel->getProductOrder($d);
			
			$getData[0]['value'] = $d['valueNum'];
			array_push($sent,$getData[0]);
			$sum=$sum+($d['valueNum']*$getData[0]['productPrice']);
			
		}
		}else{
			$sent = FALSE;
		}
		$alldata['sum'] = $sum;
		$alldata['product'] = $sent;
		$this->load->view('order',$alldata);
	}
	
	function un(){
		$this->session->unset_userdata("buy");
	}
	
	
	
	
	
	
}

?>