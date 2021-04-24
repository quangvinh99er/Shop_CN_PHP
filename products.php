<?php 
	include 'inc/header.php';
	include 'inc/slider.php';
 ?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Chíp xử lý</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php
	      		$product_cxl = $product->getproduct_cxl();
	      		if($product_cxl){
	      			while ($result= $product_cxl->fetch_assoc()) {

	      	?>
				<div class="grid_1_of_4 images_1_of_4" >
					 <a href="detail.php"><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
					 <h2><?php echo $result['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'], 50) ?></p>
					 <p><span class="price"><?php echo $fm->format_currency($result['price'])." "."VNĐ" ?></span></p>
				     <div class="button"><span><a href="detail.php?proid=<?php echo $result['productId'] ?>" class="details">Details</a></span></div>
				</div>
			<?php
				}
			}
			?>
				
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>Card đồ họa</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			<?php
	      		$product_cdh = $product->getproduct_cdh();
	      		if($product_cdh){
	      			while ($result_new= $product_cdh->fetch_assoc()) {

	      	?>
				<div class="grid_1_of_4 images_1_of_4" >
					 <a href="detail.php"><img src="admin/uploads/<?php echo $result_new['image'] ?>" alt="" /></a>
					 <h2><?php echo $result_new['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result_new['product_desc'], 50) ?></p>
					 <p><span class="price"><?php echo $fm->format_currency($result_new['price'])." "."VNĐ" ?></span></p>
				     <div class="button"><span><a href="detail.php?proid=<?php echo $result_new['productId'] ?>" class="details">Details</a></span></div>
				</div>
			<?php
				}
			}
			?>
				
			</div>
    </div>
 </div>
<?php 
	include 'inc/footer.php';
 ?>

