 <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th align="center" valign="middle" nowrap="nowrap">เลขใบส่ง</th>
                                        <th align="center" valign="middle" nowrap="nowrap">ผู้สั่งซื้อ</th>
                                        <th align="center" valign="middle" nowrap="nowrap">EMS Tacking</th>
                                        <th align="center" valign="middle" nowrap="nowrap">สั่งเมื่อ</th>
                                        <th align="center" valign="middle" nowrap="nowrap">สถานะ</th>
                                        <th align="center" valign="middle" nowrap="nowrap">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php
								 if($data){
								  foreach($data as $p){   ?>
                                    <tr>
                                        <td align="center" valign="middle" nowrap="nowrap" class="col-md-1">OR<?php echo $p['orderId']?></td>
                                        <td align="left" valign="middle" nowrap="nowrap">คุณ : <?php echo $p['nameuser']?>&nbsp;&nbsp;<?php echo $p['lnameuser']?><br>e-mail : <?php echo $p['emailRegister']?></td>
                                        <td align="left" valign="middle" nowrap="nowrap">CODE : <?php echo $p['tackCode']?><br>
										<?php $date1 = new DateTime($p['dateTack']." ".$p['timeTack']);
										echo "วันที่ส่ง : ".$date1->format('d/m/').($date1->format('Y')+543). "<br>เวลาที่ส่ง : ".$date1->format('H:i'); ?></td>
                                        
                                        <td align="left" valign="middle" nowrap="nowrap" class="col-md-1"><?php 
										$date = new DateTime($p['date']." ".$p['time']);
										echo "วันที่ : ".$date->format('d/m/').($date->format('Y')+543). "<br>เวลา : ".$date->format('H:i');
										?></td>
                                        <td align="center" valign="middle" nowrap="nowrap" class="col-md-1">
										<?php 
										
										  if($p['orderStatus']=="sending"){
											 echo "<strong><font color='GREEN'>จัดส่งแล้ว</font></strong>";
										 }else  if($p['orderStatus']=="sented"){
											 echo "<strong><font color='GREEN'>ถึงมือลูกค้าแล้ว</font></strong>";
										 }
										 
										 ?>
                                        </td>
                                      <td align="center" valign="middle" nowrap="nowrap" class="col-md-1">
   <button type="button" class="btn btn-primary btn-xs detialList" data-toggle="modal" data-target="#detial" value="<?php echo $p['orderId']?>"><i class="glyphicon glyphicon-info-sign"></i> รายการสินค้า</button>
   </td>
                                    </tr>
                                    <?php  }}else{ ?>
                                <tr>
                                        <td align="center" valign="middle" colspan="6" nowrap="nowrap"><h4>ไม่พบข้อมูล</h4></td>
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
                         <script>
						 $(".detialList").click(function(e) {
	
                            $("#detialListorder").load("<?php echo base_url();?>index.php/magement/orderDetial/"+$(this).val());
                        });
						 </script>