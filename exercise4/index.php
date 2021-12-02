<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
require("login_info.php");

if (is_logged_in()) { ?>

	Welcome, <?php echo $_SESSION['user']; ?><br />
	<a href="change_password.php">Change Password</a>
	<a href="logout.php">Logout</a>

<?php } else { ?>

	You are not logged in.<br />
	<a href="login.php">Login</a><br />
	<a href="register.php">Register</a><br />

<?php } ?>