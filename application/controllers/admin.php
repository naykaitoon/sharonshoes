<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
    function __construct(){
	   parent::__construct();
		$this->load->model('Adminm');
	   
    }
	
	function index()
	
	{	
	
	$data = $this->session->userdata('error');

	$this->session->unset_userdata('logindata');
	
		if($data=='1'){
			$error['error'] = $this->errmessage($data);
		}else if($data=='3'){
			$error['error'] = $this->errmessage($data);
			
		}else{

			$error['error'] = '';
		}
		
		$this->session->set_userdata('error','0');
		$this->load->view('admin/admin',$error);
	}
	function getbg(){
		$this->load->view('admin/bg');
	}
	function verifyLogin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = $this->Adminm->login($username,$password);
		if($data){
			$this->session->unset_userdata('error');
			$this->session->set_userdata('logindata',$data);
			
			echo "<script>window.location.href = '".base_url()."index.php/magement/'</script>";
		}else{
				$this->session->set_userdata('error','1');
		
			echo "<script>window.location.href = '".base_url()."index.php/admin/'</script>";
		
		}
		
	}
	
	function logout(){
		$this->session->unset_userdata('logindata');
		echo "<script>window.location.href = '".base_url()."index.php/admin/'</script>";
	}
	function errmessage($num){
		$str = "";
		if($num=='1'){
		$str = '<div class="alert alert-danger" role="alert" >
		<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		<span class="sr-only">Error:</span>ไม่มีผู้ใช้งานนี้</div>';
		}else if($str == '3'){
				$str = '<div class="alert alert-danger" role="alert" >
		<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		<span class="sr-only">Error:</span>ไม่มีสิทธิ์ใช้งาน กรุณาล็อกอินใหม่</div>';
		}
		return $str;
	}
	
}

?>