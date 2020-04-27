<?php
session_start();
include_once 'auth/isAuthenticated.php';
include_once 'connexionBD/getConnexion.php';
$req="SELECT e.id, e.name, e.birthday, s.designation AS section FROM section s, etudiant e where s.id = e.section_id";
$reponse = $bdd->query($req);
$students = $reponse->fetchAll(PDO::FETCH_OBJ);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <title>Document</title>
</head>
<body>
<?php
    include 'layout fragments/header.php';
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item active">Liste des étudiants </li>
</ol>
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">birthday</th>
        <th scope="col">section</th>
    </tr>
    </thead>
    <tbody>
    <?php
//    for ($i=0; $i < count ($students); $i++) {
//        $students[$i]
//    }
        foreach ($students as $student) {
   ?>
    <tr class="table-light">
        <th scope="row"><?= $student->id?></th>
        <td><?= $student->name?></td>
        <td><?= $student->birthday?></td>
        <td><?= $student->section?></td>
    </tr>
    <?php
        }
    ?>
    </tbody>
</table>
</body>
</html>
