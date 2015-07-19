  <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
                            Manage TypeProduct<small> (จัดการประเภทสินค้า)</small>
                        </h2>
                    </div>
                </div>
     <!-- ------------------------------  -->
 <div class="row" id="typelist">
<div class="panel panel-default"  align="right"><br>
 <button type="button" id="addtbt" class="btn btn-success"  data-toggle="modal" data-target="#addt"><i class="glyphicon glyphicon-plus"></i> Add</button>&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="panel-body">


     
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th align="center" valign="middle" nowrap="nowrap" class="col-md-1">รหัสประเภท</th>
                                        <th align="center" valign="middle" nowrap="nowrap">ชื่อประเภท</th>
                                        <th align="center" valign="middle" nowrap="nowrap" class="col-md-1">จำนวนรายการ</th>
                                        <th align="center" valign="middle" nowrap="nowrap" class="col-md-1">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($type as $t){?>
                                   <tr>
                                        <td align="center" valign="middle" nowrap="nowrap" >T<?php echo $t['typeId']?></td>
                                        <td align="left" valign="middle" nowrap="nowrap"><?php echo $t['typeName']?></td>
                                        <td align="right" valign="middle" nowrap="nowrap" ><?php echo $t['sum']?></td>
                                      <td align="center" valign="middle" nowrap="nowrap" ><button value="<?php echo $t['typeId']?>" type="button" data-toggle="modal" data-target="#editt" class="btn btn-sm btn-primary edittbt">แก้ไข</button>                                        <button value="<?php echo $t['typeId']?>" type="button" data-toggle="modal" data-target="#delete" class="btn btn-sm btn-danger delete">ลบ</button></td>
                                    </tr>
         								<?php }?>
                                </tbody>
                            </table>
      </div>
      
    </div>


  </div>

</div>
<div class="modal fade bs-delete-modal-lg" id="addt" tabindex="-1" role="dialog" aria-labelledby="addth">
   <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addth">เพิ่มประเภทสินค้า</h4>
     
      </div>
      <div class="col-md-12"> 
<br>
  <div class="form-group">
    <label for="typeName">ชื่อประเภท</label>
    <input type="text" class="form-control" id="typeName" placeholder="ชื่อประเภท">
  </div>
</div>
      <div class="modal-footer">
        <button type="button" id="addType" class="btn btn-primary">บันทึก</button>
          <button type="button" id="closeAddType" class="btn btn-default" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade bs-delete-modal-lg" id="editt" tabindex="-1" role="dialog" aria-labelledby="editth">
   <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addth">แก้ไขประเภทสินค้า</h4>
     
      </div>
      <div class="col-md-12"> 
<br>
  <div class="form-group" id="formEditType">
    <label for="typeName">ชื่อประเภท</label>
	<input type="text" class="form-control" id="typeNameEdit" placeholder="ชื่อประเภท">
    <input type="hidden" class="form-control" id="typeId" >
  </div>
</div>
      <div class="modal-footer">
        <button type="button" id="editType" class="btn btn-primary">บันทึก</button>
          <button type="button" id="closeeditType" class="btn btn-default" data-dismiss="modal">ปิด</button>
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
        <div class="modal-body" id="deleteResultss">
        		
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="confirmDeleteType" value="">ยืนยัน</button>
          <button type="button" class="btn btn-default" id="closeconfirmDeleteType" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>
<script>

  setTimeout(function(){
					
					$("body").removeClass("ringed").removeClass("whirl");
					$("#loadcon").fadeIn("fast");
				},500);

$("#addType").click(function(e) {
	$("body").addClass("ringed").addClass("whirl");
      $.post("/index.php/magement/addTypeAction", {typename : $("#typeName").val()}) //Serialize looks good name=textInNameInput&&telefon=textInPhoneInput---etc
        .done(function(data) {
			 	
					$("#closeAddType").trigger("click");
					$(".modal-backdrop").hide();
					$("body").removeClass("modal-open").addClass("modal-close");
         			$("#loadcon").load("<?php echo base_url();?>index.php/magement/type");
					
      
        
        });

});
$(".edittbt").click(function(e) {
	$("#typeId").val($(this).val());
	 $.get("<?php echo base_url();?>index.php/magement/getNameTypeId/"+$(this).val(), function(data, status){

       	$("#typeNameEdit").val(data);
    });
});
$(".delete").click(function(e) {
	$("#confirmDeleteType").show();
	$("#deleteResultss").html('<h4 align="center" style="color:#BC292B">คุณต้องการลบประเภทนี้หรือไม่!</h4>');
	$("#confirmDeleteType").val($(this).val());

});
$("#confirmDeleteType").click(function(e) {
	$("#confirmDeleteType").hide();
	 $.get("<?php echo base_url();?>index.php/magement/deleteType/"+$(this).val(), function(data, status){

       	$("#deleteResultss").html(data);
		setTimeout(function(){
					$("#closeconfirmDeleteType").trigger("click");
					$(".modal-backdrop").hide();
					$("body").removeClass("modal-open").addClass("modal-close");
         			$("#loadcon").load("<?php echo base_url();?>index.php/magement/type");
		},1000);
    });
});
$("#editType").click(function(e) {
	$("body").addClass("ringed").addClass("whirl");
      $.post("/index.php/magement/updateTypeAction", {typename : $("#typeNameEdit").val(),typeid:$("#typeId").val()}) //Serialize looks good name=textInNameInput&&telefon=textInPhoneInput---etc
        .done(function(data) {

					$("#closeAddType").trigger("click");
					$(".modal-backdrop").hide();
					$("body").removeClass("modal-open").addClass("modal-close");
         			$("#loadcon").load("<?php echo base_url();?>index.php/magement/type");
					
      
        
        });

});

</script>