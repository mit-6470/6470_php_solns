<?php
$db = mysqli_connect("localhost", "root") or die(mysqli_error($db));
mysqli_query($db, "CREATE DATABASE IF NOT EXISTS phpexercises") or die(mysqli_error($db));
mysqli_select_db($db, "phpexercises") or die(mysqli_error($db));
mysqli_query($db, "CREATE TABLE IF NOT EXISTS users (USERNAME VARCHAR(20) NOT NULL, PASSWORD VARCHAR(20) NOT NULL, PHONE VARCHAR(10) NOT NULL, UNIQUE (USERNAME))") or die(mysqli_error($db));
