<?php
session_start();
unset($_SESSION['nbVisite']);
header("location:session.php");