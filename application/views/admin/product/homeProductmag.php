  <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
                            Manage Product<small> (จัดการสินค้าหน้าร้าน)</small>
                        </h2>
                    </div>
                </div>
     <!-- ------------------------------  -->
 <div class="row">
<div class="panel panel-default">
  <div class="panel-body">
  
     <h2>รายการสินค้า</h2>
     <br>

 <div class="form-group col-sx-6" align="right">

    <div class="col-sm-6">
        <label class="control-label col-sx-0" for="listType">ประเภทสินค้า</label>
      <select class="form-control" id="listType" name="listType">
          <?php $i=1;foreach($type as $t){?>
        	<option <?php if($i==1){?> selected <?php }?> value="<?php echo $t['typeId']?>"><?php echo $t['typeName']?> (<?php echo $t['sum']?> รายการ)</option>
             <?php $i=$i+10;} ?>
        </select>
    </div>
      <button type="button" id="addbt" class="btn btn-success"  data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#add"><i class="glyphicon glyphicon-plus"></i> Add</button>
  </div>

<div class="col-xs-12">
                    <div class="table-responsive" id="tableproduct">
                          
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
        <h4 class="modal-title" id="detialh">รายละเอียดสินค้า</h4>
      </div>
      <div class="modal-body" id="detialco">

      </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-default" id="closeAddProduct" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade bs-add-modal-lg" id="add" tabindex="-1" role="dialog" aria-labelledby="addh">
   <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" >
       <div class="modal-header">
     
        <h4 class="modal-title" id="addh">เพิ่มสินค้า</h4>
      </div>
      <div class="modal-body" id="addco">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="closeAddProduct" data-dismiss="modal">ยกเลิก</button>
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


<script>
  setTimeout(function(){
					
					$("body").removeClass("ringed").removeClass("whirl");
					$("#loadcon").fadeIn("fast");
				},500);
$('#listType').change(function (e) {
  		e.preventDefault();
		$("#tableproduct").hide();
		$("body").addClass("ringed").addClass("whirl");
		$("#tableproduct").load("<?php echo base_url();?>index.php/magement/productByType/"+$(this).val());
});
$("#tableproduct").load("<?php echo base_url();?>index.php/magement/productByType/"+$("#listType:first").val());

$("#addbt").click(function(e) {
    $("#addco").load("<?php echo base_url();?>index.php/magement/addProduct");
});

$("#confirmDeleteProduct").click(function(e) {

	$("#tableproduct").hide();
	$("body").addClass("ringed").addClass("whirl");
	$("#deleteResult").load("<?php echo base_url();?>index.php/magement/delProduct/"+$("#confirmDeleteProduct").val());
	$("#tableproduct").load("<?php echo base_url();?>index.php/magement/productByType/"+$("#listType").val());
	$("#closeconfirmDeleteProduct").trigger("click");
  
});



</script>