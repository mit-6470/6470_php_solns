<?php
if(session_status() == PHP_SESSION_NONE) {
	session_start();
}
require("login_info.php");
logout();
