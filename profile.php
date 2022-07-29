<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();
	$userId = Session::get("userId");
?>
<style type="text/css">
	.segment{width: 420px; margin: 0 auto;float: none;min-height: 180px;}
</style>
<div class="main">
<h1>Your Profile</h1>

<?php
		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$userUpdateMsg 	= $User->userDataUpdate($userId,$_POST);

			if (isset($userUpdateMsg)) {
				echo "<p style='text-align:center;padding: 10px 0;'>".$userUpdateMsg."</p>";
			}

	}
?>

	<div class="segment">
		<form action="" method="post">
			<?php

				$getResult = $User->getUserData($userId);
				if ($getResult) {
					$value = $getResult->fetch_assoc();
					
			?>
			<table class="tbl">    
				 <tr>
				   <td width="30%">Name</td>
				   <td width="20%">:</td>
				   <td width="50%"><input name="name" type="text" value="<?php echo $value['name']; ?>" id="name"></td>
				 </tr>
				 <tr>
				   <td>Username</td>
				   <td>:</td>
				   <td><input name="username" type="text" value="<?php echo $value['username']; ?>" id="username"></td>
				 </tr>
				 <tr>
				   <td>Email </td>
				   <td>:</td>
				   <td><input name="email"  type="text" value="<?php echo $value['email']; ?>" id="email"></td>
				 </tr>
				 
				  <tr>
					  <td></td>
					  <td></td>
					   <td>
					   		<input type="submit" id="update" value="Update">
					   </td>
				 </tr>
	       </table>
	   <?php } ?>
	   </form>
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>