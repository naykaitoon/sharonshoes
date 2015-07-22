<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {
    function __construct(){
	   parent::__construct();
	   require 'sdk/facebook.php';
	     $facebook = new Facebook(array(
				  'appId'  => '1458199551164642',
				  'secret' => 'c85e0bc13252f28f0f27a8b0e88e7dc2',
				));
	   if(isset($_GET)){

		   if(isset($_GET['code']) AND $_GET['code']){
			 
				
				$user = $facebook->getUser();
			
					
				if ($user) {
				  try {
					$user_profile = $facebook->api('/me');
					$datas['user_profile'] = $user_profile;
					$lo = $this->SiteModel->loginUserFb($user_profile['id']);
				
						//	var_dump($lo,$user_profile);
						
					if($lo){
							$this->session->set_userdata("loginDataUser",$lo);
							echo "<script>window.location.href ='".base_url()."index.php/verifiedEmail/login';</script>";
					}else{
							echo "<script>window.location.href ='".base_url()."index.php/site/logins?error=notRegister';</script>";
							exit;
					}
							
				  } catch (FacebookApiException $e) {
				
					$user = NULL;
				  }
				  
				}

			
				
		   }
	   }else{
	   	$facebook->destroySession();
	   }
			
    }
	
	function index($lang = "th")
	{	
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
		
		$this->loadContentFooter($datas,"WebHomesite","home/footerHeader");
		
	}
	function logins($lang="th"){

		
		$this->loadheader($lang);
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

		
	
		$this->loadContentFooter($datas,"login","home/loginHeader");

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
		}
		$this->load->view('home/homeHeader',$datas);
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
		$this->load->view('home/productDetial',$data);
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
	
	function sentMail(){
			$email =$this->input->post('email');
			
		try{
	$dataEmail = $this->SiteModel->getEmailReplete($email);
			if(!$dataEmail){
		$config = array(
		'protocol' => 'smtp',
		'smtp_host' => 'mail.sharonshoes.com',
		'smtp_port' => 465,
		'smtp_user' => 'sharonsh',
		'smtp_pass' => '041712611',
		'mailtype'  => 'html', 
		'charset'   => 'utf-8'
		);
		

		$data['mail'] = $email;
		$data['date'] = date("Y-m-d");
		$data['time'] = date("h-i-s");
		$code1 = substr(str_shuffle('abcdefghijklmnopqrsyuvxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'),0,60);
		$datess = date("Y-m-d H:i:s");
		$data['codeActice'] = $code1.MD5($datess).rand(0,1000000);
		
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('sharonsh@sharonshoes.com', 'owner');
        $this->email->to($email); 

        $this->email->subject("การลงทะเบียนยืนยัน email To sharonshoes.com");
	
		$mass = "<br><a href='".base_url()."index.php/verifiedEmail/code/".$data['codeActice']."'>คลิกที่นี้</a>  ยืนยัน";
        $this->email->message($mass);  

        $this->email->send();

		$this->db->insert('tb_maillistlog',$data);
			echo '<div class="alert alert-success" role="alert">Sent Complete กรุณาเช็ค Email เพื่อนยืนยัน</div>';
			}else if($email){
				echo '<div class="alert alert-danger" role="alert">E-mail นี้ ถูกใช้งานไปแล้ว กรุณาใช้ Email อื่น ในการลงทะเบียน</div>';
			}
		}catch (Exception $e){
			echo '<div class="alert alert-danger" role="alert">Caught exception: ',  $e->getMessage(), "</div>";
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
	
	function VerifiedAcco(){

		$emaillogin = $this->input->post("emaillogin");
		$passlogin = $this->input->post("passlogin");
		$dataLogin = $this->SiteModel->loginUser($emaillogin,$passlogin);
		if($dataLogin){
			$this->session->set_userdata("loginDataUser",$dataLogin);
			echo "<script>window.location.href ='".base_url()."index.php/verifiedEmail/login';</script>";
		}else{
			echo "<script>window.location.href ='".base_url()."index.php/site/logins?error=nouser';</script>";
		}
	}
	
	
	
	
}

?>