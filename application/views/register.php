
		<section id="portfolio" class="module">

			<div class="container" id="loadinfo">
<?php if($message=="true"){?>
<div class="form-horizontal">

  <div class="form-group">
   		 <div class="form-group">
    <label for="c" class="col-sm-2 control-label">E-mail : </label>
    <div class="col-sm-5">
			<ul id="c" style="padding:8px;"><?php echo $code[0]['mail']?><input type="hidden" id="codeActice"  value="<?php echo $code[0]['codeActice']?>"></ul>
     </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword4" class="col-sm-2 control-label">ยืนยันPassword</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password" value="">
    </div>
  </div>
   <div class="form-group">
    <label for="inputPassword5" class="col-sm-2 control-label">ชื่อ</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword5" placeholder="ชื่อ" value="">
    </div>
  </div>
   <div class="form-group">
    <label for="inputPassword6" class="col-sm-2 control-label">นามสกุล</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword6" placeholder="นามสกุล" value="">**ชื่อ - นามสกุล ใช้ในการจ่าหน้าพัสดุ
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword7" class="col-sm-2 control-label">ที่อยู่</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="inputPassword7" placeholder="ที่อยู่ในการจัดส่งสินค้าสำหรับ บัญชีนี้"></textarea><p style="color:#8E0204">**กรุณาใส่ที่อยู่จริงเพื่อการจัดส่งที่ถูกต้อง</p>

    </div>
  </div>
   <div class="form-group">
    <label for="inputPassword8" class="col-sm-2 control-label">เบอร์โทร</label>
    <div class="col-sm-10">
     <input type="text" class="form-control" id="tel" placeholder="tel" value="">ุ<p style="color:#8E0204">**กรุณาใส่เบอร์โทรจริงเพื่อป้องกันปัญหาที่จะเกิดขึ้น</p>

    </div>
  </div>
   <div class="form-group">
<label for="regis" class="col-sm-2 control-label"></label>
    <div class="col-sm-10">
    		<button class="btn btn-success" id="regis"><strong>ยืนยันข้อมูล</strong></button>&nbsp;&nbsp;<button class="btn btn-danger" id="delEmail"><strong>ยกเลิกและลบ Email จากระบบ</strong></button>
  </div>
  </div>
     <div class="form-group">
<label for="result" class="col-sm-2 control-label"></label>
    <div class="col-sm-10" id="result">
    		
  </div>
  </div>
</div>
<?php }else if($message=="none"){?>
<center><h3 style="color:#AC2528"><?php echo $sta;?></h3></center>
<?php }else{?>
<center><h3 style="color:#AC2528"><?php echo $sta;?></h3></center>
<?php }?>
			</div>

		</section>
		<!-- /PORTFOLIO -->