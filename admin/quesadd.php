<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/exam.php');
	$exam = new exam();
?>
<style type="text/css">
	.adminpanel{color: #888;margin-top: 50px;width: 435px;margin: auto;margin-top: 25px;}
	input[type='number']{border: 1px solid #ddd;margin-bottom: 10px;padding: 5px;width: 238px;}
</style>
<div class="main">
<h1>Admin Panel : Add question</h1>
	<?php

		if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
			$addQuesMsg = $exam->addQuestion($_POST);
		}

		$getResult = $exam->getQuesRow();
		$getResult = $getResult+1;


	?>
	<?php
		if (isset($addQuesMsg)) {
			echo $addQuesMsg;
		}
	?>
<div class="adminpanel">
	<form action="" method="post">
		<table>
			<tr>
				<td width="30%">Question No</td>
				<td width="10%">:</td>
				<td width="60%"><input type="number" value="<?php if(isset($getResult)){
					echo $getResult;
				} ?>" name="quesNo" placeholder="Enter question number....." required=""></td>
			</tr>

			<tr>
				<td>Question</td>
				<td>:</td>
				<td><input type="text" name="ques" placeholder="Enter question name....." required=""></td>
			</tr>

			<tr>
				<td>Choice One</td>
				<td>:</td>
				<td><input type="text" name="choiceOne" placeholder="Enter choice....." required=""></td>
			</tr>
			<tr>
				<td>Choice Two</td>
				<td>:</td>
				<td><input type="text" name="choiceTwo" placeholder="Enter choice....." required=""></td>
			</tr>
			<tr>
				<td>Choice Three</td>
				<td>:</td>
				<td><input type="text" name="choiceThree" placeholder="Enter choice....." required=""></td>
			</tr>
			<tr>
				<td>Choice Four</td>
				<td>:</td>
				<td><input type="text" name="choiceFour" placeholder="Enter choice....." required=""></td>
			</tr>
			<tr>
				<td>Correct No</td>
				<td>:</td>
				<td><input type="number" name="rightAns" placeholder="Enter correct answer number....." required=""></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="submit" value="Submit"></td>
			</tr>

		</table>
	</form>

	
</div>



	
</div>
<?php include 'inc/footer.php'; ?>