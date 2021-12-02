<html>
<head><title>Registration</title></head>
<body>

<?php
$success = false;
// Registration attempt
if (isset($_POST["username"]) && isset($_POST["password"])) {
	require("../db.php");
	$user = mysqli_real_escape_string($db,$_POST["username"]);
	$query = "SELECT COUNT(*) FROM users WHERE USERNAME='$user'";
	$result = mysqli_query($db,$query);
	$row = mysqli_fetch_array($result);
	if ($row["COUNT(*)"] != 0) {
		echo "The user already exists!<br />";
	}
	else {
		$pass = mysqli_real_escape_string($db,$_POST["password"]);
		$phone = mysqli_real_escape_string($db,$_POST["phone"]);
		$query = "INSERT INTO users VALUES ('$user', '$pass', '$phone')";
		mysqli_query( $db,$query) or die(mysqli_error($db));
		echo "Registration for $user was successful <br /><br />";
		$success = true;
	}

?>
	<a href="login.php">Click here to login</a>

<?php
}
if (!$success) {
?>
	<h1>Registration</h1><br />
	<form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
		Username: <input type="text" name="username" /><br />
		Password: <input type="password" name="password" /><br />
		Phone: <input type="text" name="phone" /><br />
		<input type="submit" />
	</form>


<?php } ?>


</body>
</html>


