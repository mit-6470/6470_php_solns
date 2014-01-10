<html>
<head><title> Login Page </title> </head>
<body>

<?php
session_start();
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
	$query = "SELECT PASSWORD from users WHERE USERNAME='" . mysql_real_escape_string($user) . "'";
	$result = mysql_query($query, $db) or die(mysql_error());
	$row = mysql_fetch_assoc($result);
	if ($pass == $row["PASSWORD"]) {
		$_SESSION['user'] = mysql_real_escape_string($user);
		header("Location: index.php");
	} else {
		echo "Invalid username or password <br />";
	}
}
?>

<!-- not logged in -->
<form action="<?php $_SERVER['PHP_SELF']?>" method="post">
	Username: <input type="text" name="username" /><br />
	Password: <input type="password" name="password" /><br />
	<input type="submit" />
</form>
<br />
<br />
<a href="index.php">Home</a><br />
<a href="register.php">Click here to register</a>
</body>
</html>