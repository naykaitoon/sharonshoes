
		<section id="portfolio" class="module">

			<div class="container" id="loadinfo">

						<form class="form-horizontal" method="post" action="<?php echo  base_url() ?>index.php/site/VerifiedAcco">
  <div class="form-group col-sm-offset-6 col-md-12">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">อีเมล</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" name="emaillogin" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label"  >รหัสผ่าน</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" name="passlogin" placeholder="Password">
    </div>
  </div>
    <div class="form-group">
  <div class="col-sm-10 col-sm-offset-2">
 
  </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary outline"> Sign in</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $fbbtUrl;?>"><img src="<?php echo  base_url() ?>img/fblogin.png" width="200" id="loginbt"  /></a>
   
    </div>
    <?php
	$uu = 0;
	 if($_GET){
				if( isset($_GET['error']) AND $_GET['error']=="nouser"){
		?>
    		
      <center><div class="alert alert-danger" role="alert">ไม่พบ ผู้ใช้งานอยู่ในระบบ</div></center>
      <?php 
				}else if( isset($_GET['error']) AND $_GET['error']=="notlogin"){ ?>
				      <center><div class="alert alert-danger" role="alert">กรูณาล็อกอินก่อนใช้งาน</div></center>
			<?php	}else if( isset($_GET['error']) AND $_GET['error']=="notRegister"){ $uu=1; ?>
            <center><div class="alert alert-warning" role="alert">กรุณา ลงทะเบียน และยืนยัน E-mail ก่อน Login ผ่าน Facebook</div></center>
	  <?php }}?>
     <div class="col-sm-offset-0 col-sm-10">
      <hr>
        <div class="row col-md-offset-2 col-md-12">
    <button type="button" class="btn btn-default" id="registerbt">Register</button>
     </div>
     <br>
    <div class="row col-md-12" id="registerbox"  <?php if( $uu==0){?>style="display:none" <?php }?> >

    <div class="row">
     <button type="button" class="btn btn-xs btn-primary  pull-right" id="sweet" style="margin-right:200px;color:#000;"><i class="glyphicon glyphicon-retweet"></i> switch</button>
     </div>
     <br>
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label"  for="inputEmail3">E-mail</label>
    <div class="col-sm-3-offset-2 col-sm-10">
     <div class="input-group" id="inputGroupSuccess2Status" style="float:left;word-wrap:break-word;"> 
     <input type="email" class="form-control col-sm-4" id="inputEmail33" placeholder="Email" >
        <span class="input-group-addon">@</span> 
        <select class="form-control col-sm-3-offset-5 mailserver"  aria-describedby="inputGroupSuccess2Status" style="width:200px;">
              <option value="@hotmail.com">hotmail.com</option>
              <option value="@hotmail.co.th">hotmail.co.th</option>
              <option value="@msn.com">msn.com</option>
              <option value="@outlook.com">outlook.com</option>
              <option value="@gmail.com">gmail.com</option>
              <option value="@yahoo.com">yahoo.com</option>
              <option value="Other" id="Other">Other</option>
        </select>
        <input type="email" class="form-control" id="ea"  aria-describedby="inputGroupSuccess2Status"  placeholder="Other Email" style="width:200px;"> 
      </div>
      

    </div>
  
  </div>
  
    <hr>
    <div class="form-group col-md-12">
     <div class="col-sm-2-offset-2 col-sm-2">
       </div>
   <div class="col-sm-2-offset-2 col-sm-2">
      <button type="button" class="btn btn-success col-sm-3-offset-2" id="sent" id="inputWarning1"><i class="glyphicon glyphicon-envelope"></i> Sent</button><br><p id="resultSent"></p>
   </div>
	</div>
  
  </div>
    </div>

  </div>
</form>

			</div>

		</section>
		<!-- /PORTFOLIO -->

	