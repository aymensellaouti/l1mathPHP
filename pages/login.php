<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
</head>
<body>
<form action="connexion.php" method="post">
    <input class='form-control' type="text" name="email">
    <input class='form-control' type="password" name="pwd">
    <input class='btn btn-primary' type="submit" value="envoyer">
    <?php
        if (isset($_SESSION['messageErreur'])) {
        echo "<div class='alert alert-danger'>${_SESSION['messageErreur']}</div>";
        unset($_SESSION['messageErreur']);
        }
    ?>
</form>
</body>
</html>
