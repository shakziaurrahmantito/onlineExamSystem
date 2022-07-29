<?php 

    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');


	class User{

		public  $db;
		public  $fm;
		
		public function __construct(){

			$this->db = new Database();
			$this->fm = new Format();

		}

		public function userRegistration($name,$username,$password,$email){

			$name 		= mysqli_real_escape_string($this->db->link, $this->fm->validation($name));
			$username 	= mysqli_real_escape_string($this->db->link, $this->fm->validation($username));
			$password 	= mysqli_real_escape_string($this->db->link, md5($this->fm->validation($password)));
			$email 		= mysqli_real_escape_string($this->db->link, $this->fm->validation($email));

			if ($name == "" || $username == "" || $password == "" || $email == "") {
				echo "<span class='error'>Field is empty.</span>";
				exit();
			}else if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
				echo "<span class='error'>Invalid email address.</span>";
				exit();
			}else{

				$query 		= "SELECT * FROM tbl_user WHERE email = '$email'";
				$getResult 	= $this->db->select($query);
				if ($getResult == true) {
					echo "<span class='error'>Email already exist.</span>";
					exit();
				}else{
					$query 		= "INSERT INTO tbl_user(name, username, password, email) VALUES('$name','$username','$password','$email')";
					$getResult 	= $this->db->insert($query);
					if ($getResult) {
						echo "1";
						exit();
					}else{
						echo "<span class='error'>Error.. is not registration </span>";
						exit();
					}
				}

			}

		}


		public function userLogin($email,$password){

			$email 		= mysqli_real_escape_string($this->db->link, $this->fm->validation($email));
			$password 	= mysqli_real_escape_string($this->db->link, md5($this->fm->validation($password)));

			if ($email == "" || $password == "") {
				echo "empty";
				exit();
			}else{
				$query 		= "SELECT * FROM tbl_user WHERE email = '$email' AND password ='$password'";
				$getResult 	= $this->db->select($query);

				if ($getResult == true) {
					$value = $getResult->fetch_assoc();
					if ($value['status'] == "0") {
						echo "disabled";
						exit();
					}else{
						Session::init();
						Session::set("userlogin",true);
						Session::set("userId",$value['userId']);
						Session::set("name",$value['name']);
						Session::set("username",$value['username']);
						Session::set("email",$value['email']);
					}

				}else{
					echo "error";
					exit();
				}
			}
			

		}


		public function userDataUpdate($userId,$data){

	$name 	 = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['name']));
	$username= mysqli_real_escape_string($this->db->link, $this->fm->validation($data['username']));
	$email 	 = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['email']));

			$query 		= "UPDATE tbl_user SET name = '$name',username = '$username',email = '$email' WHERE userId = '$userId'";
			$getResult 	= $this->db->update($query);
			if ($getResult) {
				$msg = "<span class='success'>"."Data update successfully."."</span>";
				return $msg;
				exit();
			}else{
				$msg = "<span class='error'>"."Data no updated."."</span>";
				return $msg;
				exit();
			}

		}




		public function getAllUserData(){
			$query 		= "SELECT * FROM tbl_user ORDER BY userId DESC";
			$getResult 	= $this->db->select($query);
			return $getResult;
		}

		public function getUserData($userId){
			$query 		= "SELECT * FROM tbl_user WHERE userId = '$userId'";
			$getResult 	= $this->db->select($query);
			return $getResult;
		}

		public function diabledData($disableId){
			$query 		= "UPDATE tbl_user SET status = '0' WHERE userId = '$disableId'";
			$getResult 	= $this->db->update($query);
			if ($getResult) {
				$msg = "<span  class='success'>"."User Disabled"."</span>";
				return $msg;
			}else{
				$msg = "<span  class='error'>"."User Not Disabled"."</span>";
				return $msg;
			}
		}

		public function enableData($enaId){

			$query 		= "UPDATE tbl_user SET status = '1' WHERE userId = '$enaId'";
			$getResult 	= $this->db->update($query);
			if ($getResult) {
				$msg = "<span  class='success'>"."User Enabled"."</span>";
				return $msg;
			}else{
				$msg = "<span  class='error'>"."User Not Enabled"."</span>";
				return $msg;
			}
		}

		public function deleteUserData($delId){
			$query 		= "DELETE FROM tbl_user WHERE userId = '$delId'";
			$getResult 	= $this->db->update($query);
			if ($getResult) {
				$msg = "<span  class='success'>"."User Deleted"."</span>";
				return $msg;
			}else{
				$msg = "<span  class='error'>"."User Not Deleted"."</span>";
				return $msg;
			}
		}


	}
?>