<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/exam.php');
	$exam = new exam();
?>
<div class="main">
	<h1>Admin Panel- User Question List</h1>
	<?php

		if (isset($_GET['queNo'])) {
			$queNo = (int)$_GET['queNo'];
			$quesMsg = $exam->deleteQue($queNo);
		}

		if (isset($quesMsg)) {
			echo $quesMsg;
		}

	?>
	<div>
		<table class="tblone">
			<tr>
				<th width="15%">No</th>
				<th width="60%">Question</th>
				<th width="20%">Action</th>
			</tr>
			<?php

				$getQuestionData = $exam->getAllQuestion();

				if ($getQuestionData) {
					$i = 1;
					while ($questionValue = $getQuestionData->fetch_assoc()) {
			?>

				<tr>
					<td style="text-align: center;"><?php echo $i++; ?></td>
					<td><?php echo $questionValue['ques']; ?></td>
					<td style="text-align: center;">
						<a style="text-decoration: none;" onclick="return confirm('Are you sure Remove')" href="?queNo=<?php echo $questionValue['quesNo']; ?>">Remove</a>
					</td>
				</tr>


			<?php
					}
				}else{

			?>
				<tr>
					<td style="font-size: 18px;text-align: center;padding: 15px;" colspan="4">There is no data..Please <a href="quesadd.php">add question</a></td>
				</tr>
			<?php
				}

			?>
			

		</table>
	</div>



	
</div>
<?php include 'inc/footer.php'; ?>