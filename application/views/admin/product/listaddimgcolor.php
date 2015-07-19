 <style>
 .inimg img{
 	float:left;
	padding:3px;
	border-radius:5xp;
	box-shadow:0px 0px 2px #828181;
 }
 .inimg{
 	text-align:center;
 }

 </style>

     <h4>ชื่อสินค้า : <?php echo $addData[0]['productName'];?></h4><br>
     
                                      
   <?php
   $calss=0;
$listnum = 0;
$itp = 0 ;

 foreach($addData as $da){
	 $i = 0;
	 ?>
                                      <form  action="<?php echo base_url();?>index.php/magement/uploadImgArr" method="post" enctype="multipart/form-data" class="hidented<?php echo  $calss;?>">
  <table class="table table-bordered table-hover table-striped" class="hidented<?php echo  $calss;?>">
                                <thead>
                                    <tr>

                                        <th align="center" valign="middle" nowrap="nowrap">size : <?php echo $da['size']?></th>

                                        <th align="center" valign="middle" nowrap="nowrap">รูป</th>
                                        <th align="center" valign="middle" nowrap="nowrap">เลือกรูป</th>
                    
                                    </tr>
                                </thead>

                                <tbody>
             					<?php
											$ii=0;
						
								 foreach($da['color'] as $color){
						
									?>
                                    <tr>
  
                                        <td align="left" valign="middle" nowrap="nowrap">สี : <?php echo $color;?></td>
         
                                        <td align="center" valign="middle" nowrap="nowrap" class="col-md-5" ><div id="blah<?php echo $i.'t'.$ii.$listnum;?>"  class="inimg" style="max-width:310px;min-widht:310px; height: 100%;"><img src="<?php echo base_url();?>img/images.png"  style="width:100px;" class="img-thumbnail" /></div></td>
                                        <td align="right" valign="middle" nowrap="nowrap" class="col-md-1"><input style="font-size:10px;" multiple type="file" onChange="readURL(this,'<?php echo $i;?>','<?php echo $ii;?>',<?php echo $listnum;?>,'<?php echo MD5($da['size'].$da['productName'].$i.$ii.$color.$i.'t'.$ii.$listnum);?>','<?php echo $colorId[$listnum];?>');" name="file[]" class="btn" /><input type="hidden" value="<?php echo MD5($da['size'].$itp.$ii);?>" name="codeup"/><input type="hidden" value="<?php echo $color;?>" name="color[]"/><input type="hidden" value="<?php echo $da['size'];?>" name="size[]"/>
                                        <input type="hidden" value="<?php echo $listnum;?>" name="listnum[]"/>
                                     
                                   </tr>    
                    			<?php $ii++;$listnum++;}?>
                                </tbody>
                                                    
                            </table>
                             
                                        
                                <div id="status"></div>        
                               <br>
                                <button type="submit" class="sentd btn btn-primary" value="hidented<?php echo  $calss;?>" > StartUpload </button></td>
                            <hr>    
                                    </form>        
                                   
<?php   $calss++;$i++;$itp++;}?>
   <input type="number" id="countFrom" value="<?php echo  $calss;?>" style="display:none"/> 
<script src="<?php echo base_url();?>admin/jquery.form.js"></script>
<script>
$("#nextbtcopsss").hide();
$("#countFrom").hide();
var a = 0;
$(".sentd").click(function(e) {
	$(".sentd").attr("disable","disable");
	var calsshi = $(this).attr("value");
	calsshi = "."+calsshi;
	$(calsshi).fadeOut("slow");
	a=a+1;
	if(a==$("#countFrom").val()){
		$("#nextbtcopsss").fadeIn("slow");
	}
});
function readURL(input,is,iss,listnum,code,colorId) {
			var idd = "#blah"+is+'t'+iss+''+listnum;
		$(idd).html("");
for(i=0;i<input.files.length;i++){
    if (input.files[i]) {
        var reader = new FileReader();

        reader.onload = function (e) {
						
								
					   			var img = document.createElement("img");
							
                                img.height = "100";
                                img.width = "100";
                                img.src = e.target.result;
								img.class = "img-thumbnail";
								
								$(idd).append(img);
								var color = document.createElement("input");
								color.type = "hidden";
								color.value = colorId;
								color.name = "colorId[]";
								$(idd).append(color);
								
        }

        	reader.readAsDataURL(input.files[i]);
		}
    }
}


(function() {
    
var bar = $('.progress-bar');
var percent = $('.percent');
var status = $('#status');


;
$('form').ajaxForm({
    beforeSend: function() {
        status.empty();
        var percentVal = '0%';
        bar.width(percentVal);
        percent.html(percentVal);
    },
    uploadProgress: function(event, position, total, percentComplete) {
        var percentVal = percentComplete + '%';
        bar.width(percentVal)
        percent.html(percentVal);

		//console.log(percentVal, position, total);
    },
    success: function() {
        var percentVal = '100%';
        bar.width(percentVal);
		$('.progress-bar').addClass("progress-bar-success").addClass("active");
        percent.html(percentVal);

            	setTimeout(function(){
						 percentVal = '0%';
						 bar.width(percentVal)
						 percent.html(percentVal);
						 $(".sentd").removeAttr("disable");
						  $('.progress-bar').removeClass("progress-bar-success").removeClass("active");
				},2000);

	
    },
	complete: function(xhr) {
		status.html(xhr.responseText);
	}
}); 

})();       
</script>
