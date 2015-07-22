<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifiedEmail extends CI_Controller {
    function __construct(){
	   parent::__construct();
	  require 'sdk/facebook.php';
    }
	
	function code($code="",$lang="th")
	{			
		$this->loadheader($lang);
		if($code){
			$codeData = $this->SiteModel->getCodeEmail($code);
			if($codeData){
				if($codeData[0]['statusEmail']=="Active"){
					$datas['sta'] = "E-amil ถูกใช้งานไปแล้ว กรุณาใช้ Email อื่นในการลงทะเบียน";
					$datas['message'] = "none";
				}else if($codeData[0]['statusEmail']=="none"){
					$datas['code'] = $codeData;
					$datas['sta'] = "";
					$datas['message'] = "true";
				}
			}else{
				$datas['sta'] = "Url ถูกดับแปลง หรือ Email ยังไม่ได้ถูกลงทะเบียน";
				$datas['message'] = "false";
			}
		}else{
			$datas['message'] = "false";
			$datas['sta'] = "กรุณาคลิก URL ที่ทางเราส่งให้ใน Email";

		}
		
		$this->loadContentFooter($datas,"register","home/footerCode");
	}
	function codeDel($code=""){
		$l = $this->session->userdata("lag");
		$this->loadheader($l);
		$data = $this->SiteModel->delCodeEmail($code);
		$datas['message'] = "false";
		$datas['sta'] = "ทำการลบ E-mail ออกจากระบบแล้ว สามารถลงทะเบียนได้ใหม่ในภายหลัง";
		$this->loadContentFooter($datas,"register","home/footerCode");
		
	}
	
	function getDataConfirm(){
		$password = $this->input->post('password');
		$cpassword = $this->input->post('cpassword');
		$name = $this->input->post('name');
		$lname = $this->input->post('lname');
		$address = $this->input->post('address');
		$tel = $this->input->post('tel');
		
		if($password==$cpassword){
			if($password!=""&&$cpassword!=""&&$name!=""&&$lname!=""&&$address!=""&&$tel!=""){
			$this->session->set_userdata("regisdata",$_POST);
			
			echo "<script>$('#loadinfo').load('".base_url()."index.php/verifiedEmail/loadcondition');</script>";
			}else{
				echo '<div class="alert alert-danger" role="alert">กรุณาระบุข้อมูลให้ครบถ้วน</div>';
			}
		}else{
			echo '<div class="alert alert-danger" role="alert">password ไม่ตรงกัน</div>';
		}
	
	}
	
	function loadcondition(){
		$data['dataCon'] = $this->SiteModel->getContent("conditionRegister");
		$this->load->view('condition',$data);
	}

	function checkAndAddnewUser(){
		if($_POST){
			if($_POST['value']=="true"){
				$da = $this->session->userdata("regisdata");
			
				$sta = $this->SiteModel->updateCodeStatus($da['codeActice']);
				if($sta){
			
					$dataadd['nameuser'] = $da['name'];
					$dataadd['lnameuser'] = $da['lname'];
					$dataadd['adress'] = $da['address'];
					$dataadd['mailId'] = $sta;
					$dataadd['passwordLogin'] = $da['password'];
					$dataadd['tel'] = $da['tel'];
					$c = $this->SiteModel->addNewUser($dataadd);
					if($c){
						 $this->session->unset_userdata("regisdata");
						
					}
				}
			}else{
				echo 0;
			}
		}else{
			echo "ERROR : VALIDATETION 2";
		}
	}
	function login(){
		$logindata = $this->session->userdata("loginDataUser");
	
		if($logindata[0]['ID']==0){
			$this->session->set_userdata("loginDatafabookValue",'nofacebook');
			$this->session->set_userdata("facebookAll",false);
		}else{
			$datafb = $this->SiteModel->getFbPkId($logindata[0]['ID']);
			$this->session->set_userdata("facebookAll",$datafb);
			$this->session->set_userdata("loginDatafabookValue",'yesfacebook');
		}
		
		echo "<script>window.location.href='".base_url()."index.php/user';</script>";
	}
	function loadheader($lang){
		
		if($lang=="th"){
			$l = "th";
			$datas['select'] = "th";
		}else if($lang=="en"){
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
	

}

?>