<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
<?php 
	if(isset($_GET['oderid']) AND $_GET['orderid'] == 'order'){
        $customer_id = Session::get('customer_id');
        $insertOrder = $ct->insertOrder($customer_id);
        $delCart = $ct->del_all_data_cart();
        header('Location:success.php');
    }
 ?>
 <style type="text/css">
	.success_order {
    text-align: center;

}
    

</style>

<form action="" method="POST">
 <div class="main">
    <div class="success_order">
    	<div class="success_title">
    		<h2 style="color: blue; font-size: 30px;">Đặt hàng thành công</h2>
            <?php
                $customer_id = Session::get('customer_id'); 
                $get_amount = $ct->getAmountPrice($customer_id);
                if ($get_amount) {
                    $amount = 0;
                    while ($result = $get_amount->fetch_assoc()) {
                        $price = $result['price'];
                        $amount += $price;
                    }
                }
             ?>
             <br>
            <p class="success_note" >Tổng giá trị bạn đã mua: <?php 
                $vat = $amount * 0.1;
                $total = $vat + $amount;
                echo "<span class='error' style='color: red;''>$total.VNĐ</span>" ;
             ?></p>
            <p class="success_note">Chúng tôi sẽ liên hệ với bạn sớm nhất có thể, xem chi tiết đặt hàng tại <a href="orderdetails.php">Bấm vào đây</a></p>
            <br>
 		</div>
 	</div>
 	
 </div>
</form>
<?php 
	include 'inc/footer.php';
 ?>