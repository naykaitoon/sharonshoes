  <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th align="center" valign="middle" nowrap="nowrap">รหัสสินค้า</th>
                                        <th align="center" valign="middle" nowrap="nowrap">รายละเอียดสินค้า</th>
                                        <th align="right" valign="middle" nowrap="nowrap">ราคา</th>
                                        <th align="right" valign="middle" nowrap="nowrap">จำนวน</th>
                                        <th align="right" valign="middle" nowrap="nowrap">รวม/บาท</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
								$sum = 0;
				if($orderDetial){
					
								 foreach($orderDetial as $p){ ?>
                                    <tr>
                                        <td align="center" valign="middle" nowrap="nowrap" class="col-md-1">SR<?php echo $p['productId']?></td>
                                        <td align="left" valign="middle" nowrap="nowrap"><?php echo $p['productName']?> สี<?php echo $p['color']?> Size : <?php echo $p['size']?> </td>
                                        <td align="right" valign="middle" nowrap="nowrap" class="col-md-1"><?php echo $p['productPrice']?></td>
                                      <td align="right" valign="middle" nowrap="nowrap" class="col-md-1"><?php echo $p['value']?></td>
                                       <td align="right" valign="middle" nowrap="nowrap" class="col-md-1"><?php echo number_format($p['value']*$p['productPrice'],2,'.',',');?></td>
                                    </tr>
                         <?php
						 $sum =$sum+($p['value']*$p['productPrice']);
						  } 
			}else{?>
                               		<tr>
                                        <td align="center" colspan="4" valign="middle" nowrap="nowrap" class="col-md-1">ไม่มีสินค้าในตะกร้า</td>
                                    </tr>
                            
					<?php }?>
                                 <tr>
                                        <td align="right" valign="middle" colspan="5" nowrap="nowrap"  >รวม &nbsp;<?php echo number_format($sum,2,'.',','); ?> บาท</td>

                                    </tr>
                                </tbody>
                            </table>

 