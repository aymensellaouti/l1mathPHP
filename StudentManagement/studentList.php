<?php
session_start();

// on ouvre la session
// On vérifie s'il est authentifié
include_once 'auth/isAuthenticated.php';
//On récupére notre base de données.
include_once 'connexionBD/getConnexion.php';

$role = $_SESSION['userRole'];
//On crée notre requete qui permet de récupérer la liste des étudiants
$req="SELECT e.id, e.name, e.birthday, e.image, s.designation AS section FROM section s, etudiant e where s.id = e.section_id";
$tabFilter = array();
if (isset($_GET['sectionId'])) {
    $req.= ' and s.id = :sectionId';
    $tabFilter['sectionId'] = $_GET['sectionId'];
}

if (isset($_POST['filter'])) {
    $req.= ' and (e.name like :filter or s.designation like :filter)';
    $tabFilter['filter'] = "%${_POST['filter']}%";
}
$reponse = $bdd->prepare($req);

$reponse->execute($tabFilter);
$students = $reponse->fetchAll(PDO::FETCH_OBJ);
if (isset($students[0]))
    $section = $students[0]->section;
else
    $section = null;
?>


<body>
<?php
//On récupére le Header
    include 'layout fragments/header.php';
?>
<div class="container">
<ol class="breadcrumb">
    <li class="breadcrumb-item active">Liste des étudiants
        <?php
        if (isset($_GET['sectionId']) && count($students)) {
            echo " de la section $section ";
        } ?>
    </li>
</ol>
<?php
    if (isset($_SESSION['errors'])) {
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
if (isset($_SESSION['success'])) {
    ?>
    <div class="alert alert-success">
        <?php
        echo $_SESSION['success'];
        unset($_SESSION['success'] );
        ?>
    </div>
    <?php
}
if ($role == 'admin') {
    ?>

    <div>
        <form class="form-inline" method="post">
            <div class="form-group mx-lg-6 mb-2">
                <input type="text" class="form-control"
                       name="filter"
                       placeholder="Veuillez renseigner votre filtre">
            </div>
            <button type="submit" class="btn btn-danger mb-2">Filtrer</button>
            <a class="float-right m-3" href="addStudent.php">
                <i class="fa fa-user-plus fa-2x" aria-hidden="true"></i>
            </a>
        </form>

    </div>
    <?php } ?>
<table id="dataTableList" class="table table-hover">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">
            image
        </th>
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
        <th scope="row">
            <img
                    height="50px"
                    width="50px"
                    class="rounded-circle"
                    src="<?php
                    if ($student->image == '') {
                        echo 'assets/images/default.png';
                    } else {
                        echo $student->image;
                    }
                    ?>" alt="<?= $student->name?>"></th>
        <td><?= $student->name?></td>
        <td><?= $student->birthday?></td>
        <td><?= $student->section?></td>
        <td>
            <a href="studentDetail.php?id=<?= $student->id?>">
                <i class="fa fa-info-circle fa-2x" aria-hidden="true"></i>
            </a>
            <?php if($role == 'admin') { ?>
            <a href="studentDelete.php?id=<?= $student->id?>">
                <i class="fa fa-eraser fa-2x" aria-hidden="true"></i>
            </a>
            <a href="studentUpdate.php?id=<?= $student->id?>">
                <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
            </a>
            <?php } ?>
        </td>


    </tr>
    <?php
        }
    ?>
    </tbody>
</table>
</div>
<?php
include 'layout fragments/footer.php';
?>