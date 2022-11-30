<?php
session_start();
include_once 'auth/isAuthenticated.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>
<body>
<?php
    include 'layout fragments/header.php';
?>

<div class="jumbotron">
    <h1 class="display-3">Hello, PHP LOVERS! Welcome to your adminstration Platform</h1>
</div>
</body>
</html>
