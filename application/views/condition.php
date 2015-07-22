
		<section id="portfolio" class="module">

			<div class="container" id="loadinfo">

			<center>
            	<h2>เงื่อนไขในการลงทะเบียน</h2>
                <div style="width:750px;height:350px;overflow:scroll;text-align:left" id="datacontent">
                    <?php echo $dataCon[0]['datacontent'];?>
                </div>
                <br>
            	<button class="btn btn-success btn-xs confirmconditon" value="true">ยอมรับ</button>&nbsp;&nbsp;<button class="btn btn-danger btn-xs confirmconditon" value="false">ไม่ยอมรับ</button>
                <br>
               
            </center>
		 		<div id="resultRegisd">
           
           </div>
			</div>
   		
		</section>
		<!-- /PORTFOLIO -->
<script>
$(".confirmconditon").click(function(e) {
	$(".confirmconditon").fadeOut("fast");
	$("#datacontent").fadeOut("fast");
    if($(this).val()=="false"){
		window.location.href = window.location.href;
	}else if($(this).val()=="true"){
		 $.post( "<?php echo base_url()?>index.php/verifiedEmail/checkAndAddnewUser", {value : $(this).val()},function( data ) {
			 $("#resultRegisd").hide();
			 $("#resultRegisd").html('<div class="alert alert-success" role="alert">ลงทะเบียนสำเร็จสามารถ Login ใช้งานได้เลย</div>').fadeIn("fast");
			 setTimeout(function(){
				 window.location.href = '<?php echo base_url()?>';
			 },3000);
			 
		});
	}
});
</script>
	