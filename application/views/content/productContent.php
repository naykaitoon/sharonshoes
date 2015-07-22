				<!-- FILTER -->
				<div class="row">

					<div class="col-sm-12">
						<ul id="filters" class="filters font-alt">
                          <li><a href="#" data-filter="*" class="current" id="all">All <sup><small><?php echo $sumAll;?></small></sup></a></li>
							  <?php  foreach($types as $t){?>
						 

						<li><a href="#" data-filter=".<?php echo $t['typeName'];?>"><?php echo $t['typeName'];?> <sup><small>.<?php echo $t['sum'];?></small></sup></a></li>
						
						<?php }?>
						</ul>
					</div>

				</div>
				<!-- /FILTER -->

				<!-- WORKS GRID -->
				<div class="row">

					<div id="works-grid" class="works-grid works-hover-w">
        
        				<!-- DO NOT DELETE THIS DIV -->
						<div class="grid-sizer"></div>

					<?php foreach($products as $p){
							if($p['viewType'] == "normal"){
								$view = "";
							}else{
								$view = $p['viewType'];
							}
							?>
                        <div class="work-item  <?php echo $view;?> <?php echo $p['typeName'];?>">
							<a href="<?php echo base_url();?>index.php/site/getDetialProduct/<?php echo $p['productId']?>" class="showView" data-toggle="modal" data-target="#detial">
								<img src="data:image/png;base64,<?php echo $p['imgBase64']?>" alt="<?php echo $p['productName']?>">
								<div class="work-caption font-alt">
									<h3 class="work-title"><?php echo $p['productName']?></h3>
									<div class="work-descr">
										<h2><?php echo $p['productPrice']?></h2>
									</div>
								</div>
							</a>
						</div>
                        <?php }?>
						<!-- /PORTFOLIO ITEM -->

					</div>