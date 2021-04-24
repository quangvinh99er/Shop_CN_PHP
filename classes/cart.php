<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');


	class cart
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();

		}

		public function add_to_cart($quantity,$id)
		{
			$quantity = $this->fm->validation($quantity);
			$quantity= mysqli_real_escape_string($this->db->link,$quantity);
			$id= mysqli_real_escape_string($this->db->link, $id);
			$sId = session_id();
			$query = "SELECT * FROM tbl_product where productId = '$id'";
			$result = $this->db->select($query)->fetch_assoc();

			$image = $result["image"];
			$price = $result["price"];
			$productName = $result["productName"];

			$query_insert = "INSERT INTO tbl_cart(productId, quantity, sId, image, price, productName ) VALUES('$id','$quantity','$sId','$image','$price','$productName')";
			$insert_cart = $this->db->insert($query_insert);

			if($insert_cart){
				header('Location:cart.php');
			}else{
				header('Location:404.php');
			}
		}
		

		public function get_product_cart()
		{
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart where sId = '$sId'";
			$result = $this->db->select($query);
			return $result;


		} 
		public function Update_Cart($quantity,$cartId)
		{
			$quantity= mysqli_real_escape_string($this->db->link,$quantity);
			$cartId= mysqli_real_escape_string($this->db->link, $cartId);
			$query = "UPDATE tbl_cart SET 
					quantity ='$quantity' where
					 cartId = '$cartId'";
			$result = $this->db->update($query);
			if($result){
				$msg = "<span style='color:green; font-size:18px'>Cập nhật số lượng sản phẩm thành công</span>";
				return $msg;
			}else{
				$msg = "<span style='color:red; font-size:18px'>Cập nhật số lượng sản phẩm thất bại</span>";
				return $msg;
			}
		}
		public function del_cart($cartid)
		{
			$cartid= mysqli_real_escape_string($this->db->link, $cartid);
			$query = "DELETE FROM tbl_cart where cartId = '$cartid'";
			$result = $this->db->delete($query);
			if($result){
				header("Location:cart.php");
			}else{
				$msg = "<span style='color:red; font-size:18px'>Xóa sản phẩm thất bại</span>";
				return $msg;
			}
		}
		public function check_cart()
		{
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart where sId = '$sId'";
			$result = $this->db->select($query);
			return $result;
		}
		public function del_all_cart()
		{
			$sId = session_id();
			$query = "DELETE  FROM tbl_cart where sId = '$sId'";
			$result = $this->db->select($query);
			return $result;
		}
		public function insertOrder($customer_id)
		{
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
			$get_product = $this->db->select($query);
			if($get_product){
				while($result = $get_product->fetch_assoc()){
					$productid = $result['productId'];
					$productName = $result['productName'];
					$quantity = $result['quantity'];
					$price = $result['price'] * $quantity;
					$image = $result['image'];
					$customer_id = $customer_id;
					$query_order = "INSERT INTO tbl_order(productId,productName,quantity,price,image,customer_id) VALUES('$productid','$productName','$quantity','$price','$image','$customer_id')";
					$insert_order = $this->db->insert($query_order);
				}
			}
		}
		public function del_all_data_cart()
		{
			$sId = session_id();
			$query = "DELETE FROM tbl_cart WHERE sId = '$sId' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function getAmountPrice($customer_id)
		{
			$query = "SELECT price FROM tbl_order WHERE customer_id = '$customer_id' ";
			$get_price = $this->db->select($query);
			return $get_price;
		}
		public function get_cart_ordered($customer_id)
		{
			$query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id' ";
			$get_cart_ordered = $this->db->select($query);
			return $get_cart_ordered;
		}
		public function get_inbox_cart()
		{
			$query = "SELECT * FROM tbl_order ";
			$get_inbox_cart = $this->db->select($query);
			return $get_inbox_cart;
		}
		public function shifted($id,$time,$price)
		{
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);

			$query = "UPDATE tbl_order SET status='1' WHERE id='$id' and date_order='$time' and price = '$price'";
					 
			$result = $this->db->update($query);
			if($result){
				$msg = "<span style='color:green; font-size:18px'>Cập nhật đơn hàng thành công</span>";
				return $msg;
			}else{
				$msg = "<span style='color:red; font-size:18px'>Cập nhật đơn hàng không thành công</span>";
				return $msg;
			}
		}

		public function del_shifted($id,$time,$price)
		{
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);
			$query = "DELETE FROM tbl_order 
					  WHERE id = '$id' AND date_order = '$time' AND price = '$price' ";

			$result = $this->db->update($query);
			if ($result) {
				$msg = "<span class='success'>Xóa đơn hàng thành công</span> ";
				return $msg;
			}else {
				$msg = "<span class='erorr'> Xoá đơn hàng không thành công</span> ";
				return $msg;
			}
		}
		public function shifted_confirm($id,$time,$price)
		{
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);
			$query = "UPDATE tbl_order SET

			status = '2'

			WHERE customer_id = '$id' AND date_order = '$time' AND price = '$price' ";

			$result = $this->db->update($query);
			return $result;
		} 

	}
?>