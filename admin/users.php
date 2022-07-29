<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/User.php');
	$User = new User();
?>
<div class="main">
	<h1>Admin Panel- User Manage</h1>

	<?php

		if (isset($_GET['dis'])) {
			$disableId = (int)$_GET['dis'];
			$getDisMsg = $User->diabledData($disableId);
		}

		if (isset($_GET['ena'])) {
			$enaId 		= (int)$_GET['ena'];
			$getEnaMsg	= $User->enableData($enaId);
		}

		if (isset($_GET['del'])) {
			$delId 		= (int)$_GET['del'];
			$delMsg	= $User->deleteUserData($delId);
		}
	?>

	<p><?php

		if (isset($getDisMsg)) {
			echo $getDisMsg;
		}

		if (isset($getEnaMsg)) {
			echo $getEnaMsg;
		}

		if (isset($delMsg)) {
			echo $delMsg;
		}

	?></p>

	<div>
		<table class="tblone">
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Username</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
			<?php

				$getUserData = $User->getAllUserData();

				if ($getUserData) {
					$i = 1;
					while ($value = $getUserData->fetch_assoc()) {
			?>

			<?php if ($value['status'] == "0") { ?>

				<tr style="color: red;">
					<td><?php echo $i++; ?></td>
					<td><?php echo $value['name']; ?></td>
					<td><?php echo $value['username']; ?></td>
					<td><?php echo $value['email']; ?></td>
					<td>
						<a onclick="return confirm('Are you sure Enable')" href="?ena=<?php echo $value['userId']; ?>">Enable</a>
						|| 
						<a onclick="return confirm('Are you sure Remove')" href="?del=<?php echo $value['userId']; ?>">Remove</a>

					</td>
				</tr>

			<?php }else{ ?>

				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $value['name']; ?></td>
					<td><?php echo $value['username']; ?></td>
					<td><?php echo $value['email']; ?></td>
					<td>
						<a onclick="return confirm('Are you sure Disable')" href="?dis=<?php echo $value['userId']; ?>">Disable</a>
						 ||
						<a onclick="return confirm('Are you sure Remove')" href="?del=<?php echo $value['userId']; ?>">Remove</a>
					</td>
				</tr>

			<?php } ?>



			<?php
					}
				}

			?>
			

		</table>
	</div>



	
</div>
<?php include 'inc/footer.php'; ?>