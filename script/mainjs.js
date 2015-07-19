$(document).ready(function(e) {
	
    $('#portfolio').load("/index.php/site/productList");
	//////////////////////      LANGSCRIPT      /////////////////////////////////////////////
  		 $('#toggle-event').change(function() {

			 if($(this).prop('checked')==true){
				 			
				 window.location.href = "/index.php/site/index/th";
				 
			 }else if($(this).prop('checked')==false){
				 			
				  window.location.href = "/index.php/site/index/en";
	
			 }
		  
		});
//////////////////////      LANGSCRIPTEND      /////////////////////////////////////////////
});

