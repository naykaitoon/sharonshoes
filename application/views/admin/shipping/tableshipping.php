  <style>
  #emsId{
  	text-transform:uppercase;
  }
  </style>

  <h3>รายการรอการจัดส่ง</h3>
  <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th align="center" valign="middle" nowrap="nowrap">เลขใบส่ง</th>
                                        <th align="center" valign="middle" nowrap="nowrap">ผู้สั่งซื้อ</th>
                                        <th align="center" valign="middle" nowrap="nowrap">สั่งเมื่อ</th>
                                        <th align="center" valign="middle" nowrap="nowrap">สถานะ</th>
                                        <th align="center" valign="middle" nowrap="nowrap">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
								if($paypass){
								 foreach($paypass as $p){ ?>
                                    <tr>
                                        <td align="center" valign="middle" nowrap="nowrap" class="col-md-1">OR<?php echo $p['orderId']?></td>
                                        <td align="left" valign="middle" nowrap="nowrap">คุณ : <?php echo $p['nameuser']?>&nbsp;&nbsp;<?php echo $p['lnameuser']?><br>E-mail : <?php echo $p['mail']?></td>
                                        <td align="left" valign="middle" nowrap="nowrap" class="col-md-1"><?php 
										$date = new DateTime($p['date']." ".$p['time']);
										echo "วันที่ : ".$date->format('d/m/').($date->format('Y')+543). "<br>เวลา : ".$date->format('H:i');
										?></td>
                                        <td align="center" valign="middle" nowrap="nowrap" class="col-md-1">
										<?php 
										
										 if($p['orderStatus']=="paypass"){
											 echo "<strong><font color='#DB7A00'>รอการจัดส่ง...</font></strong>";
										 }
										 ?>
                                        </td>
                                      <td align="center" valign="middle" nowrap="nowrap" class="col-md-1">
   <button type="button" class="btn btn-primary btn-xs detialList" data-toggle="modal" data-target="#detial" value="<?php echo $p['orderId']?>"><i class="glyphicon glyphicon-info-sign"></i> รายการสินค้า</button><?php if($p['orderStatus']=="paypass"){?>&nbsp;&nbsp;<button type="button" class="btn btn-success btn-xs ems" data-toggle="modal" data-target="#emsmo" value="<?php echo $p['orderId']?>"><i class="glyphicon glyphicon-check"></i> ใส่มายเลข EMS</button>
   <?php }?>
   </td>
                                    </tr>
                                <?php  }}else{ ?>
                                <tr>
                                        <td align="center" valign="middle" colspan="5" nowrap="nowrap"><h4>ไม่พบข้อมูล</h4></td>
                                </tr>
                                <?php }?>
                                </tbody>
                            </table>
                            <hr>
                       
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

 <div class="modal fade bs-detialmoney-modal-lg" id="detialmoneyd" tabindex="-1" role="dialog" aria-labelledby="detialmoneyshd">
   <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="detialmoneyshd">หลักฐานการชำระเงิน</h4>
      </div>
      <div class="modal-body" id="detialmoneyshdd">

      </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-default" id="closeAddProduct" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>

 <div class="modal fade bs-ems-modal" id="emsmo" tabindex="-1" role="dialog" aria-labelledby="emsmoh">
   <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="emsmoh">หมายเลข EMS</h4>
      </div>
      <div class="modal-body" id="emsmohd" align="center">
      		<p id="laghtNumber"></p>
				<input id="emsId" class="form-control" style="text-align:center" value="" placeholder="หมายเลข EMS 13 หลัก" maxlength="13" type="text" /><br>
                <div class="row">
                	<div class="col-sm-6">
             <input type="text" class="form-control" style="text-align:center" id="datepicker" size="30" placeholder="วันที่ส่ง" readonly>
             			</div>
                        <div class="col-sm-6">
               <input type="datetime" class="form-control" style="text-align:center" id="setTimeExample" size="30" placeholder="เวลาโดยประมาน 24 ชม" >
               </div>
               </div>
      </div>
       <div class="modal-footer">
       <button type="button" class="btn btn-success" id="saveIdEms" value="" >บันทึก</button>
        <button type="button" class="btn btn-default" id="closeAddCode" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>

                         <script>
						 $( "#datepicker" ).datepicker({ 
						 	dateFormat: 'yy-dd-mm'
						  });
						  
						  $('#setTimeExample').timepicker({'timeFormat': 'H:i:s'});
						
						
						 $(".detialList").click(function(e) {
	
                            $("#detialListorder").load("<?php echo base_url();?>index.php/magement/orderDetial/"+$(this).val());
                        });
						$(".ems").click(function(e) {
                            $("#saveIdEms").val($(this).val());
                        });
						$("#laghtNumber").html("0 / 13");
						$("#emsId").keyup(function(e) {
                            $("#laghtNumber").html(($("#emsId").val().length)+" / 13");
							changeColor($("#emsId").val().length);
                        });
						$("#emsId").keydown(function(e) {
                            $("#laghtNumber").html(($("#emsId").val().length)+" / 13");
							changeColor($("#emsId").val().length);
							
                        });
							$("#saveIdEms").click(function(e) {
								
								if($("#emsId").val().length!=13){
                          $("#emsmohd").append('<div id="alertLeagt" style="display:none" class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> &nbsp;กรุณาใส่รหัส ที่มี 13 หลัก</div>');					
						  $("#alertLeagt").fadeIn("fast",function(){
						setTimeout(function(){

							$("#alertLeagt").fadeOut("fast",function(){
									$("#alertLeagt").remove();
							});
						
						},2500);
						  });
								}else{
								
									  $.post( "<?php echo base_url();?>index.php/magement/addEmsCode", { orderId: $(this).val(), emscode: $("#emsId").val(),dateSend:$("#datepicker").val(),timeSend:$("#setTimeExample").val() })
									  .done(function( data ) {
													$("#closeAddCode").trigger("click");
											setTimeout(function(){
													$("#loadcon").load("<?php echo base_url();?>index.php/magement/shipping");
											},500);
									  });
								}	
                            });
							
							function changeColor(la){
								if(la==13){
									$("#laghtNumber").css("color","GREEN");
			
								}else{
									$("#laghtNumber").css("color","RED");
			
								}
							}
						 </script>