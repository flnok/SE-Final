<?php
require_once("../conn.php");
session_start();

$username = $_POST["username"];
$password = $_POST["password"];
$numberphone = $_POST["phone"];
$accounttype = "guest";
$name = $_POST["name"];
$sql = "INSERT INTO guest (username,password,name,phone,type)
			VALUES ('$username', '$password','$name','$numberphone', '$accounttype')";

if ($conn->query($sql) === FALSE) {
    die("Error: " . $sql . $conn->error);
    $_SESSION["message"] = "<script type='text/javascript'>alert('Đăng ký không thành công');</script>";
    header("Location: ../Controller/register.php");
} else {
    $_SESSION["message"] = "<script type='text/javascript'>alert('Chúc mừng bạn đã đăng ký thàng công!');</script>";
    header("Location: ../Controller/register.php");
}
