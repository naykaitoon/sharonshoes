      <div class="modal-body" id="detialco">
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

.loadercontent {
	float:right;


  font-size: 15px;
  color:#464646;

  position: relative;
	z-index:10099;
  border-top: 0.5em solid rgba(255, 255, 255, 0.2);
  border-right: 0.5em solid rgba(255, 255, 255, 0.2);
  border-bottom: 0.5em solid rgba(255,255,255,1.00);
  border-left: 0.5em solid #1291E1;

  -webkit-transform: translateZ(0);
  -ms-transform: translateZ(0);
  transform: translateZ(0);
  -webkit-animation: load8 1.1s infinite linear;
  animation: load8 1.1s infinite linear;
 
}
.loadercontent,
.loadercontent:after {
  border-radius: 50%;
  width: 10em;
  height: 10em;
}
@-webkit-keyframes load8 {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes load8 {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}

</style>
<table class="table table-bordered">
	<?php foreach($titledetial as $td){?>
  	
    <tr>
    	<td align="right" class="col-md-2">ชื่อสินค้า</td>
    	<td align="left"><?php echo $td['productName'];?></td>

    </tr>
    <tr>
    	<td align="right" >ราคา</td>
    	<td align="left"><?php echo $td['productPrice'];?></td>

    </tr>
    <tr>
    	<td align="right">รายละเอียดอื่นๆ</td>
    	<td align="left"><?php echo $td['productDetial'];?></td>

    </tr>
    <tr>
    	<td align="right">ประเภท</td>
    	<td align="left"><?php echo $td['typeName'];?></td>

    </tr>
    <?php }?>
</table>
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">ภาพประกอบ</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">สั่งซื้อ/หยิบใส่คระกร้า</a></li>
  </ul>

  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
    <br>
<table class="table table-bordered">

  	<tr>
    	<td align="center">
  <!-- Slider -->
              <div class="row">
        <div class="col-sm-3">
        </div>
            <div class="col-sm-6">
                <div class="col-xs-12" id="slider"  style="max-width:400px;min-width:200px;width:100%;">
                    <!-- Top part of the slider -->
                    <div class="row"  style="max-width:400px;min-width:200px;width:100%;">
                        <div class="col-sm-12" id="carousel-bounding-box"  style="max-width:400px;min-width:200px;width:100%;">
                            <div class="carousel slide" id="myCarousel"  style="max-width:400px;min-width:200px;width:100%;">
                                <!-- Carousel items -->
                                <div class="carousel-inner"  style="max-width:400px;min-width:200px;width:100%;">
                       
                      
        						 <?php
									$selector = 1 ;
									 foreach($detial as $d){foreach($imgall as $img){foreach($img as $ig){  if($ig['colorId']==$d['colorId']){ ?>
							
                                    <div class="item <?php if($selector==1){ echo "active";}?>"  style="max-width:400px;min-width:200px;width:100%;" data-slide-number="<?php echo $selector;?>">
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
            
            	  <div class="col-sm-12" id="slider-thumbs">
                    <br>
                <!-- Bottom switcher of slider -->
                <ul class="hide-bullets">
                  
<?php
$selectors = 0 ;
  foreach($detial as $d){foreach($imgall as $img){foreach($img as $ig){  if($ig['colorId']==$d['colorId']){ ?>
                    <li class="col-sm-3" style="max-width:180px;min-width:100px;width:30%;">
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
         
            </div>
            <!--/Slider-->
            </td>
            </tr>
            </table>
      </div>
      
        <div role="tabpanel" class="tab-pane" id="profile">
             <table  class="table table-bordered">
           </tr>  
            </td>
        <td align="left">
        <div class="col-sm-4" align="center">
        <label class="control-label col-sx-0" for="listType">Size</label>
      <select class="form-control" id="sizeId" >
      <option value="0">กรุณาเลือก Size</option>
             <?php	foreach($size as $d){?>
        	<option  value="<?php echo $d['sizeId']?>"><?php echo $d['size']?></option>
       		<?php } ?>
        </select>
        <br>
       <label class="control-label col-sx-0" for="colorId">สี</label>
      <select class="form-control" id="colorId">
      <option value="0">กรุณาเลือกSizeก่อน</option>
        </select>
 	  </div>
        <div class="col-sm-3" align="center">
        <div class="cal"  style="display:none">
            <label class="control-label col-sx-0" for="valueNum">จำนวน</label>
            <input class="form-control"  type="number" id="valueNum" value="1" style="text-align:right;width:160px;"/>
            <input class="form-control" type="hidden" id="productId" value="<?php echo $titledetial[0]['productId'];?>"/>
            </div>
          <br>
           <button type="button" class="btn btn-primary cal" id="confBay" onClick="alert('Coming Soon!'); return false;"  style="display:none">สั่งซื้อ</button>&nbsp;&nbsp;
	</div>
    
    <div class="cal col-sm-5"  id="imgShowReview" align="center" style="min-width:150px;min-height:150px;float:left; ">
    	    
    </div>

        </td>
   	</tr>
</table>
 
<hr>
<table class="table table-bordered">
	<?php foreach($titledetial as $td){?>
    <tr>
    	<th align="right" class="col-md-2">ชื่อสินค้า</th>
    	<td align="left"><?php echo $td['productName'];?></td>

    </tr>
     <tr>
    	<th align="right">ประเภท</th>
    	<td align="left"><?php echo $td['typeName'];?></td>

    </tr>
    <tr>
    	<th align="right" >ราคา</th>
    	<td align="left"><?php echo $td['productPrice'];?>&nbsp; บาท</td>

    </tr>
    <tr>
    	<th align="right">รายละเอียดอื่นๆ</th>
    	<td align="left"><?php echo $td['productDetial'];?></td>

    </tr>
   
    <?php }?>
</table>

</div>

      

      </div>
         
     <div class="modal-footer">
          <button type="button" class="btn btn-default" id="confBayClose" data-dismiss="modal">ปิด</button>
      </div>
<script>
		setTimeout(function(){
		  $(".page-loader,.loadercontent").fadeOut("slow");

		},500);

$("#sizeId").change(function(e) {
    e.preventDefault();
	if($(this).val()!="0"){
	 $.post("/index.php/site/getColorProduct", {sizeId:$(this).val()}) //Serialize looks good name=textInNameInput&&telefon=textInPhoneInput---etc
        .done(function(data) {

         			$("#colorId").html(data);
        
        
        });
	}else{
		$(".cal").hide("fast");
	}
		
});
$("#colorId").change(function(e) {
		$("#imgShowReview").html("");
if($("#sizeId").val()!="0"){
	if($(this).val()!="กรุณาเลือกสี"){
					
						$("#imgShowReview").load("<?php echo base_url();?>index.php/site/getimageColor/"+$(this).val());
						$("#imgShowReview").fadeIn("slow").addClass("loadercontent");
						setTimeout(function(){
					
								$("#imgShowReview").fadeIn("slow").removeClass("loadercontent");
										$(".cal").fadeIn("fast");
										$("#imgResult").fadeIn("slow");
						},1000);

		
	}else{
		$(".cal").hide("fast");
	}
	}else{
		$(".cal").hide("fast");
	}
});
$("#confBay").click(function(e) {

  $.post("/index.php/site/buyItem", {sizeId:$("#sizeId").val(),colorId:$("#colorId").val(),valueNum:$("#valueNum").val(),productId:$("#productId").val()}) //Serialize looks good name=textInNameInput&&telefon=textInPhoneInput---etc
        .done(function(data) {

         		$.get( "<?php echo base_url();?>index.php/site/countBuyitem", function( data ) {
					  $("#notti").html( data );
					  $("#notti").fadeIn("slow");
				});
				$("#confBayClose").trigger("click");
        
        
        });
});


 
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

</script>