<html>

<head>
	<title> Login Page </title>
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

	// check if login attempt
	if (isset($_POST["username"]) && isset($_POST["password"])) {
		require("../db.php");	// establish DB connection
		$user = $_POST["username"];
		$pass = $_POST["password"];
		$query = "SELECT PASSWORD from users WHERE USERNAME='" . mysqli_real_escape_string($db, $user) . "'";
		$result = mysqli_query($db, $query) or die(mysqli_error($db));
		$row = mysqli_fetch_assoc($result);
		if ($pass == $row["PASSWORD"]) {
			$_SESSION["user"] = mysqli_real_escape_string($db, $user);
			if (isset($_POST["remember"])) {
				setcookie("user", mysqli_real_escape_string($db, $user), time() + 60 * 60 * 24, "/");
			}
			header("Location: index.php");
		} else {
			echo "Invalid username or password <br />";
		}
	}
	?>

	<!-- not logged in -->
	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
		Username: <input type="text" name="username" /><br />
		Password: <input type="password" name="password" /><br />
		Remember me <input type="checkbox" name="remember" /><br />
		<input type="submit" />
	</form>
	<br />
	<br />
	<a href="index.php">Home</a><br />
	<a href="reset_password.php">Forgot Password? Click here to reset password.</a>
	<a href="register.php">Click here to register.</a>

</body>

</html>