<?php 
class SiteModel extends CI_Model {


    function __construct(){
	   parent::__construct();
	   
    }
	
	function getLang($l){
		$this->db->select("type,size,".$l." AS text");
		return $this->db->get("tb_lang")->result_array();
	}
	
	function getFbPk($fbId){
		$this->db->where("FACEBOOK_ID",$fbId);
		return $this->db->get("tb_facebook")->result_array();
	}
	function getProductByType($typeId,$numPosts=2,$pageNumber=0){
		
		$this->db->join('tb_productdetial','tb_productdetial.productId = tb_product.productId');
		$this->db->join('tb_img','tb_img.imgId = tb_productdetial.imgId');
		$this->db->join('tb_type','tb_type.typeId = tb_product.typeId');
		$this->db->where('tb_product.typeId',$typeId);
		$this->db->where('tb_img.type',"current");
		$this->db->where('tb_product.status','show');
		$this->db->group_by("tb_product.productId");
		return $this->db->get("tb_product")->result_array();
	}
	
	function getTypeAll(){
		return $this->db->get("tb_type")->result_array();
	}
	function getAlltypeCountProduct(){
		$this->db->select('tb_type.typeId,tb_type.typeName,COUNT(tb_product.productId) AS sum,');
		$this->db->join('tb_product','tb_product.typeId = tb_type.typeId');
		$this->db->where('tb_product.status','show');
		$this->db->group_by('tb_type.typeId');
		return $this->db->get("tb_type")->result_array();
	}
	function getAllsizePro($productId){
		$this->db->join('tb_size','tb_size.sizeId = tb_productdetial.sizeId');
	
		$this->db->where('tb_productdetial.productId',$productId);
			$this->db->group_by('tb_productdetial.sizeId');
		return $this->db->get("tb_productdetial")->result_array();
	}
	function getProductDetialAll($productId){

		$this->db->join('tb_size','tb_size.sizeId = tb_productdetial.sizeId');
		$this->db->join('tb_color','tb_color.colorId = tb_productdetial.colorId');		

		$this->db->where('tb_productdetial.productId',$productId);
		$this->db->group_by('tb_color.color');
		return $this->db->get("tb_productdetial")->result_array();
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
	function getAllcolorBuy($sizeId){
		$this->db->join('tb_color','tb_color.colorId = tb_productdetial.colorId');
		$this->db->where('tb_productdetial.sizeId',$sizeId);
		$this->db->group_by('tb_productdetial.colorId');
		return $this->db->get("tb_productdetial")->result_array();
	}
	function getProductOrder($data){
		$this->db->join('tb_product','tb_product.productId = tb_productdetial.productId');
		$this->db->join('tb_size','tb_size.sizeId = tb_productdetial.sizeId');
		$this->db->join('tb_color','tb_color.colorId = tb_productdetial.colorId');		
		$this->db->join('tb_img','tb_img.imgId = tb_color.imgId');
		$this->db->where('tb_productdetial.productId',$data['productId']);
		$this->db->where('tb_productdetial.sizeId',$data['sizeId']);
		$this->db->where('tb_productdetial.colorId',$data['colorId']);
		$this->db->where('tb_product.status','show');
		return $this->db->get("tb_productdetial")->result_array();
	}
	function getimgOks($is){
		$this->db->join('tb_img','tb_img.imgId = tb_color.imgId');
		$this->db->where('tb_color.colorId',$is);
		return $this->db->get("tb_color")->result_array();
	}
	function register($data){
		$this->db->insert('tb_facebook',$data);
		return $this->db->insert_id();
	}
}
?>
