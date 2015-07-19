  <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
                             Manage BankAccount<small> (จัดการการบัญชีธนาคาร)</small>
                        </h2>
                    </div>
                </div>
     <!-- ------------------------------  -->
 <div class="row">
<div class="panel panel-default">
  <div class="panel-body">
<div class="col-xs-12">
                    <div class="table-responsive" id="tableOrder">
                          
      				</div>
   </div>
	</div>
	</div>
</div>



<script>
  setTimeout(function(){
					
					$("body").removeClass("ringed").removeClass("whirl");
					$("#loadcon").fadeIn("fast");
				},500);

$("#tableOrder").load("<?php echo base_url();?>index.php/magement/bankAccountList");


</script>