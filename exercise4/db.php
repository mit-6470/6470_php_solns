<?php
/*
 * In my setup, I have a local MySQL database, with login user:6470user, password:6470
 * Database name is 6470exercise, and table name is users
 * If these are not your settings or database/table names, then substitute
 * the correct names in all the queries (including those in other files)
 */
$db = mysql_connect("localhost", "6470user", "6470") or die(mysql_error());
mysql_query("CREATE DATABASE IF NOT EXISTS 6470exercise") or die(mysql_error());
mysql_select_db("6470exercise", $db) or die(mysql_error());
mysql_query("CREATE TABLE IF NOT EXISTS users (USERNAME VARCHAR(1000) NOT NULL, PASSWORD CHAR(40) NOT NULL, PHONE VARCHAR(10) NOT NULL, UNIQUE (USERNAME))") or die(mysql_error());

?>