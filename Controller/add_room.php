<?php
require_once("../conn.php");

$name = $_POST["name"];
$type = $_POST["type"];
$price = $_POST["price"];
$description = $_POST["description"];

$target_dir = $_SERVER['DOCUMENT_ROOT'] . "/CNPM-Final_Project/Uploads/";
$file_name = basename($_FILES["fileUpload"]["name"]);
$target_file = $target_dir . $file_name;

// if (!move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
// 	die("Sorry, there was an error uploading your file.");
// }

$sql = "INSERT INTO room (name, type, price, description, image)
			VALUES ('$name', '$type', $price, '$description', '$file_name')";

if ($conn->query($sql) === FALSE) {
	die("Error: " . $sql . $conn->error);
} else {
	header("Location: ../Admin/index.php");
}
