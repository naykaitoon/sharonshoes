		<!-- NAVIGATION -->
		<nav class="navbar navbar-custom navbar-transparent navbar-light navbar-fixed-top">

			<div class="container">
			
				<div class="navbar-header">
					<!-- YOU LOGO HERE -->
					<a class="navbar-brand" href="<?php echo base_url();?>">
						<!-- IMAGE OR SIMPLE TEXT -->
						<img src="<?php echo base_url();?>assets/home/assets/images/logo-dark.png" width="95" alt="">
					</a>
				</div>
			
				<!-- ICONS NAVBAR -->

				<!-- /ICONS NAVBAR -->
			           
							          <ul id="icons-navbar" class="nav navbar-nav navbar-right">
                                     
					<li>
						<a href="#" id="toggle-menu" class="show-overlay" title="Menu">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
					</li>
                 <li id="swichee">
						
                  <a><input 
                  <?php if($select == "th"){ echo "checked";}?> data-toggle="toggle" data-style="android" data-onstyle="info" data-on="th" data-off="en"   data-size="mini" id="toggle-event" type="checkbox"></a>
          
                 </li>       
                                     <?php if($faLoginStatus=="yes"){?>
                    <li><a href="<?php echo base_url();?>index.php/site/getAllBuy" class="allBuy" data-toggle="modal" data-target="#detial"><i style="font-size:2em;color:#000;"  class="glyphicon glyphicon-shopping-cart"></i><b id="notti">0</b></a></li>
                    <?php }?>
                 
				</ul>
                 <ul class="nav navbar-right" style="margin-right:10px;">       
                          <?php if($faLoginStatus=="yes"){?>
                     <li  class="dropdown" ><a id="proFi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" href="<?php echo base_url();?>index.php/site/login" class="profile"    title="profile"<?php echo $resgistersize?>><img style="width:30px;height:30px;border-radius:100%;margin-top:-5px;" src="https://graph.facebook.com/<?php echo $user; ?>/picture"></a>
                         <ul class="dropdown-menu" aria-labelledby="proFi">
                   				<div class="row" class="col-sm-12" style="margin:10px;" align="center">
                                		<div class="col-xs-10" style="font-size:12px;"> 
													<button class="btn btn-danger btn-xs logout" onClick="window.location.href='<?php echo base_url();?>index.php/site/fbLogout'"><i style="color:#FFFFFF;"  class="glyphicon glyphicon-off"></i> ออกจากระบบ</button>
                                        </div>
                                 </div>
                          </ul>
                     
                     </li>
                   <?php }?>
                 
                       

  <?php if($faLoginStatus=="no"){?>
                    <li class="dropdown" style="margin-top:0px;"><a href="#" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" title="login" <?php echo $resgistersize-2;?>><i style="font-size:2em;color:#000;"  class="glyphicon glyphicon-user"></i><span class="caret"></span></a>
                    <ul class="dropdown-menu col-sm-12" aria-labelledby="dropdownMenu1">
                   			
                                		<div class="col-xs-12" > 
                                         <form>
                                         <div class="row" >
                                       
                                          <span class="input-group-addon glyphicon glyphicon-user" id="basic-addon1" style="top:0px;">E-mail</span>
                                          <input type="text" class="form-control" placeholder="email@email.com" aria-describedby="basic-addon1">
                                 
                                        </div>
                                        <div class="row" >
                                         
                                          <span class="input-group-addon glyphicon glyphicon-lock" id="basic-addon2" style="top:0px;">Password</span>
                                          <input type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon2">
                                 
                                        </div>
                                        <div class="row" align="center">
                                          <button type="submit" class="btn btn-primary">ลงชื่อเข้าใช้</button>
                                            <a href="<?php echo $fbbtUrl;?>"><img src="<?php echo  base_url() ?>img/fblogin.png" width="150"  /></a>
                                         </div>
                                        
                                        </form>
                                        </div>
                             
                          </ul>
                    </li>
                     <?php }?>


                </ul>
               

				<ul class="extra-navbar nav navbar-nav navbar-right" style="margin-left:-10px;">
                
					<li><a href="<?php echo base_url();?>index.php/site" title="<?php echo $homeMenu;?>" <?php echo $homeMenusize?>><i class="glyphicon glyphicon-home"></i> <?php echo $homeMenu;?></a></li>
					<li><a onClick="scool();" href="<?php echo base_url();?>index.php/site/index/th/productContent#portfolio" title="<?php echo $product;?>"<?php echo $productsize?>><i class="glyphicon glyphicon-folder-close"></i> <?php echo $product;?></a></li>
					<li><a href="#" title="<?php echo $contact;?>"<?php echo $contactsize?>><i class="glyphicon glyphicon-envelope"></i> <?php echo $contact;?></a></li>
                    
     <?php if($faLoginStatus=="no"){?>
					 <li><a href="<?php echo base_url();?>index.php/site/index/th/logins#portfolio" class="register"   title="<?php echo $resgister;?>"<?php echo $resgistersize?>><i class="glyphicon glyphicon-check"></i> <?php echo $resgister;?></a></li>
                   
                       <?php }?>
               		
                  
                    
				</ul>
                
                   
			</div>
 	
		</nav>
		<!-- /NAVIGATION -->