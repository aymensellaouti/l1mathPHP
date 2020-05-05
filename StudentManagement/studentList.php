<?php
session_start();
include_once 'auth/isAuthenticated.php';
include_once 'connexionBD/getConnexion.php';
$req="SELECT e.id, e.name, e.birthday, s.designation AS section FROM section s, etudiant e where s.id = e.section_id";
$reponse = $bdd->query($req);
$students = $reponse->fetchAll(PDO::FETCH_OBJ);
?>


<body>
<?php
    include 'layout fragments/header.php';
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item active">Liste des étudiants </li>
</ol>
<?php
    if ($_SESSION['errors']) {
?>
<div class="alert alert-danger">
    <?php
        echo $_SESSION['errors'];
        unset($_SESSION['errors'] );
    ?>
</div>
        <?php
    }
        ?>

<?php
if ($_SESSION['success']) {
    ?>
    <div class="alert alert-success">
        <?php
        echo $_SESSION['success'];
        unset($_SESSION['success'] );
        ?>
    </div>
    <?php
}
?>

    <div>
    <a class="float-right m-3" href="addStudent.php">
        <i class="fa fa-user-plus fa-2x" aria-hidden="true"></i>
    </a>
</div>
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">birthday</th>
        <th scope="col">section</th>
        <th scope="col">Actions</th>
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
        <td>
            <a href="studentDetail.php?id=<?= $student->id?>">
                <i class="fa fa-info-circle fa-2x" aria-hidden="true"></i></td>
            </a>

    </tr>
    <?php
        }
    ?>
    </tbody>
</table>

<?php
include 'layout fragments/footer.php';
?>