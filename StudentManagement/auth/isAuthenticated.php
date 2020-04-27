<?php
if (!isset($_SESSION['user'])) {
    $_SESSION['errorMessage'] = "Vous devez d'abord vous loger";
    header('location:login.php');
}