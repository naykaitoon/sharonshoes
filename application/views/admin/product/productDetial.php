<style>
.hide-bullets {
    list-style:none;
    margin-left: -40px;
    margin-top:20px;
}

.thumbnail {
    padding: 0;
}
.carousel-inner{

}
.item>img, .carousel-inner>.item>a>img {
	height:100%;
	width:100%;;
}
.nav-tabs li a{
	padding-left:80px;
	padding-right:80px;
}
.deleted{
	display:none;
}
.
</style>
<input type="hidden" id="productIdt" value="<?php echo $titledetial[0]['productId']?>"/>

<table class="table table-bordered">
	<?php foreach($titledetial as $td){?>
  	
    <tr>
    	<td align="right" class="col-md-2">ชื่อสินค้า</td>
    	<td align="left" ><p  class="col-sm-3 product1" id="pText1"><?php echo $td['productName'];?></p><input type="text" value="<?php echo $td['productName'];?>" id="productNamet" class="form-control col-sm-3 deleted" ></td>

    </tr>
    <tr>
    	<td align="right" >ราคา</td>
    	<td align="left"><p  class="col-sm-3 product1" id="pText2"><?php echo $td['productPrice'];?></p><input type="number" value="<?php echo $td['productPrice'];?>" id="productPricet" class="form-control col-sm-3 deleted" ></td>

    </tr>
    <tr>
    	<td align="right">รายละเอียดอื่นๆ</td>
    	<td align="left"><p class="col-sm-3 product1" id="pText3"><?php echo $td['productDetial'];?></p><textarea id="productDetialt" class="form-control col-sm-3 deleted"><?php echo $td['productDetial'];?></textarea></td>

    </tr>
    <tr>
    	<td align="right">ประเภท</td>
    	<td align="left"><p class="col-sm-3 product1" id="pText4"><?php echo $td['typeName'];?></p><select class="form-control col-sm-3 deleted" id="typeIdt" name="typeIdt">
          <?php $i=1;foreach($type as $t){?>
        	<option <?php if($i==1){?> selected <?php }?> value="<?php echo $t['typeId']?>"><?php echo $t['typeName']?></option>
             <?php $i=$i+10;} ?>
        </select></td>

    </tr>
     <tr>
    	<td align="right">แก้ไข</td>
    	<td align="left"><button type="button" class="btn btn-warning product1" value="productNameTi" >แก้ไข</button><button type="button" class="btn btn-primary deleted" id="save">บันทึก</button>&nbsp;<button type="button" class="btn btn-warning deleted" id="cancle">ยกเลิก</button></td>

    </tr>
    <?php }?>
</table>
<p id="alertRe" style="display:none;"></p>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">รูป</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">ข้อมูล</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
    <br>
      <!-- Slider -->
        <div class="row">
        <div class="col-sm-3">
        </div>
            <div class="col-sm-6">
                <div class="col-xs-12" id="slider">
                    <!-- Top part of the slider -->
                    <div class="row">
                        <div class="col-sm-12" id="carousel-bounding-box">
                            <div class="carousel slide" id="myCarousel">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                       
                      
        						 <?php
									$selector = 1 ;
									 foreach($detial as $d){foreach($imgall as $img){foreach($img as $ig){  if($ig['colorId']==$d['colorId']){ ?>
							
                                    <div class="item <?php if($selector==1){ echo "active";}?>" data-slide-number="<?php echo $selector;?>">
                                        <img src="data:image/jpeg;base64,<?php echo $ig['imgBase64'];?>"></div>
                                        
								<?php $selector++;}}
								if(!$img&&$selector==1){ ?>
  <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-0">
                        
                            <img src="<?php echo base_url();?>img/zero.png">
                        </a>
                    </li>
				<?php $selector++;}
								}}?>
                               
                                </div>
                                <!-- Carousel nav -->
                                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    <div class="col-sm-2">
        </div>
            </div>  
            <div class="row">
             <div class="col-sm-2"></div>
            	  <div class="col-sm-8" id="slider-thumbs">
                    <br>
                <!-- Bottom switcher of slider -->
                <ul class="hide-bullets">
                  
<?php
$selectors = 0 ;
  foreach($detial as $d){foreach($imgall as $img){foreach($img as $ig){  if($ig['colorId']==$d['colorId']){ ?>
                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-<?php echo $selectors;?>"><img src="data:image/jpeg;base64,<?php echo $ig['imgBase64'];?>" ></a>
                    </li>
<?php $selectors++;}}
if(!$img&&$selectors==0){ ?>
  <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-0">
                        
                            <img src="<?php echo base_url();?>img/zero.png">
                        </a>
                    </li>
<?php $selectors++;}
}}?>
                </ul>
            </div>
             <div class="col-sm-2"></div>
            </div>
            <!--/Slider-->
    
    
    </div>
    <div role="tabpanel" class="tab-pane" id="profile">
      <div class="row">
       <div class="col-sm-1"></div>
       <div class="col-sm-10">
    <br>
<h2>ขนาด</h2>

<table class="table table-bordered col-md-12">
  	<tr>
        <th align="center">ขนาด</th>
        <th align="center">สี</th>
        <th align="center">รูป</th>
   	</tr>
	<?php foreach($detial as $d){?>
    <tr>
    	<td align="left" class="col-md-1"><?php echo $d['size'];?></td>
		<td align="left"><?php echo $d['color'];?></td>
        <td align="center">
        <?php foreach($imgall as $img){ 
		foreach($img as $ig){ 
			if($ig['colorId']==$d['colorId']){?>
			<img class="img-thumbnail" src="data:image/jpeg;base64,<?php echo $ig['imgBase64'];?>" width='150'/>
			<?php }
		}
		}?>
        </td>
    </tr>
    <?php }?>
</table>
</div>
     <div class="col-sm-1"></div>
    </div>
  </div>

</div>



<script>

 
        $('#myCarousel').carousel({
                interval: 5000
        });
 
        //Handles the carousel thumbnails
        $('[id^=carousel-selector-]').click(function () {
        var id_selector = $(this).attr("id");
        try {
            var id = /-(\d+)$/.exec(id_selector)[1];
            console.log(id_selector, id);
            jQuery('#myCarousel').carousel(parseInt(id));
        } catch (e) {
            console.log('Regex failed!', e);
        }
    });
        // When the carousel slides, auto update the text
        $('#myCarousel').on('slid.bs.carousel', function (e) {
                 var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-'+id).html());
        });
$("button.product1").click(function(e) {
		
		$(".product1").hide("slow");
		$(".deleted").show("slow");

			
	
});

$("button.deleted").click(function(e) {
		$(".product1").show("slow");
		$(".deleted").hide("slow");

		
});

$("#save").click(function(e) {
	if((parseFloat($("#productPricet").val())*1)==parseFloat($("#productPricet").val())){
		 $("#pText1").html($("#productNamet").val());
		 $("#pText2").html($("#productPricet").val());
		 $("#pText3").html($("#productDetialt").val());
		$("#pText4").html($("#typeIdt option:selected").text()); 
	$.post( "<?php echo base_url();?>index.php/magement/updateTypeAction", { 
	productId: $("#productIdt").val(), 
	productName: $("#productNamet").val(),
	productPrice: $("#productPricet").val(),
	productDetial: $("#productDetialt").val(),
	typeId: $("#typeIdt").val()
	}).done(function( data ) {

		 

		$("body").addClass("ringed").addClass("whirl");
		
		$("#tableproduct").load("/index.php/magement/productByType/"+$("#typeIdt").val());
		
  });
	}else{
		$(".product1").hide("slow");
		$(".deleted").show("slow");

		$("#alertRe").html('<div class="alert alert-danger" role="alert">กรุณาระบุตัวเลขที่ถูกต้อง</div>');
		$("#alertRe").fadeIn("fast");
		setTimeout(function(){
			$("#alertRe").fadeOut("slow");
		},5000);
	}

});
</script>