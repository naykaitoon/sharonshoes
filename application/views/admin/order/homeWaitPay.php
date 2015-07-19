  <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
                            Manage Pay<small> (จัดการการชำระเงิน)</small>
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


 <div class="modal fade bs-detial-modal-lg" id="detial" tabindex="-1" role="dialog" aria-labelledby="detialh">
   <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="detialh">รายการสั่งสินค้า</h4>
      </div>
      <div class="modal-body" id="detialListorder">

      </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-default" id="closeAddProduct" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>

 <div class="modal fade bs-detialmoney-modal-lg" id="detialmoney" tabindex="-1" role="dialog" aria-labelledby="detialmoneysh">
   <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="detialmoneysh">หลักฐานการชำระเงิน</h4>
      </div>
      <div class="modal-body" id="detialmoneyshd">

      </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-default" id="closeAddProduct" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>


 <div class="modal fade bs-comfirmpay-modal-sm" id="comfirmpay" tabindex="-1" role="dialog" aria-labelledby="comfirmpayh">
   <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="comfirmpayh">ยืนยันหลักฐานการชำระเงิน</h4>
      </div>
      <div id="resultssss"></div>
       <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="confirmpayBT" value="">ยืนยัน</button>
        <button type="button" class="btn btn-default" id="closec" data-dismiss="modal">ยกเลิก</button>
      </div>
    </div>
  </div>
</div>


<script>
  setTimeout(function(){
	 
					$("#loadcon").fadeIn("fast");
					$("#tableOrder").fadeIn("fast");
					 $("body").removeClass("ringed").removeClass("whirl");
					 $("#tableOrder").load("<?php echo base_url();?>index.php/magement/waitPayList");
					
		},500);


$("#confirmpayBT").click(function(e) {
						
							$("body").addClass("ringed").addClass("whirl");

							$(".modal").modal('hide');
					 		$("body").removeClass("ringed").removeClass("whirl");
							$("#resultssss").load("<?php echo base_url();?>index.php/magement/updateStatusOrderssentBill/"+$(this).val()+"/paypass");
						 	$("#tableOrder").load("<?php echo base_url();?>index.php/magement/waitPayList");
		
				
                  });

</script>