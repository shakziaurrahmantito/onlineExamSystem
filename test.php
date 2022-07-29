<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();

	if (isset($_GET['q'])) {
		$qNumber = (int)$_GET['q'];
	}else{
		header("location:exam.php");
	}

	$numberRow 	= $exam->getQuesRow();
	$question 	= $exam->getQuestionData($qNumber);
?>
<?php
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$pro->processData($_POST);
	}

?>
<div class="main">
<h1>Question <?php echo $question['quesNo']; ?> of <?php echo $numberRow;?></h1>
	<div class="test">
		<form method="post" action="">
		<table> 
			<tr>
				<td colspan="2">
				 <h3>Que <?php echo $question['quesNo']; ?>: <?php echo $question['ques']; ?></h3>
				</td>
			</tr>
		<?php
			$getResult = $exam->getMulpulChoiceData($qNumber);
			if ($getResult) {
				while ($value = $getResult->fetch_assoc()) {
		?>
			<tr>
				<td>
				 <input type="radio" name="rightAns" value="<?php echo $value['id']; ?>" /><?php echo $value['ans']; ?>
				</td>
			</tr>
		<?php }} ?>

			<tr>
			  <td>
				<input type="submit" name="submit" value="Next Question"/>
				<input type="hidden" name="number" value="<?php echo $qNumber; ?>" />
			</td>
			</tr>
			
		</table>
</div>
 </div>
<?php include 'inc/footer.php'; ?>