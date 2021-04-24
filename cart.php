<?php
	include 'inc\header.php';

	
?>
<?php


if(isset($_GET['cartid'])){
        $cartid = $_GET['cartid'];
        $delcart = $ct->del_cart($cartid);

    }

 if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
       	$cartId = $_POST['cartId'];
        $quantity = $_POST['quantity'];
        $Update_Cart = $ct->Update_Cart($quantity,$cartId);


    }


?>
<?php
	if(!isset($_GET['id'])){
		echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
	}

?>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Giỏ hàng</h2>

			    	<?php
			    	if(isset($Update_Cart)){
			    		echo $Update_Cart;
			    	}

			    	?>
			    	<?php
			    	if(isset($delcart)){
			    		echo $delcart;
			    	}
			    	?>
						<table class="tblone">
							<tr>
								<th width="20%">Tên sản phẩm</th>
								<th width="10%">Hình ảnh</th>
								<th width="15%">Đơn giá</th>
								<th width="25%">Số lượng</th>
								<th width="20%">Tổng giá</th>
								<th width="10%">Thao tác</th>
							</tr>
							<?php
								$get_product_cart = $ct->get_product_cart();
								if($get_product_cart){
									$tongtien = 0;
									while ($result = $get_product_cart->fetch_assoc()) {
								
							?>
							
							
							<tr>
								<td><?php echo $result['productName'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo $fm->format_currency($result['price'])." "."VNĐ" ?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartId" value="<?php echo $result['cartId'] ?>"/>
										<input type="number" name="quantity" value="<?php echo $result['quantity'] ?>" min="1"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td><?php $Tong = ($result['price'])*($result['quantity']);
								echo $fm->format_currency($Tong)." "."VNĐ";

								 ?> </td>
								<td><a href="?cartid=<?php echo $result['cartId'] ?>">Xóa</a></td>
							</tr>

							<?php
							$tongtien += $Tong; 
						}
							
							}else{
								echo "<span style='color:red; font-size:18px'>Giỏ hàng rỗng</span>";
}
							?>
							
						</table>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Tổng tiền : </th>
								<td><?PHP
									echo $fm->format_currency(@$tongtien)." "."VNĐ";

								?></td>
							</tr>
							<tr>
								<th>Thuế : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Tổng thanh toán :</th>
								<td><?php
								$TT = @$tongtien +(@$tongtien*0.1);

								echo $fm->format_currency($TT)." "."VNĐ";

								Session::set('sum',$TT);
								?></td>
							</tr>
					   </table>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php
	include 'inc\footer.php';
?>
