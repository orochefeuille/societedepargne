<?php
session_start();
if($_SESSION["user"]) {
    unset($_SESSION["user"]);
    header('Location: http://localhost/societedepargne/login.php');
}
?>