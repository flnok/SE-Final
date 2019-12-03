<?php
if (isset($_SESSION["admin"])) {
    header("Location: ../Admin/index.php");
}
