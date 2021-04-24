	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php
				$getproductSony = $product->getproductSony();
				if($getproductSony){
					while ($result_sony = $getproductSony->fetch_assoc()) {
					
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="detail.php?proid=<?php echo $result_sony['productId'] ?>"> <img src="admin/uploads/<?php echo $result_sony['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Samsung</h2>
						<p><?php echo $fm->textShorten($result_sony['product_desc'], 30) ?></p>
						<div class="button"><span><a href="detail.php?proid=<?php echo $result_sony['productId'] ?>">Add to cart</a></span></div>
				   </div>
			   </div>
			   <?php
			}
		}
			   ?>	

			   <?php
				$getproductqualcomm = $product->getproductqualcomm();
				if($getproductqualcomm){
					while ($result_qualcomm = $getproductqualcomm->fetch_assoc()) {
					
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="detail.php?proid=<?php echo $result_qualcomm['productId'] ?>"><img src="admin/uploads/<?php echo $result_qualcomm['image'] ?>" alt="" / ></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Qualcomm</h2>
						  <p><?php
						  echo $fm->textShorten($result_qualcomm['product_desc'], 30)
						  ?></p>
						  <div class="button"><span><a href="detail.php?proid=<?php echo $result_qualcomm['productId'] ?>">Add to cart</a></span></div>
					</div>
				</div>
				<?php
			}
		}
				?>

			</div>

			<div class="section group">

				<?php
				$getproductsamsung = $product->getproductsamsung();
				if($getproductsamsung){
					while ($result_samsung = $getproductsamsung->fetch_assoc()) {
					
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="detail.php?proid=<?php echo $result_samsung['productId'] ?>"><img src="admin/uploads/<?php echo $result_samsung['image'] ?>" alt="" / ></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Microsoft</h2>
						  <p><?php
						  echo $fm->textShorten($result_samsung['product_desc'], 30)
						  ?></p>
						  <div class="button"><span><a href="detail.php?proid=<?php echo $result_samsung['productId'] ?>">Add to cart</a></span></div>
					</div>
				</div>

			   <?php
			}
		}
			   ?>		

			   <?php
				$getproductmicrosoft = $product->getproductmicrosoft();
				if($getproductmicrosoft){
					while ($result_microsoft = $getproductmicrosoft->fetch_assoc()) {
					
				?>
					<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="detail.php?proid=<?php echo $result_microsoft['productId'] ?>"><img src="admin/uploads/<?php echo $result_microsoft['image'] ?>" alt="" / ></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Intel</h2>
						  <p><?php
						  echo $fm->textShorten($result_microsoft['product_desc'], 30)
						  ?></p>
						  <div class="button"><span><a href="detail.php?proid=<?php echo $result_microsoft['productId'] ?>">Add to cart</a></span></div>
					</div>
				</div>
				<?php
			}
		}

					?>

			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<?php 
						$get_slider = $product->show_slider();
						if ($get_slider) {
							while ($result_slider = $get_slider->fetch_assoc()) {
								# code...
							
						 ?>
						 
						<li>
							<img src="admin/uploads/<?php echo $result_slider['slider_Image'] ?>" alt=""/></li>
						<?php 
						}
						}
						 ?>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>