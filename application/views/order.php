  <div class="modal-body" id="detialco">
  <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th align="center" valign="middle" nowrap="nowrap">รหัสสินค้า</th>
                                        <th align="center" valign="middle" nowrap="nowrap">รายละเอียดสินค้า</th>
                                        <th align="right" valign="middle" nowrap="nowrap">ราคา</th>
                                        <th align="right" valign="middle" nowrap="nowrap">จำนวน</th>
                                    </tr>
                                </thead>
                                <?php if($product){?>
                                <tbody>
                                <?php
								 foreach($product as $p){ ?>
                                    <tr>
                                        <td align="center" valign="middle" nowrap="nowrap" class="col-md-1">SR<?php echo $p['productId']?></td>
                                        <td align="left" valign="middle" nowrap="nowrap"><?php echo $p['productName']?>&nbsp;ขนาด<?php echo $p['size']?>&nbsp;สี<?php echo $p['color']?>&nbsp;</td>
                                        <td align="right" valign="middle" nowrap="nowrap" class="col-md-1"><input type="hidden" style="text-align:right" class="realprice" value="<?php echo $p['productPrice']?>" /><?php echo $p['productPrice']?></td>
                                      <td align="center" valign="middle" nowrap="nowrap" class="col-md-1"><input type="number" style="text-align:right" onKeyUp="calsum();" class="realValue" value="<?php echo $p['value']?>" /></td>
                                    </tr>
                                <?php }?>
                                   </tbody>
                                   <?php }else{?>
                               <tr>
                                        <td align="center" colspan="4" valign="middle" nowrap="nowrap" class="col-md-1">ไม่มีสินค้าในตะกร้า</td>
                                   
                                    </tr>
                            <?php }?>
							
                                 <tr>
                                        <td align="right" valign="middle" colspan="3" nowrap="nowrap"  >รวม</td>
                                      <td align="right" valign="middle" nowrap="nowrap" class="col-md-1"> <i id="sumcal"><?php echo number_format($sum,2,'.',',');?></i> บาท</td>
                                    </tr>
                             
                            </table>
 </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-primary" class="cons" onClick="alert('Coming Soon!'); return false;">ยืนยัน</button>
          <button type="button" class="btn btn-default" class="cons" data-dismiss="modal">ปิด</button>
      </div>
      <script>
	  $(".realValue").click(function(e) {
         calsum();
    });

	  function calsum(){
		  var realValue = document.getElementsByClassName("realValue");
		  var realprice = document.getElementsByClassName("realprice");
		  var sum = 0;
		  for(i=0;i<realValue.length;i++){
			  sum=sum+(realValue[i].value*realprice[i].value);
	
		  }
		  $("#sumcal").text(sum);
	  }
	
	  </script>