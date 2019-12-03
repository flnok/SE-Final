<?php
require_once("../conn.php");

$checkin = $_POST["checkin"];
$checkout = $_POST["checkout"];
$people = $_POST["people"];
$amount = $_POST["amount"];
$sql = "INSERT INTO temporary (checkin, checkout, people, amount) VALUES ('$checkin', '$checkout', '$people', '$amount')";

if ($conn->query($sql) === false) {
    die("Error: " . $sql . $conn->error);
} else {
    header("Location: ../View/rooms.php");
}?>
