<html>

<head>
	<title>Change password</title>
</head>

<body>

	<?php
	$success = false;

	if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["newpass"])) {
		require("../db.php");
		$user = mysqli_real_escape_string($db, $_POST["username"]);
		$pass = mysqli_real_escape_string($db, $_POST["password"]);
		$query = "SELECT COUNT(*) FROM users WHERE USERNAME='$user' AND PASSWORD='$pass'";
		$result = mysqli_query($db, $query);
		$row = mysqli_fetch_array($result);
		if ($row["COUNT(*)"] != 0) {
			$newpass = $_POST["newpass"];
			$query = "UPDATE users SET PASSWORD='$newpass' WHERE USERNAME='$user'";
			mysqli_query($db, $query);
			echo "Password changed successfully for $user.";
			$success = true;
		} else {
			echo "Invalid username or password.";
		}

	?>

	<?php
	}
	if (!$success) {
	?>
		<h1>Change Password</h1><br />
		Enter your username and phone number <br />
		<form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
			Username: <input type="text" name="username" /><br />
			Old Password: <input type="password" name="password" /><br />
			New Password: <input type="password" name="newpass" /><br />
			<input type="submit" />
		</form>


	<?php } ?>

	<a href="login.php">Click here to login</a>

</body>

</html>