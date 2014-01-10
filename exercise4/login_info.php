<?php
session_start();

function is_logged_in() {
	return isset($_SESSION["user"]);
}

function logout() {
	unset($_SESSION["user"]);
	header("Location: index.php");
}
?>