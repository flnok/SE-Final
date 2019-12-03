<?php
require_once("../conn.php");
header("Location: ../index.html");
$sql = "DELETE FROM temporary";
$conn->query($sql);
