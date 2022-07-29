<?php 

    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');


	class exam{

		public  $db;
		public  $fm;
		
		public function __construct(){

			$this->db = new Database();
			$this->fm = new Format();

		}

		public function durramy($data){

			$adminUser = $this->fm->validation($data['adminUser']);
			$adminPass = $this->fm->validation($data['adminPass']);
			$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
			$adminPass = mysqli_real_escape_string($this->db->link, md5($adminPass));

		}

		public function addQuestion($data){
			$quesNo = mysqli_real_escape_string($this->db->link, $data['quesNo']);
			$ques 	= mysqli_real_escape_string($this->db->link, $data['ques']);

			$ans 	= array();
			$ans[1] = $data['choiceOne'];
			$ans[2] = $data['choiceTwo'];
			$ans[3] = $data['choiceThree'];
			$ans[4] = $data['choiceFour'];

			$rightAns = $data['rightAns'];

			$query		= "INSERT INTO tbl_ques(quesNo, ques) VALUES('$quesNo','$ques')";
			$rowInsert 	= $this->db->insert($query);

			if ($rowInsert) {

				foreach ($ans as $key => $ans_name) {

					if ($ans_name != "") {

						if ($rightAns == $key) {
							$rquery	= "INSERT INTO tbl_ans(quesNo, rightAns, ans) VALUES('$quesNo',1, '$ans_name')";
						}else{
							$rquery	= "INSERT INTO tbl_ans(quesNo, rightAns, ans) VALUES('$quesNo',0, '$ans_name')";
						}

						$inserRow = $this->db->insert($rquery);

						if ($inserRow) {
							continue;
						}else{
							die("Error...");
						}

					}

				}

				$msg = "<span class='success'>Question Added Succssfully</span>";
				return $msg;
			}

		}

		public function getAllQuestion(){
			$query 		= "SELECT * FROM tbl_ques ORDER BY id DESC";
			$getResult 	= $this->db->select($query);
			return $getResult;
		}

		public function getAllQuestionASC(){
			$query 		= "SELECT * FROM tbl_ques ORDER BY id ASC";
			$getResult 	= $this->db->select($query);
			return $getResult;
		}


		public function deleteQue($queNO){

			$tables = array("tbl_ques", "tbl_ans");

			foreach ($tables as $table) {
				$query 		= "DELETE FROM $table WHERE quesNo = '$queNO'";
				$getResult 	= $this->db->delete($query);
			}

			if ($getResult) {
				$msg = "<span  class='success'>"."Question Deleted Succssfully"."</span>";
				return $msg;
			}else{
				$msg = "<span  class='error'>"."Question Delete is not Succssfully"."</span>";
				return $msg;
			}

		}


		public function getQuesRow(){
			$query 		= "SELECT * FROM tbl_ques;";
			$data 		= $this->db->select($query);
			if ($data) {
				$getResult 	= $data->num_rows;
				return $getResult;
			}
		}

		public function getQuestion(){
			$query 		= "SELECT * FROM tbl_ques ORDER BY quesNo ASC";
			$data 		= $this->db->select($query);
			$result 	= $data->fetch_assoc();
			return $result;
		}

		public function getQuestionData($qNumber){
			$query 		= "SELECT * FROM tbl_ques WHERE quesNo ='$qNumber'";
			$data 		= $this->db->select($query);
			$result 	= $data->fetch_assoc();
			return $result;
		}

		public function getMulpulChoiceData($qNumber){
			$query 		= "SELECT * FROM tbl_ans WHERE quesNo ='$qNumber'";
			$result 		= $this->db->select($query);
			return $result;
		}

		

	}

?>