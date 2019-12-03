<?php
require_once("../conn.php");

$name = $_POST["room_name"];
$price = $_POST["price"];
$user_name = $_POST["user_name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$checkin = $_POST["checkin"];
$checkout = $_POST["checkout"];
$type = $_POST["type"];
$amount = $_POST["amount"];
$sql = "INSERT INTO receipt (name, price, guest_name, email, phone, checkin, checkout, type , amount)
					VALUES ('$name', '$price', '$user_name', '$email','$phone','$checkin','$checkout','$type','$amount')";

if ($conn->query($sql) === FALSE) {
    die("Error: " . $sql . $conn->error);
} else {
    $sql = "DELETE FROM temporary";
    $conn->query($sql);
    header("Location: ../View/success_booking.html");
}
