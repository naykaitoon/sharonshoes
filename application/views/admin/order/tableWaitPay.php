   <h3>รายการรอการชำระเงิน/ตรวจสอบ</h3>
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
								 foreach($waitpay as $p){  ?>
                                    <tr>
                                        <td align="center" valign="middle" nowrap="nowrap" class="col-md-1">OR<?php echo $p['orderId']?></td>
                                        <td align="left" valign="middle" nowrap="nowrap">คุณ : <?php echo $p['nameuser']?>&nbsp;&nbsp;<?php echo $p['lnameuser']?><br>e-mail : <?php echo $p['mail']?></td>
                                        <td align="left" valign="middle" nowrap="nowrap" class="col-md-1"><?php 
										$date = new DateTime($p['date']." ".$p['time']);
										echo "วันที่ : ".$date->format('d/m/').($date->format('Y')+543). "<br>เวลา : ".$date->format('H:i');
										?></td>
                                        <td align="center" valign="middle" nowrap="nowrap" class="col-md-1">
										<?php 
										
										 if($p['orderStatus']=="waitpay"){
											 echo "<strong><font color='#3D3D3D'>รอการชำระเงิน...</font></strong>";
										 }else if($p['orderStatus']=="payed"){
											 echo "<strong><font color='ORANGE'>ชำระเงินแล้ว</font></strong>";
										 }else if($p['orderStatus']=="paynotpass"){
											 echo "<strong><font color='RED'>ชำระเงินผิดพลาด!</font></strong>";
										 }
										 
										 
										 ?>
                                        </td>
                                      <td align="center" valign="middle" nowrap="nowrap" class="col-md-1">
                                   <button type="button" class="btn btn-primary btn-xs detialList" data-toggle="modal" data-target="#detial" value="<?php echo $p['orderId']?>"><i class="glyphicon glyphicon-info-sign"></i> รายการสินค้า</button>
                                      <?php  if($p['orderStatus']=="payed"){?>
							     <button type="button" class="btn btn-warning btn-xs detialmoneys" data-toggle="modal" data-target="#detialmoney" value="<?php echo $p['orderId']?>"><i class="glyphicon glyphicon-ok"></i>ตรวจสอบ</button>
									<?php }	else if($p['orderStatus']=="waitpay"){ ?>
                                         <button type="button" class="btn btn-default btn-xs" disabled="disabled"><i class="glyphicon glyphicon-transfer"></i>รอการชำระ...</button
                                    ><?php }?>
  <?php if($p['orderStatus']=="paynotpass"){?>
    <button type="button" class="btn btn-default btn-xs" disabled="disabled"><i class="glyphicon glyphicon-refresh"></i>รอการยืนยันอีกครั้ง...</button>
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
                            <h3>การชำระเงินสมบูรณ์</h3>
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
                                        <td align="left" valign="middle" nowrap="nowrap">คุณ : <?php echo $p['nameuser']?>&nbsp;&nbsp;<?php echo $p['lnameuser']?><br>e-mail : <?php echo $p['mail']?></td>
                                        <td align="left" valign="middle" nowrap="nowrap" class="col-md-1"><?php 
										$date = new DateTime($p['date']." ".$p['time']);
										echo "วันที่ : ".$date->format('d/m/').($date->format('Y')+543). "<br>เวลา : ".$date->format('H:i');
										?></td>
                                        <td align="center" valign="middle" nowrap="nowrap" class="col-md-1">
										<?php 
										
										 if($p['orderStatus']=="paypass"){
											 echo "<strong><font color='GREEN'>การชำระเงินสำเร็จ</font></strong>";
										 }
										 
										 ?>
                                        </td>
                                      <td align="center" valign="middle" nowrap="nowrap" class="col-md-1">
   <button type="button" class="btn btn-primary btn-xs detialList" data-toggle="modal" data-target="#detial" value="<?php echo $p['orderId']?>"><i class="glyphicon glyphicon-info-sign"></i> รายการสินค้า</button>
  
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
						 $(".detialList").click(function(e) {
							
                            $("#detialListorder").load("<?php echo base_url();?>index.php/magement/orderDetial/"+$(this).val());
                        });
						 $(".detialmoneys").click(function(e) {
													
                            $("#detialmoneyshd").load("<?php echo base_url();?>index.php/magement/orderDetialPayment/"+$(this).val());
                        });
					
						 </script>