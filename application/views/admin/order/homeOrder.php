  <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
                          <i class="fa fa-bars"></i>  Manage Order<small> (จัดการสั่งสินค้า)</small>
                        </h2>
                    </div>
                </div>
     <!-- ------------------------------  -->
 <div class="row">
<div class="panel panel-default">
  <div class="panel-body">
<div class="col-xs-12">
                    <div class="table-responsive" id="tableOrder">
                          
      				</div>
   </div>
	</div>
	</div>
</div>

	<!--   plugins 	 -->
<div class="modal fade bs-detialOrder-modal-lg" id="detialOrder" tabindex="-1" role="dialog" aria-labelledby="detialOrderh">
   <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="detialOrderh">รายละเอียดการสั่งสินค้า</h4>
      </div>
      <div class="modal-body" id="detialOrderco">

      </div>
       <div class="modal-footer">
             <input type="hidden" id="valuestatus2" value=""/>
        <button type="button" class="btn btn-success  comfirmorderbtf" data-toggle="modal" data-target="#confirmOrder" id="confirmupdateBT2" value=""><i class="glyphicon glyphicon-ok"></i> ยืนยัน</button>
        <button type="button" class="btn btn-default" id="closeAddProduct" id="closeconfirmconfirmupdate2" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade bs-detialOrder2-modal-lg" id="detialOrder2" tabindex="-1" role="dialog" aria-labelledby="detialOrderh2">
   <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="detialOrderh2">รายละเอียดการสั่งสินค้า</h4>
      </div>
      <div class="modal-body" id="detialOrderco2">

      </div>
       <div class="modal-footer">
             <input type="hidden" id="valuestatus2" value=""/>
      
        <button type="button" class="btn btn-default" id="closeAddProduct" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bs-confirmOrder-modal-sm" id="confirmOrder" tabindex="-1" role="dialog" aria-labelledby="confirmOrderh">
   <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="confirmOrderh">ยืนยันการสั่งสินค้า</h4>
      </div>
        <div class="modal-body" id="confirmOrderhResult">
        </div>
      <div class="modal-footer">
      <input type="hidden" id="valuestatus" value=""/>
        <button type="button" class="btn btn-primary" id="confirmupdateBT" value="">ยืนยัน</button>
          <button type="button" class="btn btn-default" id="closeconfirmconfirmupdate" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>
<script>


$("#tableOrder").load("<?php echo base_url();?>index.php/magement/orderList");

$("#confirmupdateBT").click(function(e) {

	$("body").addClass("ringed").addClass("whirl");
	$('.modal').modal('hide');

	setTimeout(function(){
	

	$("#confirmOrderhResult").load("<?php echo base_url();?>index.php/magement/updateStatusOrders/"+$("#confirmupdateBT").val()+"/"+$("#valuestatus").val()+"");
	$("#loadcon").load("<?php echo base_url();?>index.php/magement/order");
	},1000);
	
	 
	 
});


</script>
