<?php
require_once("../conn.php");

if ($type = "admin") {
	$username = $_POST["username"];
	$password = $_POST["password"];
	$phone = $_POST["phone"];
	$name = $_POST["name"];
	$type = $_POST["type"];
	$sql = "INSERT INTO admin (username,password,phone,name,type)
				VALUES ('$username', '$password','$phone' ,'$name', '$type')";
}
if ($type != "admin") {
	$username = $_POST["username"];
	$password = $_POST["password"];
	$phone = $_POST["phone"];
	$name = $_POST["name"];
	$type = $_POST["type"];
	$sql = "INSERT INTO guest (username,password,phone,name,type)
				VALUES ('$username', '$password','$phone' ,'$name', '$type')";
}
if ($conn->query($sql) === FALSE) {
	die("Error: " . $sql . $conn->error);
} else {
	header("Location: ../Admin/index.php");
}
