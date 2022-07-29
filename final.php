<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();
?>
<div class="main">
<h1>You are done !</h1>

<div class="main_text">
	<p>Congrats ! You have just completed the test.</p>
	<p>Final Score:
		<?php
			if (isset($_SESSION['pocess'])) {
				echo $_SESSION['pocess'];
				unset($_SESSION['pocess']);
			}
		?>
	</p>
	<a href="viewanswer.php">Show Answer</a>
	<a href="starttest.php">Start Again</a>
</div>
	
  </div>
<?php include 'inc/footer.php'; ?>