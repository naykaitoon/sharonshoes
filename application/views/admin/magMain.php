<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Magement - SHARONSHOES</title>
     <link rel='shortcut icon' type='image/vnd.microsoft.icon' href='<?php echo base_url();?>main_icon.ico'>
    <link rel="icon" type="image/png" href="<?php echo base_url();?>main_icon.png" />
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>admin/theme/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>admin/theme/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url();?>admin/theme/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>admin/theme/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     <link href="<?php echo base_url();?>admin/plugin/spin/whirl.css" rel="stylesheet" type="text/css">
  

   <link href="<?php echo base_url();?>js/ui/jquery-ui.css" rel="stylesheet">
   <link href="<?php echo base_url();?>js/ui/jquery.timepicker.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>


table td,th{
	font-size:14px;
}
.navbar{
	box-shadow:0px 3px 5px #848484;
}

	</style>
</head>

<body  style="background-color:#FFFFFF">

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><i class="fa fa-wrench"></i> Magement - SHARONSHOES</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
             <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Admin <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url();?>index.php/admin/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav" >
                  	<li class="active">
                        <a href="#"><i class="fa fa-fw fa-home"></i> หน้าแรก</a>
                    </li>
                      <li >
                        <a href="javascript:;" class="menuarrows" data-toggle="collapse" data-target="#productType"><span class="fa fa-tag"></span> ข้อมูล สินค้า/ประเภท <i class="glyphicon glyphicon-menu-right"></i></a>
                        <ul id="productType" class="collapse">
                              <li>
                                <a href="<?php echo base_url();?>index.php/magement/type" class="link" ><i class="glyphicon glyphicon-th-list"></i> ประเภทสินค้า</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>index.php/magement/product" class="link" id="firstSelect"><i class="glyphicon glyphicon-indent-left"></i> จัดการสินค้า</a>
                            </li>
                     
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menuarrows" data-toggle="collapse" data-target="#orderMenu"><span class="fa fa-money"></span> จัดการการซื้อขาย <i class="glyphicon glyphicon-menu-right"></i></a>
                        <ul id="orderMenu" class="collapse">
                            <li>
                                <a href="<?php echo base_url();?>index.php/magement/order" class="link"><i class="fa fa-bars"></i> ใบสั่งซื้อ</a>
                            </li>
                           <li>
                                <a href="<?php echo base_url();?>index.php/magement/waitPay" class="link"><i class="fa fa-credit-card"></i> การชำระเงิน</a>
                            </li>
                           <li>
                                <a href="<?php echo base_url();?>index.php/magement/shipping" class="link"><i class="fa fa-share-square"></i> จัดส่งสินค้า</a>
                            </li>
                          <li>
                                <a href="<?php echo base_url();?>index.php/magement/tacking" class="link"><i class="fa fa-truck"></i> Tacking</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>index.php/magement/member" class="link"><i class="fa fa-fw fa-users"></i> ข้อมูลสมาชิก</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>index.php/magement/tackingLog" class="link"><i class="fa fa-fw fa-truck"></i> TackingLog</a>
                    </li>
                       <li>
                        <a href="<?php echo base_url();?>index.php/magement/bankAccount" class="link"><i class="fa fa-clipboard"></i> บัญชีธนาคาร</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid" id="loadcon">

              

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url();?>admin/theme/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>admin/theme/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    
    <script src="<?php echo base_url();?>admin/theme/js/plugins/morris/raphael.min.js"></script>
    <script src="<?php echo base_url();?>admin/theme/js/plugins/morris/morris.min.js"></script>
    <script src="<?php echo base_url();?>admin/theme/js/plugins/morris/morris-data.js"></script>

	<script src="<?php echo base_url();?>admin/plugin/cropit/jquery.cropit.js"></script>
    <script src="<?php echo base_url();?>assets/home/assets/js/smoothscroll.js"></script>
    <script src="<?php echo base_url();?>js/ui/jquery-ui.js"></script>
    <script src="<?php echo base_url();?>js/ui/jquery.timepicker.js"></script>     

	<script>
			$("#loadcon").hide();
		$("body").addClass("ringed").addClass("whirl");

		$("#loadcon").load($("#firstSelect").attr("href"));

		
        $(".menuarrows").click(function(e) {

			$(this).find(".glyphicon").toggleClass("glyphicon-menu-down");
        });
		$(".link").click(function(e) {
			e.preventDefault();
			$("#loadcon").hide();
			$("body").addClass("ringed").addClass("whirl");
			
			var herf = $(this).attr("href");
			$("#loadcon").load(herf);
				
			});
		$(".side-nav li").click(function(e) {
			$(".side-nav li").removeClass("active");
			$(this).addClass("active");
		});
		$("input").attr("autocomplete","off");
	</script>
</body>

</html>
