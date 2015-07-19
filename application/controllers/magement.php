<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Magement extends CI_Controller {
    function __construct(){
	   parent::__construct();
	   	$this->checkLogin();
		$this->load->model('Adminm');   
		$this->load->library('upload');
    }
	
	function index()
	
	{	

		$this->load->view('admin/magMain');
	}
	
	function product(){
		$data['type'] = $this->Adminm->getAlltypeCountProduct();

		$this->load->view("admin/product/homeProductmag",$data);
	}
	function productByType($typeId){
		$data['product'] = $this->Adminm->getProductAllByType($typeId);
		$this->load->view("admin/product/tableProduct",$data);
	}
	function type(){
		$data['type'] = $this->Adminm->getAlltype();
		$i = 0;
		foreach($data['type'] as $t){
			
			$addData = $this->Adminm->countProductInTypeId($t['typeId']);
			$data['type'][$i]['sum'] = $addData;
			$i++;
		}
		
		
		$this->load->view("admin/product/type",$data);
	}
	function deleteType($id){
		$sum = $this->Adminm->countProductInTypeId($id);

		if($sum == 0){
			if($this->Adminm->deleteTypePk($id)){
				echo "<p style='color:#04B431;'>ลบสำเร็จ</p>";
			}else{
				echo "<p style='color:#BC292B;'>!ล้มเหลวกรุณาลองใหม่ถายหลัง</p>";
			}
		}else{
			echo "<p style='color:#BC292B;'>!ไม่สามารถลบได้เนื่องจากมีสินค้าอยู่ในประเภทนี้กรุณาลบสินค้าออกจะประเภทนี้</p>";
		}
	}
	function getDetialProduct($porductId){
		$data['detial'] = $this->Adminm->getProductDetialAll($porductId);
		$data['type'] = $this->Adminm->getAlltype();
		$i=0;

		foreach($data['detial'] as $d){
			$data['imgall'][$i] = $this->Adminm->getImgAllcolor($d['colorId']);
			
			$i++;

		}

		$data['titledetial'] = $this->Adminm->getCurrentImg($porductId);
	
	

		$this->load->view('admin/product/productDetial',$data);
	}
	function addTypeAction(){
		$data['typeName']=$this->input->post('typename');
		$this->Adminm->addType($data);
		
	}
	
	function updateTypeAction(){
		$data['productName']=$this->input->post('productName');
		$data['productPrice']=$this->input->post('productPrice');
		$data['productDetial']=$this->input->post('productDetial');
		$data['typeId']=$this->input->post('typeId');
		$productId=$this->input->post('productId');

		
		$this->Adminm->updateProduct($productId,$data);
	}
	function updateProductAction(){
		
	}
	function getNameTypeId($id){
			$data = $this->Adminm->getTypePk($id);
			echo $data[0]['typeName'];
	}

	function addProduct(){
		$this->session->unset_userdata("productId");
		$data['type'] = $this->Adminm->getAlltype();
		$this->load->view('admin/product/addProductStep',$data);
	}
	function delProduct($id){
		$data['status'] = "hide";
		if($this->Adminm->deleteProduct($id,$data)){
			echo "<p align='center'>การลบสำเร็จ</p>";
		}else{
			echo "<p align='center'>เกิดข้อมผิดพลาดลองใหม่อีกครั้ง</p>";
		}

	}
	function updateStatusOrderssentBill($id,$status){
			try{

			$datas['orderStatus'] = $status;
			$this->Adminm->updateStatusOrder($id,$datas);
			$dataget = $this->Adminm->getUserProfiByorderId($id);
			$data['orderDetial'] = $this->Adminm->getDetialOrder($id);


		$config = array(
		'protocol' => 'smtp',
		'smtp_host' => 'mail.sharonshoes.com',
		'smtp_port' => 465,
		'smtp_user' => 'sharonsh',
		'smtp_pass' => '041712611',
		'mailtype'  => 'html', 
		'charset'   => 'utf-8'
		);
		
	

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('sharonsh@sharonshoes.com', 'owner');
        $this->email->to($dataget[0]['emailRegister']); 

        $this->email->subject("รายการสั่งสินค้าของคุณ - sharonshoes.com");
		

		$message = "บิล";
		$this->email->message($message);
        $this->email->send();




			
		}catch(Exception $e){
			
		}

	}
	function updateStatusOrders($id,$status){
			try{

			$datas['orderStatus'] = $status;
			$this->Adminm->updateStatusOrder($id,$datas);
			$dataget = $this->Adminm->getUserProfiByorderId($id);
			$data['orderDetial'] = $this->Adminm->getDetialOrder($id);


		$config = array(
		'protocol' => 'smtp',
		'smtp_host' => 'mail.sharonshoes.com',
		'smtp_port' => 465,
		'smtp_user' => 'sharonsh',
		'smtp_pass' => '041712611',
		'mailtype'  => 'html', 
		'charset'   => 'utf-8'
		);
		
	

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('sharonsh@sharonshoes.com', 'owner');
        $this->email->to($dataget[0]['emailRegister']); 

        $this->email->subject("รายการสั่งสินค้าของคุณ - sharonshoes.com");
		

		$message = $this->load->view('email/report',$data,TRUE); // this will return you html data as message
		$this->email->message($message);
        $this->email->send();




			echo "<p align='center'>สำเร็จ</p>";
		}catch(Exception $e){
			echo "<p align='center'>เกิดข้อมผิดพลาดลองใหม่อีกครั้ง</p>";
		}
		

	}
	
	function profileProductUpload(){
		
		echo "<img src='data:image/jpeg;base64,".substr($_POST['image-data'],22)."' width='400' height='400' /><script>$('#closeAddProduct').fadeIn('slow').addClass('btn-success').text('เสร็จส้น');$('#result').fadeIn('slow');

		</script>
		
		";
		$imgbase64 =  $_POST['image-data'];
		$imgbase64sub =  substr($_POST['image-data'],22);
		$addData['imgBase64'] = $imgbase64sub;
		$addData['type'] = "current";
		$productId = $this->session->userdata("productId");
		$imgId = $this->Adminm->getProductpkCheckPkImgNull($productId);
		$dataaddProfi['imgId'] = $this->Adminm->addImg($addData);
		$this->Adminm->updateDetialProduct($productId,$dataaddProfi);

	}
	
	function uploadImgArr(){
		set_time_limit(0);
	//	var_dump($_FILES);
		//var_dump($_POST);

		for($i=0;$i<count($_FILES["file"]['name']);$i++){
			//move_uploaded_file($_FILES["file"]["tmp_name"][$i], "./uploads/".$_FILES["file"]["name"][$i]);

			$data = file_get_contents($_FILES["file"]["tmp_name"][$i]);
			$img = base64_encode($data);
			
			$addData['imgBase64'] = $img;
			$addData['type'] = "composition";
			$addData['colorId'] = $_POST['colorId'][$i];
			$imgId = $this->Adminm->addImg($addData);
			$datasss['imgId'] = $imgId;
		
			
			$colorDataGet = $this->Adminm->getcolorPk($_POST['colorId'][$i]);
		//	var_dump($colorDataGet);

			if($colorDataGet){
				$this->Adminm->updatecolor($_POST['colorId'][$i],$datasss);
			}else{
				$datad['imgId'] = $imgId;
				$datad['color']=$colorDataGet[0]['color'];
				$this->Adminm->addColor($datad);
				$pdetial['colorId']=$colorDataGet[0]['colorId'];
				$pdetial['sizeId']=$colorDataGet[0]['sizeId'];
				$pdetial['productId']=$colorDataGet[0]['productId'];
				$this->Adminm->addProductDetial($pdetial);
			}
		

		}
		

	}
	
	function setSession($step){
		
		if($step=="1"){
			$this->session->set_userdata("setp1",$_POST);
		}else if($step=="2"){	

			$this->session->set_userdata("setp2",$_POST);
			
			$productId = $this->session->userdata("productId");
			$value = $this->Adminm->getProductpk($productId);
			if(!$value){
				$this->getSessionAddProduct();
			}else{
				$this->getSessionAddimg();
			}
		}else if($step=="3"){
			$this->session->set_userdata("setp3",$_POST);
		}else if($step=="4"){
			$this->session->set_userdata("setp4",$_POST);
		}
	}

	function getSessionAddProduct(){
		$setp1 = $this->session->userdata("setp1");
		$setp2 = $this->session->userdata("setp2");
		$product['productName'] = $setp1['productName'];
		$product['typeId'] = $setp1['typeId'];
		$product['productPrice'] = $setp1['productPrice'];
		$product['productDetial'] = $setp1['productDetial'];
		$productId = $this->Adminm->addProduct($product);
		$this->session->set_userdata("productId",$productId);
		$loop = 0;
		$data=array();
		$colo = array();
	
		for($out=0;$out<count($setp1['size']);$out++){
			$data[$out]['productName']=$setp1['productName'];
			$data[$out]['size']=$setp1['size'][$out];
			
			for($in=0;$in<count($setp2['colorsubsizena'.$out]);$in++){
				$data[$out]['color'][$in]['color']=$setp2['colorsubsizena'.$out][$in];
				$data[$out]['color'][$in]['imgId']=1;

			}
			
		

				$size['size'] = $data[$out]['size'];
				$sizeId = $this->Adminm->addSize($size);
				
				foreach($data[$out]['color'] as $c){
					$colorAddData['color'] = $c['color'];
					$colorAddData['imgId'] = $c['imgId'];
					$colorId = $this->Adminm->addColor($colorAddData);
					array_push($colo,$colorId);
					$dataAddR['productId'] = $productId;
					$dataAddR['sizeId'] = $sizeId;
					$dataAddR['colorId'] = $colorId;
					$dataAddR['imgId'] = 1;
					$data['productDetialId'] = $this->Adminm->addProductDetial($dataAddR);
					
				}
			
		}
		
		$this->session->set_userdata("colorId",$colo);
		
		$this->getSessionAddimg();
	

		
	}
	function getSessionAddimg(){
		$setp1 = $this->session->userdata("setp1");
		$setp2 = $this->session->userdata("setp2");
		$real['colorId'] = $this->session->userdata("colorId");
		//var_dump($real);
		$loop = 0;
		$data=array();
		for($out=0;$out<count($setp1['size']);$out++){
			$data[$out]['productName']=$setp1['productName'];
			$data[$out]['size']=$setp1['size'][$out];
			
			for($in=0;$in<count($setp2['colorsubsizena'.$out]);$in++){
				$data[$out]['color'][$in]=$setp2['colorsubsizena'.$out][$in];
			}
			
			
		}
		$real['addData'] = $data;

		$this->load->view('admin/product/listaddimgcolor',$real);
	}
	

	function checksetsess(){
		$data = $this->session->userdata("setp1");
		var_dump($data);
		$data = $this->session->userdata("setp2");
		var_dump($data);
		$data = $this->session->userdata("setp3");
		var_dump($data);
		$data = $this->session->userdata("setp4");
		var_dump($data);
	}
	function checkLogin(){
		$data = $this->session->userdata('logindata');
		if(!$data){
		$this->session->set_userdata('error','3');

		echo "<script>window.location.href = '".base_url()."index.php/admin'</script>";
		}
			
	}
	function order(){
		$this->load->view('admin/order/homeOrder');
	}
	
	function orderList(){
		
		$data['order'] = $this->Adminm->getAllOrder(array("order"));
		$data['waitpay'] = $this->Adminm->getAllOrder(array("waitpay"));
		$this->load->view('admin/order/tableOrder',$data);

	}
	
	function orderDetial($id){

		$data['orderDetial'] = $this->Adminm->getDetialOrder($id);
		$this->load->view('admin/order/orderList',$data);
	}
	
	
	function waitPay(){
		$this->load->view('admin/order/homeWaitPay');
	}
	
	function waitPayList(){
		$data['waitpay'] = $this->Adminm->getAllOrder(array("waitpay","payed","paynotpass"));
		$data['paypass'] = $this->Adminm->getAllOrderPay(array("paypass"));
		$this->load->view('admin/order/tableWaitPay',$data);

	}
	function shipping(){
		$this->load->view('admin/shipping/homeshipping');
	}
	
	function shippingList(){
		$data['paypass'] = $this->Adminm->getAllOrder(array("paypass"));
		$data['sending'] = $this->Adminm->getAllOrderPay(array("sending"));
		$this->load->view('admin/shipping/tableshipping',$data);

	}
	function tacking(){
		$this->load->view('admin/tacking/hometacking');
	}
	function tackingList(){
		$data['sending'] = $this->Adminm->getAllOrderPayAddTacking(array("sending"));
		$data['sented'] = $this->Adminm->getAllOrderPayAddTacking(array("sented"));
		

		$this->load->view('admin/tacking/tabletacking',$data);

	}
	
	function tackingLog(){
		$this->load->view('admin/tackingLog/hometackingLog');
	}
	function tackingListLog(){

		$data['data'] = $this->Adminm->getAllOrderPayAddTacking(array("sented","sending"));
		

		$this->load->view('admin/tackingLog/tabletackingLog',$data);

	}
	function member(){
		$data = $this->Adminm->getAllMember();
		var_dump($data);
		
		echo '<script>$("body").removeClass("ringed").removeClass("whirl");
					$("#loadcon").fadeIn("fast");</script>';
	}
	
	function orderDetialPayment($id){
		$data['orderDetial'] = $this->Adminm->getorderDetialPayment($id);

		$this->load->view('admin/order/payList',$data);
		

	}
	function orderDetialPaymentViewOnly($id){
		$data['orderDetial'] = $this->Adminm->getorderDetialPayment($id);

		$this->load->view('admin/order/payListView',$data);
		

	}
	
	function sentemailnotConfirm(){
		$text = $this->input->post("textSentEmail");
		$id = $this->input->post("id");
		$dataget = $this->Adminm->getUserProfiByorderId($id);

		try{

			$datas['orderStatus'] = "paynotpass";
			$this->Adminm->updateStatusOrder($id,$datas);
			$dataget = $this->Adminm->getUserProfiByorderId($id);
			$data['orderDetial'] = $this->Adminm->getDetialOrder($id);


		$config = array(
		'protocol' => 'smtp',
		'smtp_host' => 'mail.sharonshoes.com',
		'smtp_port' => 465,
		'smtp_user' => 'sharonsh',
		'smtp_pass' => '041712611',
		'mailtype'  => 'html', 
		'charset'   => 'utf-8'
		);
		
	

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('sharonsh@sharonshoes.com', 'owner');
        $this->email->to($dataget[0]['emailRegister']); 

        $this->email->subject("รายการสั่งสินค้าของคุณ - sharonshoes.com");
		

	
		$this->email->message($text);
        $this->email->send();




			echo "สำเร็จ";
		}catch(Exception $e){
			echo "เกิดข้อมผิดพลาดลองใหม่อีกครั้ง";
		}
	}
	
	function addEmsCode(){
		$orderId = $this->input->post('orderId');
		$emscode = $this->input->post('emscode');
		$dateSend = $this->input->post('dateSend');
		$timeSend = $this->input->post('timeSend');
		$datas['orderStatus'] = "sending";
		$this->Adminm->updateStatusOrder($orderId,$datas);
		$tac['orderId'] = $orderId;
		$tac['tackCode'] = $emscode;
		$tac['dateTack'] = $dateSend;
		$tac['timeTack'] = $timeSend;
		
		$this->Adminm->addTackId($tac);		
		
	}
	
	function bankAccountList(){
		$data['bank'] = $this->Adminm->getBankAll();
		$data['bankname'] = $this->Adminm->getAllBankname();
		$this->load->view("admin/bank/tablebank",$data);
	}
	
	function bankAccount(){

		$this->load->view("admin/bank/homebank");
	}
	
	function addBankAction(){
		$data['name'] = $this->input->post('nameAccf');
		$data['bankId'] = $this->input->post('bankId');
		$data['banknum'] = $this->input->post('banknumf');
		$data['sub'] = $this->input->post('subdf');
		$data['note'] = $this->input->post('noted');
		$this->Adminm->addBankAcc($data);
	}
	function updateBankAction($id){
		$data['name'] = $this->input->post('nameAccf');
		$data['bankId'] = $this->input->post('bankId');
		$data['banknum'] = $this->input->post('banknumf');
		$data['sub'] = $this->input->post('subdf');
		$data['note'] = $this->input->post('noted');
		$this->Adminm->updateBankAcc($data,$id);
	}
	function getFormEditBank($id){
		$data['bankname'] = $this->Adminm->getAllBankname();
		$data['editdata'] = $this->Adminm->getBankPk($id);
		$this->load->view("admin/bank/viewEditbank",$data);
	}
	
	function deleteBank($id){
		 $this->Adminm->deleteBank($id);
	}
}

?>