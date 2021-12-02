<html>
<head><title> Login Page </title> </head>
<body>

<?php
$success = false;

// check if login attempt
if (isset($_POST["username"]) && isset($_POST["password"])) {
	require("../db.php");	// establish DB connection
	$user = $_POST["username"];
	$pass = $_POST["password"];
	$query = "SELECT PASSWORD from users WHERE USERNAME='" . mysqli_real_escape_string($db,$user) . "'";
	$result = mysqli_query( $db,$query) or die(mysqli_error($db));
	$row = mysqli_fetch_assoc($result);
	if (isset($row["PASSWORD"]) && $pass == $row["PASSWORD"]) {
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
	<a href="register.php">Click here to register</a>
<?php }?>
</body>
</html>