<?php
	include 'inc\header.php';
	
?>
<?php
	 $login_check = Session::get('customer_login');
		if($login_check == false){
			header('Location:login.php');
		}

?>
<?php
	// if(!isset($_GET['proid']) || $_GET['proid'] ==NULL){
 //        echo "<script>window.location = '404.php'</script>";
 //    }else{
 //        $id = $_GET['proid'];
 //    }

 //    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
       
 //        $quantity = $_POST['quantity'];
 //        $AddtoCart = $ct->add_to_cart($quantity,$id);


 //    }

?>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_top">
    		<div class="heading">
    		<h3>Thông tin khách hàng</h3>
    		</div>
    		<div class="clear"></div>
    	</div>

    		<table class="tblone">
    <?php
    $id = Session::get('customer_id');

    $get_customer = $cs->show_customer($id);
    if($get_customer){
	    while ($result_cs= $get_customer->fetch_assoc()) {

    ?>
      <tr>
        <td>Name</td>
        
        <td><?php echo $result_cs['name'] ?></td>
      </tr>

      <tr>
        <td>City</td>
        
        <td><?php echo $result_cs['citty'] ?></td>
      </tr>

      <tr>
        <td>Phone</td>
        
        <td><?php echo $result_cs['phone'] ?></td>
      </tr>

      <!-- <tr>
        <td>Country</td>
        
        <td><?php echo $result_cs['country'] ?></td>
      </tr> -->

      <tr>
        <td>Zipcode</td>
        
        <td><?php echo $result_cs['zipcode'] ?></td>
      </tr>

      <tr>
        <td>Email</td>
        
        <td><?php echo $result_cs['email'] ?></td>
      </tr>

      <tr>
        <td>Address</td>
        
        <td><?php echo $result_cs['address'] ?></td>
      </tr>
      <tr>
        <td colspan="3"><a href="editprofile.php">Update profile</a></td>
               
      </tr>
     
      <?php
	}
		}

      ?>
  </table>
 		</div>
 	</div>
	
<?php
	include 'inc\footer.php';
?>