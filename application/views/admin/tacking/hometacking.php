  <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
                            Manage Shipping<small> (จัดการการจัดส่งสินค้า)</small>
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



<div class="modal fade bs-delete-modal-sm" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteh">
   <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="deleteh">ยืนยันการลบสินค้า</h4>
      </div>
        <div class="modal-body" id="deleteResult">
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="confirmDeleteProduct" value="">ยืนยัน</button>
          <button type="button" class="btn btn-default" id="closeconfirmDeleteProduct" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>
	<!--   plugins 	 -->

<script>
  setTimeout(function(){
					
					$("body").removeClass("ringed").removeClass("whirl");
					$("#loadcon").fadeIn("fast");
				},500);

$("#tableOrder").load("<?php echo base_url();?>index.php/magement/tackingList");


</script>