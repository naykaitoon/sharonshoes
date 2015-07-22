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
        <br>
<table class="table table-bordered col-md-12">

  	<tr>
    	<td align="center">
      <form class="form-horizontal" method="post" action="<?php echo  base_url() ?>index.php/site/VerifiedAcco">
        <br>
            <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">อีเมล</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">รหัสผ่าน</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>

			    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary outline" > Sign in</button>
   
    </div>
      </form>

</td>
</tr>
     </table> 

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