
<?php
$sum = 0;
 foreach($type as $t){
	 $sum = $sum+$t['sum'];
	  }  foreach($type as $t){?>
<li><a href="#" data-filter=".<?php echo $t['typeId'];?>"><?php echo $t['typeName'];?> <sup><small>.<?php echo $t['sum']; ?></small></sup></a></li>

<li><a href="#" data-filter="*" class="current">All <sup><small><?php echo $sum;?></small></sup></a></li>
<?php }?>