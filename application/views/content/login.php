			<form class="form-horizontal">
  <div class="form-group col-sm-offset-6 col-md-12">
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
    <div class="form-group">
  <div class="col-sm-10 col-sm-offset-2">
  <div class="checkbox">
    <label>
      <input type="checkbox"> Remember Me
    </label>
  </div>
  </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="button" class="btn btn-primary outline" onClick="alert('Coming Soon!'); return false;"> Sign in</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $fbbtUrl;?>"><img src="<?php echo  base_url() ?>img/fblogin.png" width="200" id="loginbt"  /></a>
   
    </div>
      
     <div class="col-sm-offset-0 col-sm-10">
      <hr>
        <div class="row col-md-offset-2 col-md-12">
    <button type="button" class="btn btn-default" id="registerbt">Register</button>
     </div>
     <br>
    <div class="row col-md-12" id="registerbox" >

    <div class="row">
     <button type="button" class="btn btn-xs btn-primary  pull-right" id="sweet" style="margin-right:200px;color:#000;"><i class="glyphicon glyphicon-retweet"></i> switch</button>
     </div>
     <br>
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label"  for="inputEmail3">E-mail</label>
    <div class="col-sm-3-offset-2 col-sm-10">
     <div class="input-group" id="inputGroupSuccess2Status" style="float:left;word-wrap:break-word;"> 
     <input type="email" class="form-control" id="inputEmail33" placeholder="Email" >
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

</script>