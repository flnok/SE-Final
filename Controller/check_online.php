<?php
// Start the session
session_start();

if (!isset($_SESSION["username"])) {
	header("Location: ../Controller/register.php");
}
