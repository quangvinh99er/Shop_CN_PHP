<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');


	class product
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();

		}

		public function insert_product($data,$files){
			
			$productName= mysqli_real_escape_string($this->db->link,$data['productName']);
			$brand= mysqli_real_escape_string($this->db->link, $data['brand']);
			$catId= mysqli_real_escape_string($this->db->link, $data['catId']);
			$product_desc= mysqli_real_escape_string($this->db->link, $data['product_desc']);
			$price= mysqli_real_escape_string($this->db->link, $data['price']);
			$type_p= mysqli_real_escape_string($this->db->link, $data['type_p']);
			
			//kiểm tra ảnh và gửi vào foder uploads
			$permited = array('jpg', 'jpeg','png','gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()),0,10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;

			

			if($productName == "" || $brand == "" || $catId == "" || $product_desc == "" || $price == "" || $type_p == "" || $file_name == ""){
				$alert = "<span class='error'>Các trường không được rỗng</span>";
				return $alert;

			}else{
				move_uploaded_file($file_temp, $uploaded_image);
				$query = "INSERT INTO tbl_product(productName, brandId, catId, product_desc, price, type, image ) VALUES('$productName','$brand','$catId','$product_desc','$price','$type_p','$unique_image')";
				$result = $this->db->insert($query);

				if($result){
					$alert = "<span class='success'>Thêm sản phẩm thành công</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Thêm sản phẩm không thành công</span>";
					return $alert;
				}
				
			}
		}

		public function show_product(){
			$query = 
			"SELECT tbl_product.*,tbl_category.catName,tbl_brand.brandName
			FROM tbl_product inner join tbl_category on tbl_product.catId = tbl_category.catId
			inner join tbl_brand on tbl_product.brandId = tbl_brand.brandId
			order by tbl_product.productId desc";
			$result = $this->db->select($query);
			return $result;

		}
		
		public function getbyId($id){
			$query = "SELECT * FROM tbl_product WHERE productId = '$id'";
			$result = $this->db->select($query);
			return $result;

		}


		public function update_product($data,$files,$id){
			
			
			$productName= mysqli_real_escape_string($this->db->link,$data['productName']);
			$brand= mysqli_real_escape_string($this->db->link, $data['brand']);
			$catId= mysqli_real_escape_string($this->db->link, $data['catId']);
			$product_desc= mysqli_real_escape_string($this->db->link, $data['product_desc']);
			$price= mysqli_real_escape_string($this->db->link, $data['price']);
			$type_p= mysqli_real_escape_string($this->db->link, $data['type_p']);
			
			//kiểm tra ảnh và gửi vào foder uploads
			$permited = array('jpg', 'jpeg','png','gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()),0,10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;

			if($productName == "" || $brand == "" || $catId == "" || $product_desc == "" || $price == "" || $type_p == "" ){
				$alert = "<span class='error'>Các trường không được rỗng</span>";
				return $alert;
			}else{
				if(!empty($file_name)){
					if($file_size < 2048){
						$alert = "<span class='success'>Kích thước ảnh phải nhỏ hơn 2MB!</span>";
						return $alert;
					}elseif (in_array($file_ext, $permited) === false) {
						$alert = "<span class='error'> Bạn chỉ có thể tải lên 1 số đuôi sau!-".implode(',', $permited)." </span>";
						return $alert;
					}
					move_uploaded_file($file_temp, $uploaded_image);
					$query = "UPDATE tbl_product SET 
					productName ='$productName',
					brandId ='$brand',
					catId ='$catId',
					type ='$type_p',
					price ='$price',
					image ='$unique_image',
					product_desc ='$product_desc' where
					 productId = '$id'";

				}else{
					$query = "UPDATE tbl_product SET 
					productName ='$productName',
					brandId ='$brand',
					catId ='$catId',
					type ='$type_p',
					price ='$price',					
					product_desc ='$product_desc' where
					 productId = '$id'";

				}
				$result = $this->db->update($query);

				if($result){
					$alert = "<span class='success'>Cập nhật sản phẩm thành công</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Cập nhật sản phẩm không thành công</span>";
					return $alert;
				}
				
			}
		}
		public function del_product($id){
			$query = "DELETE FROM tbl_product WHERE productId = '$id'";
			$result = $this->db->delete($query);
			if($result){
					$alert = "<span class='success'>Xóa sản phẩm thành công</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Xóa sản phẩm không thành công</span>";
					return $alert;
				}

		}

		//KET THUC ADMIN NHE
		public function getproduct_nb(){
			$query = "SELECT * FROM tbl_product WHERE type = '1' LIMIT 4";
			$result = $this->db->select($query);
			return $result;

		}
		public function getproduct_new(){
			$query = "SELECT * FROM tbl_product order by productId desc LIMIT 4";
			$result = $this->db->select($query);
			return $result;

		}

		public function get_details($id){
			$query = 
			"SELECT tbl_product.*,tbl_category.catName,tbl_brand.brandName
			FROM tbl_product inner join tbl_category on tbl_product.catId = tbl_category.catId
			inner join tbl_brand on tbl_product.brandId = tbl_brand.brandId where tbl_product.productId = '$id'";
			$result = $this->db->select($query);
			return $result;

		}
		public function getproductSony()
		{
			$query = "SELECT * FROM tbl_product where brandId ='4' order by productId desc LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
		public function getproductqualcomm()
		{
			$query = "SELECT * FROM tbl_product where brandId ='5' order by productId desc LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
		public function getproductsamsung()
		{
			$query = "SELECT * FROM tbl_product where brandId ='6' order by productId desc LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
		public function getproductmicrosoft()
		{
			$query = "SELECT * FROM tbl_product where brandId ='8' order by productId desc LIMIT 4";
			$result = $this->db->select($query);
			return $result;
		}
		public function insert_slider($date,$files)
		{
			$sliderName = mysqli_real_escape_string($this->db->link, $date['sliderName']);
			$type = mysqli_real_escape_string($this->db->link, $date['type']);
			 //mysqli gọi 2 biến. (catName and link) biến link -> gọi conect db từ file db
			
			// kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited  = array('jpg', 'jpeg', 'png', 'gif');

			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			// $file_current = strtolower(current($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;


			if($sliderName=="" || $type==""){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert; 
			}else{
				if(!empty($file_name)){
					//Nếu người dùng chọn ảnh
					if ($file_size > 2048000) {

		    		 $alert = "<span class='success'>Image Size should be less then 2MB!</span>";
					return $alert;
				    } 
					elseif (in_array($file_ext, $permited) === false) 
					{
				     // echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";	
				    $alert = "<span class='success'>You can upload only:-".implode(', ', $permited)."</span>";
					return $alert;
					}
					move_uploaded_file($file_temp,$uploaded_image);
					
					$query = "INSERT INTO tbl_slider(sliderName,type,slider_image) VALUES('$sliderName','$type','$unique_image') ";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Slider Added Successfully</span>";
						return $alert;
					}else {
						$alert = "<span class='error'>Slider Added NOT Success</span>";
						return $alert;
					}
				}
				
				
			}

		}
		public function show_slider(){
			$query = "SELECT * FROM tbl_slider where type='0' order by sliderId desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_slider_list(){
			$query = "SELECT * FROM tbl_slider order by sliderId desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function del_slider($id)
		{
			$query = "DELETE FROM tbl_slider where sliderId = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Xóa Slide thành công</span>";
				return $alert;
			}else {
				$alert = "<span class='success'>Xóa Slide không thành công</span>";
				return $alert;
			}
		}
		public function update_type_slider($id,$type){

			$type = mysqli_real_escape_string($this->db->link, $type);
			$query = "UPDATE tbl_slider SET type = '1' where sliderId='$id'";
			$result = $this->db->update($query);
			return $result;
		}
		public function getproduct_cxl()
		{
			$query = "SELECT * FROM tbl_product where catId ='4' order by productId desc LIMIT 4";
			$result = $this->db->select($query);
			return $result;
		}
		public function getproduct_cdh()
		{
			$query = "SELECT * FROM tbl_product where catId ='5' order by productId desc LIMIT 4";
			$result = $this->db->select($query);
			return $result;
		}
		public function search_product($key)
		{
			$key = $this->fm->validation($key);
			$query = "SELECT * FROM tbl_product where productName like '%$key%'";
			$result = $this->db->select($query);
			return $result;
		}


	}
?>