<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function index()
	{
		echo "<script>window.location.href = '".base_url()."index.php/site/index/th';</script>";
	}
	

}

?>