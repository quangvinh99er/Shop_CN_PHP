<?php
	include 'inc\header.php';
	include 'inc\slider.php';
	
?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Microsoft</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php
	      		$product_crs = $product->getproductmicrosoft();
	      		if($product_crs){
	      			while ($result= $product_crs->fetch_assoc()) {

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
    		<h3>Samsung</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
	      	<?php
	      		$product_ss = $product->getproductsamsung();
	      		if($product_ss){
	      			while ($result= $product_ss->fetch_assoc()) {

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
    		<h3>Qualcomm</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
	      	<?php
	      		$product_qc = $product->getproductqualcomm();
	      		if($product_qc){
	      			while ($result= $product_qc->fetch_assoc()) {

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
 </div>

<?php
	include 'inc\footer.php';
?>