<?php 

    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');


	class Process{

		public  $db;
		public  $fm;
		
		public function __construct(){

			$this->db = new Database();
			$this->fm = new Format();

		}

		public function processData($data){

			$rightAns 	= $this->fm->validation($data['rightAns']);
			$number 	= $this->fm->validation($data['number']);
			$rightAns 	= mysqli_real_escape_string($this->db->link, $rightAns);
			$number 	= mysqli_real_escape_string($this->db->link, $number);
			$next 		= $number+1;

			if (!isset($_SESSION['pocess'])) {
				$_SESSION['pocess'] = 0;
			}

			$total = $this->getTotal();
			$right = $this->rightAns($number);

			if ($right == $rightAns) {
				$_SESSION['pocess']++;
			}

			if ($total == $number) {
				header("location:final.php");
			}else{
				header("location:test.php?q=".$next);
			}


		}




		private function getTotal(){
			$query 	= "SELECT * FROM tbl_ques";
			$data 	= $this->db->select($query);
			if ($data) {
				$getResult 	= $data->num_rows;
				return $getResult;
			}
		}


		private function rightAns($number){
			$query 		= "SELECT * FROM tbl_ans WHERE quesNo ='$number' AND rightAns ='1'";
			$getdata 	= $this->db->select($query)->fetch_assoc();
			$result 	= $getdata['id'];
			return $result;
		}




	}

	
?>