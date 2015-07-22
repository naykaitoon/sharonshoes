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
                    <li><i class="glyphicon glyphicon-credit-card"></i><a href="#" title="<?php echo $pay;?>"<?php echo $paysize+10?>> <?php echo $pay;?></a></li>


					 <li><i class="glyphicon glyphicon-check"></i><a href="<?php echo base_url();?>index.php/site/logins" class="register"   title="<?php echo $resgister;?>"<?php echo $resgistersize+10?>> <?php echo $resgister;?></a></li>
                   

                       
       
      		
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
                                  
				</ul>
                 <ul class="nav navbar-right" style="margin-right:10px;">       
                    <li class="dropdown" style="margin-top:0px;"><a href="#" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" title="login" <?php echo $resgistersize-2;?>><i style="font-size:2em;color:#000;"  class="glyphicon glyphicon-user"></i><span class="caret"></span></a>
                    <ul class="dropdown-menu col-sm-12" aria-labelledby="dropdownMenu1">
                   			
                                		<div class="col-xs-12" > 
                                       	<form class="form-horizontal" method="post" action="<?php echo  base_url() ?>index.php/site/VerifiedAcco">
                                         <div class="row" >
                                       
                                          <span class="input-group-addon glyphicon glyphicon-user" id="basic-addon1" style="top:0px;">E-mail</span>
                                          <input type="text" class="form-control"  name="emaillogin" placeholder="email@email.com" aria-describedby="basic-addon1">
                                 
                                        </div>
                                        <div class="row" >
                                         
                                          <span class="input-group-addon glyphicon glyphicon-lock" id="basic-addon2" style="top:0px;">Password</span>
                                          <input type="password" class="form-control" placeholder="Password" name="passlogin" aria-describedby="basic-addon2">
                                 
                                        </div>
                                        
                                     	<center><button type="submit" class="btn btn-sm btn-primary"> Sign in</button></center>
                                
                                        </form>
                                        </div>
                             
                          </ul>
                    </li>
                


                </ul>
               

				<ul class="extra-navbar nav navbar-nav navbar-right" style="margin-left:-10px;">
                
					<li><a href="<?php echo base_url();?>index.php/site" title="<?php echo $homeMenu;?>" <?php echo $homeMenusize?>><i class="glyphicon glyphicon-home"></i> <?php echo $homeMenu;?></a></li>
					<li><a onClick="scool();" href="<?php echo base_url();?>index.php/site#portfolio" title="<?php echo $product;?>"<?php echo $productsize?>><i class="glyphicon glyphicon-folder-close"></i> <?php echo $product;?></a></li>
					<li><a href="#" title="<?php echo $contact;?>"<?php echo $contactsize?>><i class="glyphicon glyphicon-envelope"></i> <?php echo $contact;?></a></li>
                    <li><a href="#" title="<?php echo $pay;?>"<?php echo $paysize?>><i class="glyphicon glyphicon-credit-card"></i> <?php echo $pay;?></a></li>

					 <li><a href="<?php echo base_url();?>index.php/site/logins" class="register"   title="<?php echo $resgister;?>"<?php echo $resgistersize?>><i class="glyphicon glyphicon-check"></i> <?php echo $resgister;?></a></li>                    
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