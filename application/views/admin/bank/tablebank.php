
  <h3>รายการบัญชี</h3>
  <div class="pull-right">
  		<p class="col-md-12"><button class="btn btn-success" data-toggle="modal" id="addbankbt" data-target="#addbank"><i class="glyphicon glyphicon-plus"> </i> เพิ่ม</button></p>
  </div>
  <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th align="center" valign="middle" nowrap="nowrap" class="col-md-1">ลำดับ</th>
                                        <th align="center" valign="middle" nowrap="nowrap" class="col-md-1">สัญลักษณ์</th>
                                        <th align="center" valign="middle" nowrap="nowrap">เลขบัญชี</th>
                                        <th align="center" valign="middle" nowrap="nowrap">บัญชี</th>
                                        <th align="center" valign="middle" nowrap="nowrap" class="col-md-1">ธนาคาร</th>
                                        <th align="center" valign="middle" nowrap="nowrap" class="col-md-1">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
								$i = 0;
								if($bank){
								 foreach($bank as $p){
									 $i++;
									  ?>
                                    <tr>
                                        <td align="center" valign="middle" nowrap="nowrap"  ><?php echo $i;?></td>
                                        <td align="center" valign="middle" nowrap="nowrap" ><img src="data:image/png;base64,<?php echo $p['logo'];?>" width="50" style="border-radius:5px;box-shadow:2px 2px 2px #292929;"/></td>
                                        <td align="center" valign="middle" nowrap="nowrap" ><p style="font-size:24px;" ><?php echo $p['banknum'];?></p></td>
                                        <td align="left" valign="middle" nowrap="nowrap" >ชื่อ : <?php echo $p['name'];?><br>สาขา : <?php echo $p['sub'];?></td>
                                        <td align="left" valign="middle" nowrap="nowrap"><?php echo $p['bankName'];?></td>
                                        <td align="left" valign="middle" nowrap="nowrap"> <button type="button" class="btn btn-warning btn-xs editbankcbt" data-toggle="modal" data-target="#editbank" value="<?php echo $p['bankAccountId']?>"><i class="glyphicon glyphicon-info-sign"></i> แก้ไข</button>&nbsp;&nbsp;<button type="button" class="btn btn-danger btn-xs deleteBankbt" data-toggle="modal" data-target="#deletebank" value="<?php echo $p['bankAccountId']?>"><i class="glyphicon glyphicon-remove"></i> ลบ</button></td>
                                    </tr>
                                <?php  }}else{ ?>
                                <tr>
                                        <td align="center" valign="middle" colspan="4" nowrap="nowrap"><h4>ไม่พบข้อมูล</h4></td>
                                </tr>
                                <?php }?>
                                </tbody>
                            </table>
                            <hr>
                       
 <div class="modal fade bs-addbank-modal" id="addbank" tabindex="-1" role="dialog" aria-labelledby="addbankh">
<div class="modal-dialog" role="document">
  <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addbankh">เพิ่มบัญชีธนาคาร</h4>
      </div>
      
      <div class="modal-body" >
  <div class="form-horizontal">
  <div class="form-group form-group-sm">
   <label class="col-sm-3 control-label" for="formGroupInputSmallssss">เลือกธนาคาร : </label>
    <div class="col-sm-9">
       <select class="form-control"  id="formGroupInputSmallssss" >
       <option>กรุณาเลือกบัญชีธนาคาร</option>
    <?php foreach($bankname as $b){?>
    		<option value="<?php echo $b['bankId']?>" style="background-image:url('data:image/png;base64,<?php echo $b['logo'];?>');background-size: 20px 20px;background-repeat:no-repeat;padding:5px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $b['bankName'];?></option>
       <?php }?>
    </select>
   
    </div>
  </div>
  <div class="form-group form-group-sm">
    <label class="col-sm-3 control-label" for="nameAcc">ชื่อบัญชี : </label>
    <div class="col-sm-9">
     <input type="text" class="form-control"  placeholder="ชื่อบัญชี" id="nameAcc" />
    </div>
  </div>
  <div class="form-group form-group-sm">
    <label class="col-sm-3 control-label" for="banknum">เลขบัญชีธนาคาร : </label>
    <div class="col-sm-9">
     <input type="text" maxlength="21" class="form-control"  placeholder="เลขบัญชีธนาคาร" id="banknum" />
    </div>
  </div>
  <div class="form-group form-group-sm">
    <label class="col-sm-3 control-label" for="sub">สาขา : </label>
    <div class="col-sm-9">
     <input type="text" class="form-control"  placeholder="สาขา" id="sub" />
    </div>
  </div>
   <div class="form-group form-group-sm">
    <label class="col-sm-3 control-label" for="note">Note : </label>
    <div class="col-sm-9">
     <input type="text" class="form-control"  id="note" />
    </div>
  </div>
        
</div>

       <div class="modal-footer">
   			<button type="button" class="btn btn-success" id="saveBankAcc" value="" >บันทึก</button>
        <button type="button" class="btn btn-default" id="saveBankclose" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>
</div>



 <div class="modal fade bs-editbank-modal" id="editbank" tabindex="-1" role="dialog" aria-labelledby="editbankh">
<div class="modal-dialog" role="document">
  <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editbankh">แก้ไขบัญชีธนาคาร</h4>
      </div>
      
      <div class="modal-body"  >
   			<div id="loadeditbak" class="form-horizontal">
            </div>
		</div>
   <div class="modal-footer">
   			<button type="button" class="btn btn-success" id="saveAcc" value="" >บันทึก</button>
        <button type="button" class="btn btn-default" id="savekAccclose" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade bs-deletebank-modal-sm" id="deletebank" tabindex="-1" role="dialog" aria-labelledby="deletebankh">
   <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="deletebankh">ยืนยันการลบบัญชี</h4>
      </div>
        <div class="modal-body" id="deletebankResult">
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="confirmDeletebank" value="">ยืนยัน</button>
          <button type="button" class="btn btn-default" id="confirmDeletebankclose" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>
<script>

 $("#saveBankAcc").click(function(e) { 
				e.preventDefault();
				var nameAcc = $("#nameAcc").val();
				var bankIds = $("#formGroupInputSmallssss").val();
				var banknum = $("#banknum").val();
				var subd = $("#sub").val();
				var note = $("#note").val();
		
				$.post( "<?php echo base_url();?>index.php/magement/addBankAction", { 
				 nameAccf: nameAcc,
				 bankId: bankIds,
				 banknumf : banknum,
				 subdf : subd,
				 noted : note
				  }).done(function( data ) {
					

							$("#saveBankclose").trigger("click");
							setTimeout(function(){
							$("#tableOrder").load("<?php echo base_url();?>index.php/magement/bankAccountList");
							},500);
				 });
  	 });
	$(".editbankcbt").click(function(e) {
        $("#loadeditbak").load("<?php echo base_url();?>index.php/magement/getFormEditBank/"+$(this).val());
    });
	
	$(".deleteBankbt").click(function(e) {
        $("#confirmDeletebank").val($(this).val());
    });
	 $("#confirmDeletebank").click(function(e) {
       $("#deletebankResult").load("<?php echo base_url();?>index.php/magement/deleteBank/"+$(this).val());
	   $("#confirmDeletebankclose").trigger("click");
							setTimeout(function(){
							$("#tableOrder").load("<?php echo base_url();?>index.php/magement/bankAccountList");
							},500);
    });
  </script>