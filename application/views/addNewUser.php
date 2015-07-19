<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from templates.mycookroom.ru/Vortex-v1.0.1/Site/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Jun 2015 16:44:11 GMT -->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<title>SharonShoes</title>
	
	<!-- Favicons -->
	<link rel="shortcut icon" href="<?php echo base_url();?>assets/home/assets/images/favicon.png">
	<link rel="apple-touch-icon" href="<?php echo base_url();?>assets/home/assets/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url();?>assets/home/assets/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url();?>assets/home/assets/images/apple-touch-icon-114x114.png">
	
	<!-- Bootstrap core CSS -->
	<link href="<?php echo base_url();?>assets/home/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Plugins 	<link href="<?php echo base_url();?>assets/home/assets/css/font-awesome.min.css" rel="stylesheet">-->

	<link href="<?php echo base_url();?>assets/home/assets/css/ionicons.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/home/assets/css/simpletextrotator.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/home/assets/css/magnific-popup.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/home/assets/css/owl.carousel.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/home/assets/css/superslides.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/home/assets/css/vertical.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/home/assets/css/animate.css" rel="stylesheet">
	 <link href="<?php echo base_url();?>assets/css/bootstrap-toggle.min.css" rel="stylesheet">
	<!-- Template core CSS -->
	<link href="<?php echo base_url();?>assets/home/assets/css/style.css" rel="stylesheet">



       <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/revolution_slider/css/rs-style.css" media="screen">
   <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/revolution_slider/rs-plugin/css/settings.css" media="screen"> 
   <link href="<?php echo base_url();?>assets/plugins/bxslider/jquery.bxslider.css" rel="stylesheet" />        
    <style>
	#notti{
		background-color:#FF8E00;
		padding:5px;
		border-radius:100%;
	}
	 .logos {
		width:70px;
		max-width:70px;
    transition:All 0.5s ease-in-out;
    -webkit-transition:All 0.5s ease-in-out;
    -moz-transition:All 0.5s ease-in-out;
    -o-transition:All 0.5s ease-in-out;
    transform: scale(1) skew(1deg) translate(10px);
    -webkit-transform:  scale(1) skew(1deg) translate(10px);
    -moz-transform:  scale(1) skew(1deg) translate(10px);
    -o-transform:  scale(1) skew(1deg) translate(10px);
    -ms-transform:  scale(1) skew(1deg) translate(10px);
    }
    .logos:hover{
    transform:  scale(1.2) skew(1deg) translate(0px);
    -webkit-transform:  scale(1.2) skew(1deg) translate(0px);
    -moz-transform: scale(1.2) skew(1deg) translate(0px);
    -o-transform:  scale(1.2) skew(1deg) translate(0px);
    -ms-transform:  scale(1.2) skew(1deg) translate(0px);
	
    }

.slider-main{

	box-shadow:0px 0px 4px #7B7B7B;
	
	
}

.caption img{
		min-width:120px;
	min-height:120px;
		max-height:380px;
	max-width:380px;

	height:80%;
	width:80%;

	
}
.overlay-menu-inner div ul li a{

	font-weight:500;
}
#swichee{
-ms-transform: scale(0.8,0.8); /* IE 9 */
    -webkit-transform: scale(0.8,0.8); /* Safari */
    transform: scale(0.8,0.8);
	padding:0;
	margin-left:-5px;
	margin-right:-5px;
}
#revolutionul{
	line-height:inherit;
	max-height:400px;
	min-height:200px;
	height:100%;
}
	</style>
</head>
<body>
  <section class="mod model-4 slss">
  <div class="spinner"></div></section>
	<!-- PRELOADER -->
	<div class="page-loader">
		<div class="loader">Loading...</div>
	</div>
	<!-- /PRELOADER -->

	<!-- OVERLAY MENU -->
	<div id="overlay-menu" class="overlay-menu">

		<a href="#" id="overlay-menu-hide" class="navigation-hide"><i class="ion-close-round"></i></a>
		
		<div class="overlay-menu-inner">
		
			<div >
		
				<ul id="nav">
					<li><i class="glyphicon glyphicon-home"></i><a href="<?php echo base_url();?>index.php/site" title="<?php echo $homeMenu;?>" <?php echo $homeMenusize+10?>> <?php echo $homeMenu;?></a></li>
					<li><i class="glyphicon glyphicon-folder-close"></i><a onClick="scool();" href="<?php echo base_url();?>index.php/site#portfolio" title="<?php echo $product;?>"<?php echo $productsize+10?>> <?php echo $product;?></a></li>
					<li><i class="glyphicon glyphicon-envelope"></i><a href="#" title="<?php echo $contact;?>"<?php echo $contactsize+10?>> <?php echo $contact;?></a></li>
                    

               		
                     <?php if($faLoginStatus=="no"){?>
					 <li><i class="glyphicon glyphicon-check"></i><a href="<?php echo base_url();?>index.php/site/login" class="register"   title="<?php echo $resgister;?>"<?php echo $resgistersize+10?>> <?php echo $resgister;?></a></li>
                   
                       <?php }?>
                       
                    <?php if($faLoginStatus=="yes"){?>
                    <li><a href="<?php echo base_url();?>index.php/site/getAllBuy" class="allBuy" data-toggle="modal" data-target="#detial" <?php echo $resgistersize+10?>><i style="font-size:2em;color:#000;"  class="glyphicon glyphicon-shopping-cart"></i><b id="notti"></b></a></li>
                    <?php }?>
				
      		
				</ul></div>
		
		
		</div>
		
		<div class="overlay-navigation-footer">
		
			<div class="container">
		
				<div class="row">
		
					<div class="col-sm-12 text-center">
						
					</div>
		
				</div>
		
			</div>
		
		</div>

	</div>
	<!-- /OVERLAY MENU -->

	<!-- WRAPPER -->
	<div class="wrapper">

		<!-- NAVIGATION -->
		<nav class="navbar navbar-custom navbar-transparent navbar-light navbar-fixed-top">

			<div class="container">
			
				<div class="navbar-header">
					<!-- YOU LOGO HERE -->
					<a class="navbar-brand" href="<?php echo base_url();?>">
						<!-- IMAGE OR SIMPLE TEXT -->
						<img src="<?php echo base_url();?>assets/home/assets/images/logo-dark.png" width="95" alt="">
					</a>
				</div>
			
				<!-- ICONS NAVBAR -->

				<!-- /ICONS NAVBAR -->
			           
							          <ul id="icons-navbar" class="nav navbar-nav navbar-right">
                                     
					<li>
						<a href="#" id="toggle-menu" class="show-overlay" title="Menu">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
					</li>
                 <li id="swichee">
						
                  <a><input 
                  <?php if($select == "th"){ echo "checked";}?> data-toggle="toggle" data-style="android" data-onstyle="info" data-on="th" data-off="en"   data-size="mini" id="toggle-event" type="checkbox"></a>
          
                 </li>       
                                     <?php if($faLoginStatus=="yes"){?>
                    <li><a href="<?php echo base_url();?>index.php/site/getAllBuy" class="allBuy" data-toggle="modal" data-target="#detial"><i style="font-size:2em;color:#000;"  class="glyphicon glyphicon-shopping-cart"></i><b id="notti">0</b></a></li>
                    <?php }?>
                 
				</ul>
                 <ul class="nav navbar-right" style="margin-right:10px;">       
                          <?php if($faLoginStatus=="yes"){?>
                     <li  class="dropdown" ><a id="proFi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" href="<?php echo base_url();?>index.php/site/login" class="profile"    title="profile"<?php echo $resgistersize?>><img style="width:30px;height:30px;border-radius:100%;margin-top:-5px;" src="https://graph.facebook.com/<?php echo $user; ?>/picture"></a>
                         <ul class="dropdown-menu" aria-labelledby="proFi">
                   				<div class="row" class="col-sm-12" style="margin:10px;" align="center">
                                		<div class="col-xs-10" style="font-size:12px;"> 
													<button class="btn btn-danger btn-xs logout" onClick="window.location.href='<?php echo base_url();?>index.php/site/fbLogout'"><i style="color:#FFFFFF;"  class="glyphicon glyphicon-off"></i> ออกจากระบบ</button>
                                        </div>
                                 </div>
                          </ul>
                     
                     </li>
                   <?php }?>
                 
                       

  <?php if($faLoginStatus=="no"){?>
                    <li class="dropdown" style="margin-top:0px;"><a href="#" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" title="login" <?php echo $resgistersize-2;?>><i style="font-size:2em;color:#000;"  class="glyphicon glyphicon-user"></i><span class="caret"></span></a>
                    <ul class="dropdown-menu col-sm-12" aria-labelledby="dropdownMenu1">
                   			
                                		<div class="col-xs-12" > 
                                         <form>
                                         <div class="row" >
                                       
                                          <span class="input-group-addon glyphicon glyphicon-user" id="basic-addon1" style="top:0px;">E-mail</span>
                                          <input type="text" class="form-control" placeholder="email@email.com" aria-describedby="basic-addon1">
                                 
                                        </div>
                                        <div class="row" >
                                         
                                          <span class="input-group-addon glyphicon glyphicon-lock" id="basic-addon2" style="top:0px;">Password</span>
                                          <input type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon2">
                                 
                                        </div>
                                        <div class="row" align="center">
                                          <button type="submit" class="btn btn-primary">ลงชื่อเข้าใช้</button>
                                            <a href="<?php echo $fbbtUrl;?>"><img src="<?php echo  base_url() ?>img/fblogin.png" width="150"  /></a>
                                         </div>
                                        
                                        </form>
                                        </div>
                             
                          </ul>
                    </li>
                     <?php }?>


                </ul>
               

				<ul class="extra-navbar nav navbar-nav navbar-right" style="margin-left:-10px;">
                
					<li><a href="<?php echo base_url();?>index.php/site" title="<?php echo $homeMenu;?>" <?php echo $homeMenusize?>><i class="glyphicon glyphicon-home"></i> <?php echo $homeMenu;?></a></li>
					<li><a onClick="scool();" href="<?php echo base_url();?>index.php/site#portfolio" title="<?php echo $product;?>"<?php echo $productsize?>><i class="glyphicon glyphicon-folder-close"></i> <?php echo $product;?></a></li>
					<li><a href="#" title="<?php echo $contact;?>"<?php echo $contactsize?>><i class="glyphicon glyphicon-envelope"></i> <?php echo $contact;?></a></li>
                    
     <?php if($faLoginStatus=="no"){?>
					 <li><a href="<?php echo base_url();?>index.php/site/login" class="register"   title="<?php echo $resgister;?>"<?php echo $resgistersize?>><i class="glyphicon glyphicon-check"></i> <?php echo $resgister;?></a></li>
                   
                       <?php }?>
               		
                  
                    
				</ul>
                
                   
			</div>
 	
		</nav>


		<!-- /NAVIGATION -->

		<!-- HERO -->
		<section id="hero" class="module-hero module-parallax bg-light-30"  style="max-height:80px;">

			<!-- HERO TEXT -->
			<div class="hero-caption">
				<div class="hero-text">


				</div>
                
			</div>
			<!-- /HERO TEXT -->

		</section>
		<!-- /HERO -->
<section class="module-hero">

			        <div class="fullwidthbanner-container slider-main">
            <div class="fullwidthabnner">
                <ul id="revolutionul" style="display:none;">
                        <!-- THE NEW SLIDE -->
                        <li data-transition="fade" data-slotamount="2" data-masterspeed="700" data-delay="9400" >
                            <!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
                            <img src="<?php echo base_url();?>assets/home/assets/images/section-4.jpg" alt="">
                            
                            <div class="caption lft dark slide_item_left"
                                 data-x="10"
                                 data-y="100"
                                 data-speed="400"
                                 data-start="150"
                                 data-easing="easeOutExpo" >
                                 <img src="<?php echo base_url();?>assets/img/logo.png" >
                            </div>
                            <div class="caption lft slide_title slide_item_left"
                                 data-x="80"
                                 data-y="300"
                                 data-speed="400"
                                 data-start="250"
                                 data-easing="easeOutExpo">
                                 <h2 class="mh-line-size-1 font-alt m-b-20" id="headtext">SharonShoes</h2>
                            </div>
                                          

                          
                            
                        </li> 

                         <!-- THE THIRD SLIDE -->
                        <li data-transition="fade" data-slotamount="6" data-masterspeed="400" data-delay="9400">                        
                           <img src="<?php echo base_url();?>assets/home/assets/images/section-4.jpg" alt="">
                            <div class="caption lfl slide_title slide_item_right"
                                 data-x="150"
                                 data-y="125"
                                 data-speed="400"
                                 data-start="500"
                                 data-easing="easeOutExpo" >
                               <h1 class="font-alt m-b-20" id="headtext">SharonShoes</h1>
                            </div>
         
                            <div class="caption lfr slide_item_right" 
                                 data-x="550" 
                                 data-y="50" 
                                 data-speed="1200" 
                                 data-start="1000" 
                                 data-easing="easeOutBack">
                                 <img src="<?php echo base_url();?>assets/img/sliders/revolution/shoes1.png" alt="Image 1">
                            </div>
                            <div class="caption lfr slide_item_right" 
                                 data-x="770" 
                                 data-y="50" 
                                 data-speed="1200" 
                                 data-start="1200" 
                                 data-easing="easeOutBack">
                                 <img src="<?php echo base_url();?>assets/img/sliders/revolution/shoes2.png" alt="Image 1">
                            </div>
                            <div class="caption lfr slide_item_left" 
                                 data-x="750" 
                                 data-y="200" 
                                 data-speed="1200" 
                                 data-start="1400" 
                                 data-easing="easeOutBack">
                                 <img src="<?php echo base_url();?>assets/img/sliders/revolution/shoes3.png" alt="Image 1">
                            </div>
                            <div class="caption lfr slide_item_right" 
                                 data-x="500" 
                                 data-y="200" 
                                 data-speed="1200" 
                                 data-start="1600" 
                                 data-easing="easeOutBack">
                                 <img src="<?php echo base_url();?>assets/img/sliders/revolution/shoes4.png" alt="Image 1">
                            </div>
                      

                        </li>
                                   
                       
                        </li>               
                        
                </ul>
                <div class="tp-bannertimer tp-bottom"></div>
            </div>
        </div>

</section>
		<!-- PORTFOLIO -->
		<section id="portfolio" class="module">

			<div class="container" id="loadinfo">

					            <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="deleteh">Register</h2>
      </div>
      <div class="modal-body" id="detialco">
<form class="form-horizontal">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">e-mail</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">ยินยัน e-mail</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">ยืนยันPassword</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  
  
</form>
</div>

  <div class="modal-footer">
          <button type="button" class="btn btn-success" onClick="alert('Coming Soon!'); return false;">Sign Up</button>
          <button type="button" class="btn btn-default" id="confBayClose"data-dismiss="modal">Cancle</button>
      </div>
			</div>

		</section>
		<!-- /PORTFOLIO -->

		<!-- FOOTER -->
		<footer class="module bg-light">

			<div class="container">
			
				<div class="row">
			
					<div class="col-sm-12">
			
						<ul class="social-text-links font-alt text-center m-b-20">
							<li><a href="#">Facebook</a></li>
							<li><a href="#">Line</a></li>
                            <li><a href="#">Contact</a></li>
						</ul>
			
					</div>
			
				</div>
			
				<div class="row">
			
					<div class="col-sm-12">
			
						<p class="copyright text-center m-b-0">© 2015 Vortex, All Rights Reserved.</p>
			
					</div>
			
				</div>
			
			</div>

		</footer>
		<!-- /FOOTER -->
	</div>
	<!-- /WRAPPER -->

	<!-- SCROLLTOP -->
	<div class="scroll-up">
		<a href="#totop"><i class="fa fa-angle-double-up"></i></a>
	</div>
<div class="modal fade bs-detial-modal-lg" id="detial" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" id="contentDetial">
     
    </div>
  </div>
</div>
    
	<!-- Javascript files -->
	<script src="<?php echo base_url();?>assets/home/assets/js/jquery-2.1.3.min.js"></script>
	<script src="<?php echo base_url();?>assets/home/assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/home/assets/js/jquery.superslides.min.js"></script>
	<script src="<?php echo base_url();?>assets/home/assets/js/jquery.mb.YTPlayer.min.js"></script>
	<script src="<?php echo base_url();?>assets/home/assets/js/jquery.magnific-popup.min.js"></script>
	<script src="<?php echo base_url();?>assets/home/assets/js/owl.carousel.min.js"></script>
	<script src="<?php echo base_url();?>assets/home/assets/js/jquery.simple-text-rotator.min.js"></script>
	<script src="<?php echo base_url();?>assets/home/assets/js/imagesloaded.pkgd.js"></script>
	<script src="<?php echo base_url();?>assets/home/assets/js/isotope.pkgd.min.js"></script>
	<script src="<?php echo base_url();?>assets/home/assets/js/packery-mode.pkgd.min.js"></script>
	<script src="<?php echo base_url();?>assets/home/assets/js/appear.js"></script>
	<script src="<?php echo base_url();?>assets/home/assets/js/jquery.easing.1.3.js"></script>
	<script src="<?php echo base_url();?>assets/home/assets/js/wow.min.js"></script>
	<script src="<?php echo base_url();?>assets/home/assets/js/jqBootstrapValidation.js"></script>
	<script src="<?php echo base_url();?>assets/home/assets/js/jquery.fitvids.js"></script>
	<script src="<?php echo base_url();?>assets/home/assets/js/jquery.parallax-1.1.3.js"></script>
	<script src="<?php echo base_url();?>assets/home/assets/js/smoothscroll.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-toggle.min.js"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script src="<?php echo base_url();?>assets/home/assets/js/gmaps.js"></script>
	<script src="<?php echo base_url();?>assets/home/assets/js/contact.js"></script>
	<script src="<?php echo base_url();?>assets/home/assets/js/custom.js"></script>
    <script src="<?php echo base_url();?>assets/home/assets/js/custom.js"></script>
    <script src="<?php echo base_url();?>js/jquery-scrollto.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/plugins/revolution_slider/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/plugins/revolution_slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
    <script type="text/javascript" src="<?php echo base_url();?>assets/plugins/bxslider/jquery.bxslider.min.js"></script>
    <script src="<?php echo base_url();?>assets/scripts/index.js"></script>    
    <script type="text/javascript">
        jQuery(document).ready(function() {
             $('.bxslider').show();
            $('.bxslider').bxSlider({
                minSlides: 2,
                maxSlides: 10,
                slideWidth: 360,
                slideMargin: 10,
                moveSlides: 1,
                responsive: true,
            });

      
            Index.initRevolutionSlider();   
			 
	
                        
        });
    </script>
    
    <script>


    $("#registerbox").hide();
	$("#ea").hide();
$("#registerbt").click(function(e) {
		$("#registerbox").toggle(800);
});
$(".mailserver").change(function(e) {

	if($(this).val()=="Other"){
		
		$(".mailserver").hide();

		$("#ea").show();

	}else{
		$(".mailserver").show();
		
		$("#ea").hide();

	}
});
$("#sweet").click(function(e) {
	
	 $(".mailserver,#ea").toggle();

});

$("#sent").click(function(e) {
	e.preventDefault();
	var mail = "";
	var realmail = "";
	if($(".mailserver").val()=="Other"){
		mail = "@"+$("#ea").val(); 
	}else{
		mail = $(".mailserver").val();
	}
	realmail = $("#inputEmail33").val()+mail;
    	$.post( "<?php echo base_url();?>index.php/site/sentMail", { 
	email: realmail

	}).done(function( data ) {
		$("#resultSent").html(data);
		$(this).hide();
		
  });
});

 function scool(){
	  $("#portfolio").ScrollTo({
   			 duration: 1000,
   			 easing: "linear"
		});
		setTimeout(function(){
			$("#all").trigger("click");
		},1300);
  }
</script>
