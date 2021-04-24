<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');


	class customer
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();

		}

		public function show_customer($id){
			$query = "SELECT * FROM tbl_customer where id = '$id'";
			$result = $this->db->select($query);
			return $result;

		}

		public function update_customers($data, $id)
		{
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
			
			if($name=="" || $zipcode=="" || $email=="" || $address=="" || $phone ==""){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_customer SET name='$name',zipcode='$zipcode',email='$email',address='$address',phone='$phone' WHERE id ='$id'";
				$result = $this->db->insert($query);
				if($result){
						$alert = "<span class='success' style='color: green;''>Khách hàng Updated thành công</span>";
						return $alert;
				}else{
						$alert = "<span class='error' style='color: red;''>Khách hàng Updated Not thành công</span>";
						return $alert;
				}
				
			}
		}
		
		public function insert_customer($data)
		{
			$Name= mysqli_real_escape_string($this->db->link,$data['Name']);
			$City= mysqli_real_escape_string($this->db->link,$data['City']);
			$Zipcode= mysqli_real_escape_string($this->db->link,$data['Zip-Code']);
			$Email= mysqli_real_escape_string($this->db->link,$data['E-Mail']);
			$Address= mysqli_real_escape_string($this->db->link,$data['Address']);
			$Country= mysqli_real_escape_string($this->db->link,$data['country']);
			$Phone= mysqli_real_escape_string($this->db->link,$data['Phone']);
			$Password= mysqli_real_escape_string($this->db->link,md5($data['Password']));

			if($Name == "" || $City == "" || $Zipcode == "" || $Email == "" || $Address == "" || $Country == "" || $Phone == "" || $Password == ""){
				$alert = "<span class='error' style='color: red;'>Các trường không được rỗng</span>";
				return $alert;
			}else{
				$check_email = "SELECT * FROM tbl_customer where email ='$Email' LIMIT 1";
				$result_check = $this->db->select($check_email);
				if($result_check){
					$alert = "<span class='error' style='color: red;''>Email đã tồn tại.</span>";
					return $alert;
				}else{
					$query = "INSERT INTO tbl_customer(name, address, citty, country, zipcode, phone, email, password ) VALUES('$Name','$Address','$City','$Country','$Zipcode','$Phone','$Email','$Password')";
					$result = $this->db->insert($query);

					if($result){
						$alert = "<span class='success' style='color: green;''>Tạo khách hàng thành công</span>";
						return $alert;
					}else{
						$alert = "<span class='error' style='color: red;'>Tạo khách hàng không thành công</span>";
						return $alert;
					}
				}
			}
		}

		public function login_customer($data)
		{
			@$Email= mysqli_real_escape_string($this->db->link,$data['email']);
			@$Password= mysqli_real_escape_string($this->db->link,md5($data['password']));

			if($Email == "" || $Password == ""){
				$alert = "<p class='error' style='color: red;'>Email và Password không được rỗng</p>";
				return $alert;
			}else{
				$check_login = "SELECT * FROM tbl_customer where email ='$Email' and password='$Password' ";
				$result_check = $this->db->select($check_login);
				if($result_check ){
					$values = $result_check->fetch_assoc();
					Session::set('customer_login', true);
					Session::set('customer_id', $values['Id']);
					Session::set('customer_name', $values['name']);
					header('Location:order.php');
				}else{
					$alert = "<p class='error' style='color: red;''>Email hoặc Password không chính xác.</p>";
					return $alert;
					}
				}
			}
		}



?>