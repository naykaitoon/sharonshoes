<?php foreach($editdata as $e){?>
<div class="form-group form-group-sm">
   <label class="col-sm-3 control-label" for="formGroupInputSmallssss">เลือกธนาคาร : </label>
    <div class="col-sm-9">
       <select class="form-control"  id="formGroupInputSmallssss2" >
       <option>กรุณาเลือกบัญชีธนาคาร</option>
    <?php foreach($bankname as $b){?>
    		<option value="<?php echo $b['bankId']?>" <?php if($b['bankId']==$e['bankId']){echo "selected";} ?> style="background-image:url('data:image/png;base64,<?php echo $b['logo'];?>');background-size: 20px 20px;background-repeat:no-repeat;padding:5px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $b['bankName'];?></option>
       <?php }?>
    </select>
   
    </div>
  </div>
  <div class="form-group form-group-sm">
    <label class="col-sm-3 control-label" for="nameAcc2">ชื่อบัญชี : </label>
    <div class="col-sm-9">
     <input type="text" class="form-control"  placeholder="ชื่อบัญชี" id="nameAcc2" value="<?php echo $e['name']?>" />
    </div>
  </div>
  <div class="form-group form-group-sm">
    <label class="col-sm-3 control-label" for="banknum">เลขบัญชีธนาคาร : </label>
    <div class="col-sm-9">
     <input type="text" maxlength="21" class="form-control"  placeholder="เลขบัญชีธนาคาร" id="banknum2" value="<?php echo $e['banknum']?>" />
    </div>
  </div>
  <div class="form-group form-group-sm">
    <label class="col-sm-3 control-label" for="sub">สาขา : </label>
    <div class="col-sm-9">
     <input type="text" class="form-control"  placeholder="สาขา" id="sub2" value="<?php echo $e['sub']?>" />
    </div>
  </div>
   <div class="form-group form-group-sm">
    <label class="col-sm-3 control-label" for="note2">Note : </label>
    <div class="col-sm-9">
     <input type="text" class="form-control"  id="note" value="<?php echo $e['note']?>" />
    </div>
  </div>
  
  <script>
   $("#saveAcc").click(function(e) { 
				e.preventDefault();
				var nameAcc2 = $("#nameAcc2").val();
				var bankIds2 = $("#formGroupInputSmallssss2").val();
				var banknum2 = $("#banknum2").val();
				var subd2 = $("#sub2").val();
				var note2 = $("#note2").val();
		
				$.post( "<?php echo base_url();?>index.php/magement/updateBankAction/<?php echo $e['bankAccountId'];?>", { 
				 nameAccf: nameAcc2,
				 bankId: bankIds2,
				 banknumf : banknum2,
				 subdf : subd2,
				 noted : note2
				  }).done(function( data ) {
					

							$("#savekAccclose").trigger("click");
							setTimeout(function(){
							$("#tableOrder").load("<?php echo base_url();?>index.php/magement/bankAccountList");
							},500);
				 });
  	 });
  </script>
  <?php }?>