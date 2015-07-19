						<!-- DO NOT DELETE THIS DIV -->
						<div class="grid-sizer" id="productList"></div>
                        
                		<?php foreach($product as $p){
							if($p['viewType'] == "normal"){
								$view = "";
							}else{
								$view = $p['viewType'];
							}
							?>
                        <div class="work-item  <?php echo $view;?> <?php echo $p['typeId']?>">
							<a href="<?php echo $p['productId']?>">
								<img src="data:image/png;base64,<?php echo $p['imgBase64']?>" alt="<?php echo $p['productName']?>">
								<div class="work-caption font-alt">
									<h3 class="work-title"><?php echo $p['productName']?></h3>
									<div class="work-descr">
										<?php echo $p['productPrice']?>
									</div>
								</div>
							</a>
						</div>
                        <?php }?>