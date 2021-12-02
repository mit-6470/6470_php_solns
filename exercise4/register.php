<html>

<head>
	<title>Registration</title>
</head>

<body>

	<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	require("login_info.php");

	// check if already logged in
	if (is_logged_in()) {
		header("Location: index.php"); // Redirect if already logged in
		exit(0);
	}

	$success = false;
	// Registration attempt
	if (isset($_POST["username"]) && isset($_POST["password"])) {
		require("../db.php");
		$user = mysqli_real_escape_string($db, $_POST["username"]);
		$query = "SELECT COUNT(*) FROM users WHERE USERNAME='$user'";
		$result = mysqli_query($db, $query);
		$row = mysqli_fetch_array($result);
		if ($row["COUNT(*)"] != 0) {
			echo "The user already exists!<br />";
		} else {
			$pass = mysqli_real_escape_string($db, $_POST["password"]);
			$phone = mysqli_real_escape_string($db, $_POST["phone"]);
			$query = "INSERT INTO users VALUES ('$user', '$pass', '$phone')";
			mysqli_query($db, $query) or die(mysqli_error($db));
			echo "Registration for $user was successful <br /><br />";
			$success = true;
		}
	}
	if (!$success) {
	?>
		<h1>Registration</h1><br />
		<form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
			Username: <input type="text" name="username" /><br />
			Password: <input type="password" name="password" /><br />
			Phone: <input type="text" name="phone" /><br />
			<input type="submit" />
		</form>
	<?php } ?>

	<a href="index.php">Home</a><br />
	<a href="login.php">Click here to login</a>
</body>

</html>