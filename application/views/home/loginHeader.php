
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
 $('#toggle-event').change(function() {

			 if($(this).prop('checked')==true){
				 			
				 window.location.href = "<?php echo base_url();?>index.php/site/logins/th";
				 
			 }else if($(this).prop('checked')==false){
				 			
				  window.location.href = "<?php echo base_url();?>index.php/site/logins/en";
	
			 }
		  
		});
		 scool();
 function scool(){
	  $("#registerbt").ScrollTo({
   			 duration: 1000,
   			 easing: "linear"
		});
	
  }
</script>
