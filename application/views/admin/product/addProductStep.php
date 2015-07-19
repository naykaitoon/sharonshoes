 <style type="text/css">
.stepwizard-step p {
	
		
}
.stepwizard-row {
	display: table-row;
	
}
.stepwizard {
	display: table;
	width: 88%;
	position: relative;
}
.stepwizard-step button[disabled] {
	opacity: 1 !important;
	filter: alpha(opacity=100) !important;
}
.stepwizard-row:before {
	top: 14px;
	bottom: 0;
	position: absolute;
	content: " ";
	width: 67%;
	height: 1px;
	background-color: #ccc;
	z-order: 0;
}
.stepwizard-step {
	display: table-cell;
	text-align: center;
	position: relative;
	width:22%;
	
}
.btn-circle {
	width: 30px;
	height: 30px;
	text-align: center;
	padding: 6px 0;
	font-size: 12px;
	line-height: 1.428571429;
	border-radius: 15px;
}

      .cropit-image-preview {
        background-color: #f8f8f8;
        background-size: cover;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-top: 7px;
        width: 398px;
        height: 398px;
        cursor: move;
      }

      .cropit-image-background {
        opacity: .2;
        cursor: auto;
      }

      .image-size-label {
        margin-top: 10px;
      }

      input {
        display: block;
      }

      button[type="submit"] {
        margin-top: 10px;
      }

      #result {
		 display:none;
        margin-top: 10px;
        width: 398px;
		height:398px;
      }

      #result-data {
        display: block;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        word-wrap: break-word;
      }
    </style>


      <div class="stepwizard col-md-12 col-md-offset-2">
    <div class="stepwizard-row setup-panel col-md-12">
          <div class="stepwizard-step">
        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
        <p>Step 1<br>ข้อมูลเริ่มต้น</p>

      </div>
          <div class="stepwizard-step">
        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
        <p>Step 2<br>ระบุสีของ size</p>
      </div>
          <div class="stepwizard-step">
        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
        <p>Step 3<br>กำหนดรูปสีสินค้า</p>
      </div>
         <div class="stepwizard-step">
        <a href="#step-4" title="" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
        <p>Step 4<br>กำหนดรูปโปรไฟล์</p>
      </div>
        </div>
  </div>

<!--<form role="form" action="" method="post"> -->
<form role="form" id="step1form" action="" method="post">
    <div class="row setup-content" id="step-1">
          <div class="col-md-12">
        <div class="col-md-12">
              <h3> Step 1</h3>
              <div class="form-group">

            <label class="control-label">ชื่อสินค้า</label>
            <input type="text" required="required" name="productName" id="productName" class="form-control" placeholder="ชื่อ"  />
                    
                 </div>
             <div class="form-group">

            <label class="control-label col-sx-0" for="typeId">ประเภทสินค้า</label>
      <select class="form-control" id="typeId" name="typeId">
          <?php $i=1;foreach($type as $t){?>
        	<option <?php if($i==1){?> selected <?php }?> value="<?php echo $t['typeId']?>"><?php echo $t['typeName']?></option>
             <?php $i=$i+10;} ?>
        </select>
                    
                 </div>
           <div class="form-group">

            <label class="control-label">ราคา</label>
            <input type="number" required="required" name="productPrice" id="productPrice" class="form-control" placeholder="ราคาสินค้า"  />
                    
                 </div>
           <div class="form-group">

            <label for="comment">รายละเอียดอิ่นๆ</label>
  			<textarea class="form-control" rows="5" name="productDetial" id="productDetial"></textarea>
                    
            </div>

          <div class="row">
                <div class="col-xs-4">
             	 <button class="btn btn-danger btn-sm pull-right" id="deleteRows" type="button" >-</button>
               </div>

           
    <div class="form-group" >
           <label class="control-label">size</label>
 
            <div class="input-group col-xs-4" id="sizeadd">
              <input type="text" class="form-control sizeText" id="1s"  required="required" name="size[]" placeholder="size 1">
              <input type="text" class="form-control sizeText" id="2s"  required="required" name="size[]" placeholder="size 2">
            </div>
  

               <div class="col-xs-4">
        
               <button class="btn btn-success btn-sm pull-right" id="addRows" type="button" >+</button> 
               </div>
       </div>
            
               <button class="btn btn-primary nextBtn pull-right" id="onestepnextbt" type="button" >Next</button>
             </div>
            </div>
		</div>
	</div>
</form>
<form role="form" id="step2form" action="" method="post">
    <div class="row setup-content" id="step-2">
          <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
              <h3> Step 2</h3>
              <div class="form-group" id="color">
        
          </div>
              <button class="btn btn-primary nextBtn pull-right" id="twostepnextbt" type="button" >Next</button><button class="btn btn-primary backBtn pull-right" type="button" >Back</button>&nbsp;&nbsp;
            </div>
      </div>
        </div>
 </form>
    <div class="row setup-content" id="step-3">
          <div class="col-xs-12 col-md">
        <div class="col-md-12">
              <h3> Step 3</h3>
                <div class="progress">
                                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0"
  aria-valuemin="0" aria-valuemax="100"><div class="percent">0%</div ></div >
                                            
                                        </div>
              <div class="form-group col-xs-12" id="addImgs">
               </div>
                         <button class="btn btn-primary nextBtn pull-right" id="nextbtcopsss" type="button" >Skip/Next</button>
            </div>
      </div>
        </div>
      <!--</form>-->
          <div class="row setup-content" id="step-4">
          <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
              <h3> Step 4</h3>
              
              <div class="form-group">
             <form id="formimgh" action="<?php echo base_url();?>index.php/magement/profileProductUpload" method="post" enctype="multipart/form-data">
            <div class="image-editor">
                <input type="file" data-preview-file-type="text" class="file cropit-image-input" required>
                <div class="cropit-image-preview"></div>
                <div class="image-size-label">
                  Resize image
                </div>
                <input type="range" class="cropit-image-zoom-input">
                <input type="hidden" name="image-data" class="hidden-image-data" />
             <button type="submit" class="btn btn-primary" onClick="return cut();" >ตัด</button>
             </div>
             </form>
          </div>
            
           <div id="result" class="form-group">
           <img src="<?php echo base_url();?>img/loading_circle_large.gif" width="400" height="400" id="loaddingg" style="display:none;" /> 
      				<p id="resultimg" style="display:none;" >
                    
                    </p>
                    
    		</div>
        
           
   
            </div>
      </div>
        </div>

<script src="<?php echo base_url();?>script/addProductScript.js"></script>