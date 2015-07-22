  <h3>รายการใบสั่งรอการตอบรับ</h3>
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
								if($order){
								 foreach($order as $p){ ?>
                                    <tr>
                                        <td align="center" valign="middle" nowrap="nowrap" class="col-md-1">OR<?php echo $p['orderId']?></td>
                                        <td align="left" valign="middle" nowrap="nowrap">คุณ : <?php echo $p['nameuser']?>&nbsp;&nbsp;<?php echo $p['lnameuser']?><br>e-mail : <?php echo $p['mail']?></td>
                                        <td align="left" valign="middle" nowrap="nowrap" class="col-md-1"><?php 
										$date = new DateTime($p['date']." ".$p['time']);
										echo "วันที่ : ".$date->format('d/m/').($date->format('Y')+543). "<br>เวลา : ".$date->format('H:i');
										?></td>
                                        <td align="center" valign="middle" nowrap="nowrap" class="col-md-1">
										<?php 
										
										 if($p['orderStatus']=="order"){
											 echo "<strong><font color='#DB7A00'>รอการตอบรับ...</font></strong>";
										 }else if($p['orderStatus']=="waitpay"){
											 echo "<strong><font color='GREEN'>ตอบรับแล้ว</font></strong>";
										 }
										 
										 ?>
                                        </td>
                                      <td align="center" valign="middle" nowrap="nowrap" class="col-md-1">
   <button type="button" class="btn btn-primary btn-xs detialOrdercolList" data-toggle="modal" data-target="#detialOrder" value="<?php echo $p['orderId']?>"><i class="glyphicon glyphicon-info-sign"></i> รายการสินค้า</button>&nbsp;&nbsp;<button type="button" class="btn btn-success btn-xs comfirmorderbtf" data-toggle="modal" data-target="#confirmOrder" value="<?php echo $p['orderId']?>"><i class="glyphicon glyphicon-check"></i> ยืนยัน</button>
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
                            <h3>รายการใบสั่งตอบรับแล้ว</h3>
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
								 if($waitpay){
								  foreach($waitpay as $p){   ?>
                                    <tr>
                                        <td align="center" valign="middle" nowrap="nowrap" class="col-md-1">OR<?php echo $p['orderId']?></td>
                                        <td align="left" valign="middle" nowrap="nowrap">คุณ : <?php echo $p['nameuser']?>&nbsp;&nbsp;<?php echo $p['lnameuser']?><br>e-mail : <?php echo $p['mail']?></td>
                                        <td align="left" valign="middle" nowrap="nowrap" class="col-md-1"><?php 
										$date = new DateTime($p['date']." ".$p['time']);
										echo "วันที่ : ".$date->format('d/m/').($date->format('Y')+543). "<br>เวลา : ".$date->format('H:i');
										?></td>
                                        <td align="center" valign="middle" nowrap="nowrap" class="col-md-1">
										<?php 
										
										 if($p['orderStatus']=="order"){
											 echo "<strong><font color='#DB7A00'>รอการตอบรับ...</font></strong>";
										 }else if($p['orderStatus']=="waitpay"){
											 echo "<strong><font color='GREEN'>ตอบรับแล้ว</font></strong>";
										 }
										 
										 ?>
                                        </td>
                                      <td align="center" valign="middle" nowrap="nowrap" class="col-md-1">
   <button type="button" class="btn btn-primary btn-xs detialOrdercolList2" data-toggle="modal" data-target="#detialOrder2" value="<?php echo $p['orderId']?>"><i class="glyphicon glyphicon-info-sign"></i> รายการสินค้า</button>
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
<script>
  setTimeout(function(){
					

					$("#loadcon").fadeIn("fast");
					$("body").removeClass("ringed").removeClass("whirl");
				},500);
$(".detialOrdercolList").click(function(e) {
	$("#detialOrderco").html("");
    $("#valuestatus2").attr("value","waitPay");
	$("#confirmupdateBT2").attr("value",$(this).val());
	$("#detialOrderco").load("<?php echo base_url()?>index.php/magement/orderDetial/"+$(this).val());
});
$(".detialOrdercolList2").click(function(e) {
	$("#detialOrderco2").html("");
    $("#valuestatus2").attr("value","waitPay");
	$("#confirmupdateBT2").attr("value",$(this).val());
	$("#detialOrderco2").load("<?php echo base_url()?>index.php/magement/orderDetial/"+$(this).val());
});
$(".comfirmorderbtf").click(function(e) {
	$("#confirmOrderhResult").html("");
    $("#valuestatus").attr("value","waitPay");
	$("#confirmupdateBT").attr("value",$(this).val());
});
</script>