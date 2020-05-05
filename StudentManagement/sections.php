<?php
session_start();
include_once 'auth/isAuthenticated.php';
include_once 'connexionBD/getConnexion.php';
$req="SELECT * from section";
$reponse = $bdd->query($req);
$sections = $reponse->fetchAll(PDO::FETCH_OBJ);
?>

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
