<html>
<head><title> Login Page </title> </head>
<body>

<?php
$success = false;

// check if login attempt
if (isset($_POST["username"]) && isset($_POST["password"])) {
	require("db.php");	// establish DB connection
	$user = $_POST["username"];
	$pass = sha1($_POST["password"]);
	$query = "SELECT PASSWORD from users WHERE USERNAME='" . mysql_real_escape_string($user) . "'";
	$result = mysql_query($query, $db) or die(mysql_error());
	$row = mysql_fetch_assoc($result);
	if ($pass == $row["PASSWORD"]) {
		$success = true;
		echo "$user successfully logged in.";
	}
	else {
		echo "Invalid username or password <br />";
	}
}

// not logged in
if (!$success) {	// show form
?>
	<form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
		Username: <input type="text" name="username" /><br />
		Password: <input type="password" name="password" /><br />
		<input type="submit" />
	</form>
	<br />
	<br />
	<p><a href="register.php">Click here to register</a></p>
	<p><a href="change_password.php">Click here to change your password</a></p>
	<p><a href="reset_password.php">Forgot your password? Click here to reset it</a></p>
<?php }?>
</body>
</html>