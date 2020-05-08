<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['userRole']);
header('location:login.php');