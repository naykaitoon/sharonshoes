<!DOCTYPE html>
<html lang="en" >
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Menament - จัดการร้านค้า</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel='stylesheet' href='<?php echo base_url();?>node_modules/nprogress/nprogress.css'/>
	
        <link rel='shortcut icon' type='image/vnd.microsoft.icon' href='<?php echo base_url();?>main_icon.ico'>
        <link rel="icon" type="image/png" href="<?php echo base_url();?>main_icon.png" />
		<link href="<?php echo base_url();?>admin/theme/css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="<?php echo base_url();?>admin/theme/css/style.css" rel="stylesheet">
<style>
		@import url(http://fonts.googleapis.com/css?family=Noto+Sans:400,400italic,700,700italic&subset=latin,greek-ext,cyrillic,latin-ext,vietnamese,devanagari,greek,cyrillic-ext);
*{
	font-family: 'Noto Sans', sans-serif;
}
#loading {
  width: 100%;
  height: 100%;
  top: 0px;
  left: 0px;
  position: fixed;
  display: block;
  opacity: 0.7;
  background-color: #fff;
  z-index: 99;
  text-align: center;
}

#loading-image {
  position: absolute;
  top: 100px;
  left: 240px;
  z-index: 100;
}
body* {
	font-family: 'Noto Sans', sans-serif;
	color: #777;
	overflow-x: hidden;
	-ms-overflow-style: scrollbar;
}
.input-group{
	margin-bottom:10px;
}
</style>
</head>
<body onLoad="  NProgress.start()" >
<div class="container"  >
<div id="gallery">
</div>
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
<form class="form col-md-12 center-block" action="<?php echo base_url();?>index.php/admin/verifyLogin" method="post">
  <div class="modal-dialog loginf" >
  <div class="modal-content" >
      <div class="modal-header">
          <h3 class="text-center">Login</h3>
      </div>
      <div class="modal-body">
          <div class="input-group col-md-12">
              <span class="input-group-addon" id="sizing-addon2"><i class="glyphicon glyphicon-user"></i></span>
              <input type="text" class="form-control input-lg" name="username" placeholder="Username" aria-describedby="sizing-addon2">
            </div>
         
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addo1"><i class=" glyphicon glyphicon-lock"></i></span>
              <input type="password" class="form-control input-lg" name="password" placeholder="Password" aria-describedby="sizing-addo1">
            </div>
       		<br>
            <div class="form-group col-md-4 col-md-offset-4" align="center">
              <button class="btn btn-primary" type="submit"><i class=" glyphicon glyphicon-cloud"></i> Sign In</button>
            </div>  
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
			<?php echo $error;?>
      </div>
  </div>

  </div>
       </form> 
</div>
</div>
	<!-- script references -->
    <script src="<?php echo base_url();?>admin/theme/jquery.min.js"></script>
	<script src="<?php echo base_url();?>admin/theme/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/jquery.fullscreen.min.js"></script>
    <script src='<?php echo base_url();?>node_modules/nprogress/nprogress.js'></script>
	<script>    	
	   $.ajax({
			 url: '<?php echo base_url();?>index.php/admin/getbg',
			 success: function(data){
				 $('#gallery').html(data);
				 $("input").attr("autocomplete","off");
				$('#gallery').fullscreenGallery(); 
				setTimeout(function(){ 
				  NProgress.done();
				},3500);
			 }
			 
			 }).error(function(){
			 alert('load bgError!');
		});	                                                                                                                       
	</script>
	</body >
</html>