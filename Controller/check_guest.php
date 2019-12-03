<?php
if (isset($_SESSION["guest"])) {
    header("Location: ../View/account.php");
}
