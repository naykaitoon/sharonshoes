 var navListItems = $('div.setup-panel div a'),
		  allWells = $('.setup-content'),
		  allNextBtn = $('.nextBtn');
		  allBackBtn = $('.backBtn');

  allWells.hide();

  navListItems.click(function (e) {
	  e.preventDefault();
	  var $target = $($(this).attr('href')),
			  $item = $(this);

	  if (!$item.hasClass('disabled')) {
		  navListItems.removeClass('btn-primary').addClass('btn-default');
		  $item.addClass('btn-primary');
		  allWells.hide();
		  $target.show();
		  $target.find('input:eq(0)').focus();
	  }

	
  });

  allNextBtn.click(function(){
	  var curStep = $(this).closest(".setup-content"),
		  curStepBtn = curStep.attr("id"),
		  nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
		  curInputs = curStep.find("input[type='text'],input[type='url'],textarea[textarea]"),
		  isValid = true;

	  $(".form-group").removeClass("has-error");
	  for(var i=0; i<curInputs.length; i++){
		  if (!curInputs[i].validity.valid){
			  isValid = false;
			  $(curInputs[i]).closest(".form-group").addClass("has-error");
		  }
	
		  if($("#productPrice").val()<=0){
			    isValid = false;
				$("#productPrice").closest(".form-group").addClass("has-error");
		  }
	  }

	  if (isValid)
		  nextStepWizard.removeAttr('disabled').trigger('click');
  });
   allBackBtn.click(function(){
	  var curStep = $(this).closest(".setup-content"),
		  curStepBtn = curStep.attr("id"),
		  nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a"),
		  isValid = true;
		  nextStepWizard.removeAttr('disabled').trigger('click');
		                $("#closeAddProduct").fadeIn("fast");
  });

  $('div.setup-panel div a.btn-primary').trigger('click');
  
$("#addRows").click(function(e) {
			
   $("#sizeadd").append('<input type="text" class="form-control sizeText"  required="required" name="size[]" id="'+($(".sizeText").length+1)+'s" placeholder="size '+($(".sizeText").length+1)+'">');
});
$("#deleteRows").click(function(e) {
	if($(".sizeText").length>1){
		$(".sizeText:last").remove();
	}
	
});

$("#onestepnextbt").click(function(e) {
	 var valuess = $("#step1form").serialize();
	
	 $.post("/index.php/magement/setSession/1", valuess) //Serialize looks good name=textInNameInput&&telefon=textInPhoneInput---etc
        .done(function(data) {

         			
                //alert(data);   
        
        });
    var sizet = document.getElementsByClassName("sizeText");
	var allhtml = "";
	var c;
	for(i=0;i<sizet.length;i++){
		
		if(sizet[i].value!=c){
			c =sizet[i].value;
			var sentclass = "'colorsubsize"+i+"'";
			var htmlcolor = '';
				htmlcolor = '<hr><label class="control-label">size : '+sizet[i].value+'</label>'+
							'<div class="input-group col-xs-6 colormain'+i+'">';
					for(invalue=1;invalue<2;invalue++){
						htmlcolor = htmlcolor+'<input type="text" class="form-control colorsubsize'+i+'" required="required" name="colorsubsizena'+i+'[]" placeholder="color '+invalue+'">';
					}
	
				htmlcolor = htmlcolor+'</div>'+
				'<button id="colormain'+i+'" onclick="checkclass('+sentclass+','+i+');" class="btn btn-success btn-sm" type="button">+</button>​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​'+
				'<button onclick="removecolor('+sentclass+');" class="btn btn-danger btn-sm" type="button">-</button>​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​';
				allhtml = allhtml+htmlcolor;
				
		}
	}
	$("#color").html(allhtml);

});
$("#closeAddProduct").click(function(e) {
		$("#tableproduct").hide();
		$("body").addClass("ringed").addClass("whirl");
		$("#closeAddProduct").removeClass("btn-success").text('ยกเลิก');
	$("#tableproduct").load("/index.php/magement/productByType/"+$('#listType').val());
});
$("#twostepnextbt").click(function(e) {
	 var valuestwo = $("#step2form").serialize();
	 $("#closeAddProduct").fadeOut("fast");
	 $.post("/index.php/magement/setSession/2", valuestwo) //Serialize looks good name=textInNameInput&&telefon=textInPhoneInput---etc
        .done(function(data) {

         			$("#addImgs").html(data); 

        
        });
		
});
        $('.image-editor').cropit();
	
        $('#formimgh').submit(function(e) {
			$("#loaddingg").fadeIn("slow");
			$("#resultimg").fadeOut("slow");
			e.preventDefault();
          // Move cropped image data to hidden input
          var imageData = $('.image-editor').cropit('export');
          $('.hidden-image-data').val(imageData);

          // Print HTTP request params
          var formValue = $(this).serialize();
		  
		   $.post("/index.php/magement/profileProductUpload", formValue) //Serialize looks good name=textInNameInput&&telefon=textInPhoneInput---etc
        .done(function(data) {

         			
                $("#resultimg").html(data);   
        		$("#loaddingg").fadeOut("slow");
				$("#resultimg").fadeIn("slow");
        });


          // Prevent the form from actually submitting
          return false;
        });
		
		
function ltrim(str){
	var newvar = "";
           	   if (str==null){
				return null;
				}
				else{
					   for(var i=0;i<str.length;i++){
						   if(str.charAt(i)!=" "){
						   	newvar = newvar+str.charAt(i);
						   }
					   }
         			   return newvar;
				}
        
}

function checkclass(name,addto){

	var newhtmlel = '<input type="text" class="form-control '+name+'" required="required" name="colorsubsizena'+addto+'[]" placeholder="color '+(document.getElementsByClassName(name).length+1)+'">';
	var classnameadd = '.colormain'+addto;
	$(classnameadd).append(newhtmlel);
	
}

function removecolor(name){
	var newn = "."+name;
	var newname = "."+name+":last";
	if($(newn).length>1){
		$(newname).remove();
	}
	
	
}

function cut(){

	$('#result').fadeOut('slow');
}