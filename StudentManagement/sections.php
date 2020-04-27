<?php
session_start();
include_once 'auth/isAuthenticated.php';
include_once 'connexionBD/getConnexion.php';
$req="SELECT * from section";
$reponse = $bdd->query($req);
$sections = $reponse->fetchAll(PDO::FETCH_OBJ);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <title>Liste des sections</title>
</head>
<body>
<?php
include 'layout fragments/header.php';
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item active">Liste des sections </li>
</ol>
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">designation</th>
        <th scope="col">description</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($sections as $section) {
        ?>
        <tr class="table-light">
            <th scope="row"><?= $section->id?></th>
            <td><?= $section->designation?></td>
            <td><?= $section->description?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
</body>
</html>
