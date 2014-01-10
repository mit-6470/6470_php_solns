<?php
/*
 * In my setup, I have a local MySQL database, with login user:6470user, password:6470
 * Database name is 6470exercise, and table name is users
 * If these are not your settings or database/table names, then substitute
 * the correct names in all the queries (including those in other files)
 */

require("db_pass.php"); // All this has is the variable $sql_pw
// It isn't included so you don't get my SQL password

$db = mysql_connect("sql.mit.edu", "cliu2014", $sql_pw) or die(mysql_error());
//mysql_query("CREATE DATABASE IF NOT EXISTS 6470exercise") or die(mysql_error());
mysql_select_db("cliu2014+6470login", $db) or die(mysql_error());
mysql_query("CREATE TABLE IF NOT EXISTS users (USERNAME VARCHAR(20) NOT NULL, PASSWORD VARCHAR(20) NOT NULL, PHONE VARCHAR(10) NOT NULL, UNIQUE (USERNAME))") or die(mysql_error());

?>