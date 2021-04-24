<?php
	include 'inc\header.php';
	
?>
<?php
    $cat = new category();
    if(!isset($_GET['catid']) || $_GET['catid'] ==NULL){
        echo "<script>window.location = '404.php'</script>";
    }else{
        $id = $_GET['catid'];
    }
   /* if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $catName = $_POST['catName'];
        
        $updateCat = $cat->update_category($catName,$id);


    }*/
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<?php
	      		$getnamebycat = $cat->getnamebycat($id);
	      		if($getnamebycat){
	      			while ($result_name = $getnamebycat->fetch_assoc()) {
	      			
	      	?>

    		<div class="heading">
    		<h3>Category:<?php echo $result_name['catName']?> </h3>
    		</div>

    			<?php
					}
				}else{
					
					echo 'Sản phẩm chưa được cập nhât!!!';
					
				}
				?>

    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php
	      		$productbycat = $cat->getproductbycat($id);
	      		if($productbycat){
	      			while ($result = $productbycat->fetch_assoc()) {
	      			
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.php"><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
					 <h2><?php echo $result['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'], 50) ?></p>
					 <p><span class="price"><?php echo $fm->format_currency($result['price'])." "."VNĐ" ?></span></p>
				     <div class="button"><span><a href="detail.php?proid= <?php echo $result['productId'] ?> " class="details">Details</a></span></div>
				</div>
				<?php
					}
				}
				?>
			</div>

	
	
    </div>
 </div>

<?php
	include 'inc\footer.php';
?>