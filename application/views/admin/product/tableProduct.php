  <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th align="center" valign="middle" nowrap="nowrap">รหัสสินค้า</th>
                                        <th align="center" valign="middle" nowrap="nowrap">ชื่อสินค้า</th>
                                        <th align="center" valign="middle" nowrap="nowrap">ราคา</th>
                                        <th align="center" valign="middle" nowrap="nowrap">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($product as $p){ ?>
                                    <tr>
                                        <td align="center" valign="middle" nowrap="nowrap" class="col-md-1">SR<?php echo $p['productId']?></td>
                                        <td align="left" valign="middle" nowrap="nowrap"><?php echo $p['productName']?></td>
                                        <td align="right" valign="middle" nowrap="nowrap" class="col-md-1"><?php echo $p['productPrice']?></td>
                                      <td align="center" valign="middle" nowrap="nowrap" class="col-md-1">
   <button type="button" class="btn btn-warning btn-xs produstListedital" data-toggle="modal" data-target="#detial" value="<?php echo $p['productId']?>"><i class="glyphicon glyphicon-info-sign"></i> ข้อมูล/แก้ไข</button>&nbsp;&nbsp;<button type="button" class="btn btn-danger btn-xs deletePro" data-toggle="modal" data-target="#delete" value="<?php echo $p['productId']?>"><i class="glyphicon glyphicon-remove"></i> ลบ</button></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
<script>
  setTimeout(function(){
					$("body").removeClass("ringed").removeClass("whirl");
					$("#tableproduct").fadeIn("fast");
				},500);
$(".produstListedital").click(function(e) {

	$("#detialco").load("<?php echo base_url();?>index.php/magement/getDetialProduct/"+$(this).val());
});
$(".produstListedit").click(function(e) {

	$("#editco").load("<?php echo base_url();?>index.php/magement/geteditProduct/"+$(this).val());
});
$(".deletePro").click(function(e) {
	$("#confirmDeleteProduct").attr("value",$(this).val());
});
</script>