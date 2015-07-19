<?php 
class Adminm extends CI_Model {
	function __construct(){
	   parent::__construct();   
    }

	function login($username,$password){
		$this->db->where('username',$username);
		$this->db->where('password',MD5($password));
		return $this->db->get('tb_admin')->result_array();
	}
	
	function getAllMember(){
		return $this->db->get('tb_facebook')->result_array();
	}
	
	function getAllOrder($status){

		$this->db->join('tb_facebookdetial','tb_facebookdetial.facebookdetialId = tb_order.facebookdetialId');
		foreach($status as $s){
			$this->db->or_where('tb_order.orderStatus',$s);
		}
		$this->db->order_by("tb_order.orderId","DESC");
		return $this->db->get('tb_order')->result_array();
	}
	
	function getAllOrderPay($status){

		$this->db->join('tb_facebookdetial','tb_facebookdetial.facebookdetialId = tb_order.facebookdetialId');
		foreach($status as $s){
			$this->db->or_where('tb_order.orderStatus',$s);
		}
		$this->db->order_by("tb_order.orderStatus","ASC");
		return $this->db->get('tb_order')->result_array();
	}
	function getAllOrderPayAddTacking($status){
		$this->db->join('tb_facebookdetial','tb_facebookdetial.facebookdetialId = tb_order.facebookdetialId');
		$this->db->join('tb_tacking','tb_tacking.orderId = tb_order.orderId');
		foreach($status as $s){
			$this->db->or_where('tb_order.orderStatus',$s);
		}
		$this->db->order_by("tb_order.orderStatus","ASC");
		return $this->db->get('tb_order')->result_array();
	}
	function getDetialOrder($id){
		$this->db->join('tb_productdetial','tb_productdetial.productDetialId = tb_orderdetial.productDetialId');
		$this->db->join('tb_product','tb_product.productId = tb_productdetial.productId');
		$this->db->join('tb_size','tb_size.sizeId = tb_productdetial.sizeId');
		$this->db->join('tb_color','tb_color.colorId = tb_productdetial.colorId');		
		$this->db->join('tb_img','tb_img.imgId = tb_color.imgId');
		$this->db->or_where('tb_orderdetial.orderId',$id);
		return $this->db->get('tb_orderdetial')->result_array();
		
	}
	function getUserProfiByorderId($id){

		$this->db->join('tb_facebookdetial','tb_facebookdetial.facebookdetialId = tb_order.facebookdetialId');
		$this->db->or_where('tb_order.orderId',$id);
		return $this->db->get('tb_order')->result_array();
	}
	function getAlltypeCountProduct(){
		$this->db->select('tb_type.typeId,tb_type.typeName,COUNT(tb_product.productId) AS sum,');
		$this->db->join('tb_product','tb_product.typeId = tb_type.typeId');
		$this->db->where('tb_product.status','show');
		$this->db->group_by('tb_type.typeId');
		return $this->db->get("tb_type")->result_array();
	}
	function updateProduct($id,$data){
		$this->db->where('tb_product.productId',$id);
		$this->db->update("tb_product",$data);
	}
	function getAlltype(){
		return $this->db->get("tb_type")->result_array();
	}
	function addType($data){
		$this->db->insert("tb_type",$data);
	}
	function getTypePk($id){
		$this->db->where('tb_type.typeId',$id);
		return $this->db->get("tb_type")->result_array();
	}
	function deleteTypePk($id){
		$this->db->where('tb_type.typeId',$id);
		return $this->db->delete("tb_type");
	}
	function updateType($id,$data){
		$this->db->where('tb_type.typeId',$id);
		$this->db->update("tb_type",$data);
	}
	function countProductInTypeId($typeId){
		$this->db->select('tb_product.typeId');
		$this->db->where('tb_product.typeId',$typeId);
		$this->db->where('tb_product.status','show');
		return count($this->db->get("tb_product")->result_array());
	}
	
	
	function getProductAllByType($typeId){
		$this->db->join('tb_productdetial','tb_productdetial.productId = tb_product.productId');
		$this->db->join('tb_img','tb_img.imgId = tb_productdetial.imgId');
		$this->db->join('tb_type','tb_type.typeId = tb_product.typeId');
		$this->db->where('tb_product.typeId',$typeId);
		$this->db->where('tb_product.status','show');
		$this->db->where('tb_img.type',"current");
		
		$this->db->group_by("tb_product.productId");
		return $this->db->get("tb_product")->result_array();
	}
	
	function getProductDetialAll($productId){

		$this->db->join('tb_size','tb_size.sizeId = tb_productdetial.sizeId');
		$this->db->join('tb_color','tb_color.colorId = tb_productdetial.colorId');		

		$this->db->where('tb_productdetial.productId',$productId);
		$this->db->group_by('tb_color.colorId');
		return $this->db->get("tb_productdetial")->result_array();
	}
	function getProductOrder($data){
		$this->db->join('tb_product','tb_product.productId = tb_productdetial.productId');
		$this->db->join('tb_size','tb_size.sizeId = tb_productdetial.sizeId');
		$this->db->join('tb_color','tb_color.colorId = tb_productdetial.colorId');		
		$this->db->join('tb_img','tb_img.imgId = tb_color.imgId');
		$this->db->where('tb_product.status','show');
		$this->db->where('tb_productdetial.productId',$data['productId']);
		$this->db->where('tb_productdetial.sizeId',$data['sizeId']);
		$this->db->where('tb_productdetial.colorId',$data['colorId']);
		return $this->db->get("tb_productdetial")->result_array();
	}
	function getAllsizePro($productId){
		$this->db->join('tb_size','tb_size.sizeId = tb_productdetial.sizeId');
	
		$this->db->where('tb_productdetial.productId',$productId);
			$this->db->group_by('tb_productdetial.sizeId');
		return $this->db->get("tb_productdetial")->result_array();
	}
	
	function getAllcolorBuy($sizeId){
		$this->db->join('tb_color','tb_color.colorId = tb_productdetial.colorId');
		$this->db->where('tb_productdetial.sizeId',$sizeId);
		$this->db->group_by('tb_productdetial.colorId');
		return $this->db->get("tb_productdetial")->result_array();
	}
	
	function getImgPks($imgId){
	
		$this->db->join('tb_color','tb_color.imgId = tb_img.imgId');
		$this->db->where('tb_img.imgId',$imgId);
		return $this->db->get("tb_img")->result_array();
	}
	
	function getImgAllcolor($colorId){

		$this->db->where('tb_img.colorId',$colorId);
		return $this->db->get("tb_img")->result_array();
	}
	function getCurrentImg($productId){
		$this->db->join('tb_productdetial','tb_productdetial.productId = tb_product.productId');
		$this->db->join('tb_img','tb_img.imgId = tb_productdetial.imgId');
		$this->db->join('tb_type','tb_type.typeId = tb_product.typeId');
		$this->db->where('tb_product.productId',$productId);
		$this->db->where('tb_product.status','show');
		$this->db->group_by('tb_product.productId');
		$this->db->where('tb_img.type',"current");
		return $this->db->get("tb_product")->result_array();
	}
	function getAll(){
		$this->db->join('tb_productdetial','tb_productdetial.productId = tb_product.productId');
		$this->db->join('tb_size','tb_size.sizeId = tb_productdetial.sizeId');
		$this->db->join('tb_color','tb_color.colorId = tb_productdetial.colorId');
		$this->db->join('tb_img','tb_img.imgId = tb_productdetial.imgId');
		
		$this->db->join('tb_type','tb_type.typeId = tb_product.typeId');
		$this->db->where('tb_product.status','show');
		return $this->db->get("tb_product")->result_array();
	}
	
	function addImg($data){
		$this->db->insert("tb_img",$data);
		return $this->db->insert_id();
	}
	
	function addProduct($data){
		$this->db->insert("tb_product",$data);
		return $this->db->insert_id();
	}
	
	function addSize($data){
		$this->db->insert("tb_size",$data);
		return $this->db->insert_id();
	}
	
	function addColor($data){
		$this->db->insert("tb_color",$data);
		return $this->db->insert_id();
	}
	function addProductDetial($data){
		$this->db->insert("tb_productdetial",$data);
		return $this->db->insert_id();
	}
	
	function updatecolor($id,$data){
		$this->db->where('colorId',$id);
		$this->db->update("tb_color",$data);
	}
	function getProductDetialSize($id){
				
		$this->db->where('tb_productdetial.colorId',$id);
		$data =  $this->db->get("tb_productdetial")->result_array();
		return $data[0]['sizeId'];
	}
	function getcolorPk($id){
		$this->db->join('tb_productdetial','tb_productdetial.colorId = tb_color.colorId');
		$this->db->where('tb_color.colorId',$id);
		$this->db->where('tb_productdetial.imgId',1);
		return $this->db->get("tb_color")->result_array();
	}
	function updateDetialProduct($id,$data){
		$this->db->where('productId',$id);
		$this->db->update("tb_productdetial",$data);
		
	}
	function getProductpkCheckPkImgNull($id){
		
		$this->db->join('tb_productdetial','tb_productdetial.productId = tb_product.productId');
		$this->db->join('tb_img','tb_img.imgId = tb_productdetial.imgId');

		$this->db->where('tb_img.type','current');
		$this->db->where('tb_product.productId',$id);
		$this->db->where('tb_product.status','show');
		return $this->db->get("tb_product")->result_array();
		
	}
	function getProductpk($id){
		$this->db->where('tb_product.productId',$id);
		$this->db->where('tb_product.status','show');
		return $this->db->get("tb_product")->result_array();
		
	}
	function getorderDetialPayment($id){
		$this->db->join('tb_order','tb_order.orderId = tb_payimg.orderId');
		$this->db->join('tb_facebookdetial','tb_facebookdetial.facebookdetialId = tb_order.facebookdetialId');
		$this->db->where('tb_order.orderId',$id);
		$this->db->limit(1);
		$this->db->order_by('tb_payimg.payimgId','DESC');
		return $this->db->get("tb_payimg")->result_array();
		
	}
	function deleteProduct($id,$data){
		$this->db->where('productId',$id);
		return $this->db->update("tb_product",$data);
	}
	
	function updateStatusOrder($id,$data){
		$this->db->where('tb_order.orderId',$id);
		return $this->db->update("tb_order",$data);
	}
	
	function addTackId($data){
		$this->db->insert('tb_tacking',$data);
	}
	
	
	function getBankAll(){
		$this->db->join("tb_bankaccount","tb_bankaccount.bankId = tb_bank.bankId");
		return $this->db->get("tb_bank")->result_array();
	}
	
	function getAllBankname(){
	
		return $this->db->get("tb_bank")->result_array();
	}
	
	function addBankAcc($data){
		$this->db->insert('tb_bankaccount',$data);
	}
	
	function updateBankAcc($data,$id){
		$this->db->where("tb_bankaccount.bankAccountId",$id);
		$this->db->limit(1);
		$this->db->update('tb_bankaccount',$data);
	}
	
	function getBankPk($id){
		$this->db->join("tb_bankaccount","tb_bankaccount.bankId = tb_bank.bankId");
		$this->db->where("tb_bankaccount.bankAccountId",$id);
		$this->db->limit(1);
		return $this->db->get("tb_bank")->result_array();
	}
	function deleteBank($id){
		$this->db->where("tb_bankaccount.bankAccountId",$id);
		$this->db->limit(1);
		$this->db->delete("tb_bankaccount");
	}
}
?>
