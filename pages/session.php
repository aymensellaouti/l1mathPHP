<?php
session_start();
// si c'est la première visite je lui dit bonjour bienvenu
if (!isset($_SESSION['nbVisite'])) {
    $message =  "Bonjour C'est votre première visite :D";
    $_SESSION['nbVisite'] = 1;
} else {
    $_SESSION['nbVisite'] += 1;
    $message = "Bonjour C'est votre ${_SESSION['nbVisite']} visite";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div><a href="logout.php">Logout</a></div>
    <?= $message ?>
</body>
</html>