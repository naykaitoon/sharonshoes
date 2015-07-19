 <style>
 img {
    max-width: 100%;
    max-height: 100%;
}
.square {
    height: 500px;
    width: auto;
}
#comfirmpay{
	margin-top:10%;

}
table*{

    -webkit-transition: all 1s ease-in-out;
    -moz-transition: all 1s ease-in-out;
    -ms-transition: all 1s ease-in-out;
    -o-transition: all 1s ease-in-out;
    transition: all 1s ease-in-out;
}
 </style>
  <table class="table table-bordered table-hover table-striped">
                                <tbody>
                                <?php
			

					
								 foreach($orderDetial as $p){ ?>
                                    <tr>
                                        <th align="right" valign="middle" nowrap="nowrap">ชื่อ Account</th>
                                    	<td align="left" valign="middle" nowrap="nowrap"><?php echo $p['usernameLogin']?></td>
                                  </tr>
                                    <tr>
                                        <th align="right" valign="middle" nowrap="nowrap">ชื่อ-สกุล</th>
                                    	<td align="left" valign="middle" nowrap="nowrap"><?php echo $p['nameuser']?>&nbsp;<?php echo $p['lnameuser']?></td>
                                  </tr>
                                    <tr>
                                        <th align="right" valign="middle" nowrap="nowrap">ที่อยู่จัดส่งสินค้า</th>
                                    	<td align="left" valign="middle" nowrap="nowrap"><?php echo $p['adress']?></td>
                                  </tr>
                                     <tr>
                                        <th align="right" valign="middle" nowrap="nowrap">เบอร์ติดต่อ</th>
                                    	<td align="left" valign="middle" nowrap="nowrap"><?php echo $p['tel']?></td>
                                     </tr>
                                     <tr>
                                       <th align="right" valign="middle" nowrap="nowrap">เวลาชำระเงิน</th>
                                   	   <td align="left" valign="middle" nowrap="nowrap"><?php $date = new DateTime($p['date']." ".$p['time']);
										echo $date->format('d/m/').($date->format('Y')+543)." ".$date->format('H:i');?></td>
                                     </tr>
                                     <tr class="notpassSentEmail">
                                           <th align="right" class="notpassSentEmail" valign="middle" nowrap="nowrap">เนื่องจากสาเหตุ</th>
                                           <td align="left" class="notpassSentEmail" valign="middle" nowrap="nowrap"><textarea id="textSentEmail" class="form-control" rows="5"></textarea><br><button type="button" class="btn btn-success btn-sm sentemail"><i class="glyphicon glyphicon-envelope"></i> ส่งเมล</button>&nbsp;&nbsp;<button type="button" class="btn btn-danger btn-sm notpassscheck notpassSentEmail" value="<?php echo $orderDetial[0]['orderId']?>"><i class="glyphicon glyphicon-remove"></i> ยกเลิก</button></td>
                                                                      </tr>
                                  <tr>
                                    <th align="right" valign="middle" nowrap="nowrap">หลักฐานการชำระเงิน<input type="hidden" id="valuresdr" value="<?php echo $p['orderId']?>"/></th>
                               	    <td align="center" valign="middle" nowrap="nowrap"><div class="square"><img class="thumbnail" src="data:image/png;base64,<?php echo $p['data']?>"/></div></td>
                                  </tr>
                                    
                         <?php		  } ?>
   </tr>

                                    <tr>
                                    <th colspan="2" align="center" valign="middle" nowrap="nowrap"><div align="center"><button type="button" class="btn btn-success btn-sm comfirmpay" id="comfirmpaysss" data-toggle="modal" data-target="#comfirmpay" ><i class="glyphicon glyphicon-check"></i> ผ่านการตรวจสอบ</button>&nbsp;&nbsp;<button type="button" class="btn btn-danger comfirmpay btn-sm notpassscheck" value="<?php echo $orderDetial[0]['orderId']?>"><i class="glyphicon glyphicon-remove"></i> ไม่ผ่านการตรวจสอบ</button></div>
 </th>
                                  </tr>
                                   
    </tbody>
                            </table>	
                            <hr>
<script>

$(".notpassSentEmail").hide();
$(".comfirmpay").show();
$("#comfirmpaysss").click(function(e) {
    $("#confirmpayBT").attr("value",$("#valuresdr").val());
});
$(".notpassscheck").click(function(e) {
	    $(".notpassSentEmail").toggle("slow");
		$(".comfirmpay").toggle("slow");
});

$(".sentemail").click(function(e) {
				
						
	  $.post("<?php echo base_url();?>index.php/magement/sentemailnotConfirm", {textSentEmail: $("#textSentEmail").val(),id:$("#valuresdr").val()}, function(result){
   				$("body").addClass("ringed").addClass("whirl");
				$(".modal").modal('hide');
				$("#tableOrder").load("<?php echo base_url();?>index.php/magement/waitPayList");
				 $("body").removeClass("ringed").removeClass("whirl");
    });
});

	
</script>