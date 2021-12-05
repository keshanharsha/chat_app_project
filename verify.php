<?php 
	include_once('db/conn.php');

	if (isset($_GET['code'])) {
		$verification_code = mysqli_real_escape_string($conn, $_GET['code']);

		$query = "SELECT * FROM users WHERE activation_code = '$verification_code'";

		$result = mysqli_query($conn, $query);

		if (mysqli_num_rows($result) == 1) {
			$query = "UPDATE users SET active_status = 1, activation_code = NULL WHERE activation_code = '$verification_code' LIMIT 1";

			$result = mysqli_query($conn, $query);

			if (mysqli_affected_rows($conn) == 1) {
				echo 'Email address verified successfully.';
				header('location:index.php');
			} else {
				echo 'Invalid verification code.';
			}
		}
	}




 ?>