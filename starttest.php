<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();
	$question = $exam->getQuestion();
	$numberRow = $exam->getQuesRow();
?>
<div class="main">
<h1>Welcome to Online Exam</h1>

<div class="main_text">
	<h2>Test your knowledge</h2>
	<p>This is multiple choice quiz to test your knowledge</p>
	<ul>
		<li><strong>Number of Question:</strong> <?php echo $numberRow; ?></li>
		<li><strong>Question Type:</strong> Multiple Choice</li>
	</ul>
	<a href="test.php?q=<?php echo $question['quesNo'] ?>">Start Test</a>
</div>
	
  </div>
<?php include 'inc/footer.php'; ?>