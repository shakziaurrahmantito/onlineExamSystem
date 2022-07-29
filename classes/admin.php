<?php 

    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../helpers/Format.php');


	class admin{

		public  $db;
		public  $fm;
		
		public function __construct(){

			$this->db = new Database();
			$this->fm = new Format();

		}

		public function checkAdminlogin($data){

			$adminUser = $this->fm->validation($data['adminUser']);
			$adminPass = $this->fm->validation($data['adminPass']);
			$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
			$adminPass = mysqli_real_escape_string($this->db->link, md5($adminPass));

			$query = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser' AND adminPass = '$adminPass'";
			$getResult = $this->db->select($query);
			if ($getResult == true) {
				$value = $getResult->fetch_assoc();
				Session::init();
				Session::set("adminlogin",true);
				Session::set("adminUser",$value['adminUser']);
				Session::set("adminPass",$value['adminPass']);
				Session::set("adminId",$value['adminId']);
				header("location:index.php");
			}else if(empty($adminUser) OR empty($data['adminPass'])){
				return "<span class='error' style='text-align:center;font-style:italic;margin-top:10px;'>Your field is empty!</span>";
				exit();
			}else{
				return "<span class='error'>Username and password no match!</span>";
				exit();
			}

			

		}


	}
?>