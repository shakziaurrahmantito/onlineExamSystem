<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();
	$numberRow 	= $exam->getQuesRow();

?>
<style type="text/css">
	.test {border: 1px solid #f3f3f3;margin: 0 auto;max-width: 630px;padding: 20px;}
	.test h3 {der-bottom: 1px solid #f3f3f3;font-size: 16px;padding-bottom: 10px;margin: 10px 0;}
	.start_again{display: block;text-decoration: none;border: 1px solid #E6CACA;padding: 6px;text-align: center;margin-top: 10px;color: black;background: #fbf6f6;margin-top: 15px;}
</style>

<div class="main">
<h1>All Question & Ans: <?php echo $numberRow; ?></h1>
	<div class="test">
		<form method="post" action="">
		<table>

		<?php
			$result = $exam->getAllQuestionASC();
			if ($result) {
				while ($value = $result->fetch_assoc()) {
		?> 

			<tr>
				<td colspan="2">
				 <h3>Que <?php echo $value['quesNo']; ?>: <?php echo $value['ques']; ?></h3>
				</td>
			</tr>

		<?php
			$getAnswer = $exam->getMulpulChoiceData($value['quesNo']);
			if ($getAnswer) {
				while ($ansData = $getAnswer->fetch_assoc()) {

		?>
			<tr>
				<td>
				 	<input type="radio"/>
				 	<?php
				 		if ($ansData['rightAns'] == 1) {
				 			echo "<span style='color:blue;'>".$ansData['ans']."<span>";
				 		}else{
				 			echo $ansData['ans'];
				 		}
				 	 ?>
				</td>
			</tr>

	<?php }} ?>	

	<?php }} ?>
		</table>
		<a class="start_again" href="starttest.php">Start Again</a>
</div>
 </div>
<?php include 'inc/footer.php'; ?>