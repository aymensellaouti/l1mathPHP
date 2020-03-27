<?php
session_start();
unset($_SESSION['todos']);
header('location:todo.php?successMessage=Session réinitialisée avec succès');