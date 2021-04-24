<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');


	class category
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();

		}

		public function insert_category($catName){
			$catName = $this->fm->validation($catName);
			
			$catName= mysqli_real_escape_string($this->db->link, $catName);
			

			if(empty($catName)){
				$alert = "<span class='error'>Nhập tên danh mục sản phẩm</span>";
				return $alert;

			}else{
				$query = "INSERT INTO tbl_category(catName) VALUES('$catName')";
				$result = $this->db->insert($query);

				if($result){
					$alert = "<span class='success'>Thêm danh mục sản phẩm thành công</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Thêm danh mục sản phẩm không thành công</span>";
					return $alert;
				}
				
			}
		}

		public function show_category(){
			$query = "SELECT * FROM tbl_category ORDER BY catId DESC";
			$result = $this->db->select($query);
			return $result;

		}
		public function getcatbyId($id){
			$query = "SELECT * FROM tbl_category WHERE catId = '$id'";
			$result = $this->db->select($query);
			return $result;

		}


		public function update_category($catName,$id){
			$catName = $this->fm->validation($catName);
			
			$catName= mysqli_real_escape_string($this->db->link, $catName);
			$id= mysqli_real_escape_string($this->db->link, $id);

			if(empty($catName)){
				$alert = "<span class='error'>Nhập tên danh mục sản phẩm</span>";
				return $alert;

			}else{
				$query = "UPDATE tbl_category SET catName ='$catName' where catId = '$id'";
				$result = $this->db->update($query);

				if($result){
					$alert = "<span class='success'>Cập nhật danh mục sản phẩm thành công</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Cập nhật danh mục sản phẩm không thành công</span>";
					return $alert;
				}
				
			}
		}
		public function del_category($id){
			$query = "DELETE FROM tbl_category WHERE catId = '$id'";
			$result = $this->db->delete($query);
			if($result){
					$alert = "<span class='success'>Xóa danh mục sản phẩm thành công</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Xóa danh mục sản phẩm không thành công</span>";
					return $alert;
				}

		}
		public function getproductbycat($id){
			$query = "SELECT * FROM tbl_product WHERE catId = '$id' order by catId desc LIMIT 8";
			$result = $this->db->select($query);
			return $result;

		}
		public function getnamebycat($id){
			$query = "SELECT tbl_product.*, tbl_category.catName, tbl_category.catId FROM tbl_product, tbl_category WHERE tbl_product.catId = tbl_category.catId and tbl_product.catId = '$id' limit 1 ";
			$result = $this->db->select($query);
			return $result;

		}


	}
?>