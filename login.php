<?php
	include 'inc\header.php';
	
?>

<?php
	$login_check = Session::get('customer_login');
	if($login_check){
		header('Location:order.php');
	}

?>

<?php
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
       
        
        $insertCustomer = $cs->insert_customer($_POST);


    }
?>

<?php
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
       
        
        $loginCustomer = $cs->login_customer($_POST);


    }
?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Đăng nhập</h3>
        	<p>Khách hàng đăng nhập với thông tin sau</p>
        	<?php
    		if(isset($loginCustomer)){
    			echo $loginCustomer;
    		}

    		?>
        	<form action="" method="POST" >
                	<input  type="text" name="email" class="field" placeholder="Enter E-Mail..." >
                    <input type="password" name="password" class="field" placeholder="Enter Password..." >
                
                
                    <div class="buttons"><div><input type="submit" name="login" value="Đăng nhập" style= "height: 30px;background: #3C5E74; "></div></div>
                     </form>
                    </div>
    	<div class="register_account">

    		<h3>Đăng kí tài khoản mới</h3>
    		<?php
    		if(isset($insertCustomer)){
    			echo $insertCustomer;
    		}

    		?>
    		<form action="" method="POST" >
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="Name"  placeholder="Enter Name...">
							</div>
							
							<div>
							   <input type="text" name="City"  placeholder="Enter City...">
							</div>
							
							<div>
								<input type="text" name="Zip-Code"  placeholder="Enter Zip-Code..." >
							</div>
							<div>
								<input type="text" name="E-Mail"  placeholder="Enter E-Mail..." >
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="Address"  placeholder="Enter Address...">
						</div>
		    		<div>
						<select id="country" name="country" >
							<option value="">Select a Country</option>         
							<option value="TPHCM">Miền Nam</option>
							<option value="HN">Miền Bác</option>
							<option value="TTH">Miền Trung</option>
						
							

		         </select>
				 </div>		        
	
		           <div>
		          <input type="text" name="Phone"  placeholder="Enter Phone..." >
		          </div>
				  
				  <div>
					<input type="text" name="Password" style="-webkit-text-security: disc;"  placeholder="Enter Password...">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div ><div><input type="submit" name="submit" value="Tạo tài khoản" style="margin-top: 5px; height: 30px; background: #95B2B3;"></div></div>
		   
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 
<?php
	include 'inc\footer.php';
?>