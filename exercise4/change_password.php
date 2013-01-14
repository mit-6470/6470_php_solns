<html>
<head><title>Change password</title></head>
<body>

<?php 
$success = false;

if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["newpass"])) {
	require("db.php");
	$user = mysql_real_escape_string($_POST["username"]);
	$pass = sha1(mysql_real_escape_string($_POST["password"]));
	$query = "SELECT COUNT(*) FROM users WHERE USERNAME='$user' AND PASSWORD='$pass'";
	$result = mysql_query($query, $db);
	$row = mysql_fetch_array($result);
	if ($row["COUNT(*)"] != 0) {
		$newpass = sha1($_POST["newpass"]);
		$query = "UPDATE users SET PASSWORD='$newpass' WHERE USERNAME='$user'";
		mysql_query($query);
		echo "Password changed successfully for $user.";
		$success = true;
	}
	else {
		echo "Invalid username or password.";
	}
	
?>
	
<?php 
} 
if (!$success) {
?>
	<h1>Change Password</h1><br />
	Enter your username and phone number <br />
	<form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
		Username: <input type="text" name="username" /><br />
		Old Password: <input type="password" name="password" /><br />
		New Password: <input type="password" name="newpass" /><br />
		<input type="submit" />
	</form>


<?php } ?>

<a href="login.php">Click here to login</a>

</body>
</html>


