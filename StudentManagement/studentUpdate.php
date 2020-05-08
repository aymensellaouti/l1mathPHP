<?php
session_start();
/*
 * 1- On vérifie si on a un id et si on est authentifié
 * 2- Récupére les données de l'utilisateur à modifier
 * Si on trouve l'étudiant
 * 3- Afficher le formulaire de l'utilisateur avec les données récupérés
 * 4- Envoi le forulaire au script qui va faire la mise à jour
 * */

if (isset($_GET['id'])) {
    require_once 'auth/isAdmin.php';
    require_once 'connexionBD/getConnexion.php';

    $req="SELECT * from section";
    $reponse = $bdd->query($req);
    $sections = $reponse->fetchAll(PDO::FETCH_OBJ);

    $req = "select * from etudiant where id = :id";
    $respone = $bdd->prepare($req);
    $respone->execute(array(
        'id' => $_GET['id']
    ));
    $student = $respone->fetch(PDO::FETCH_OBJ);
    if (!$student) {
        $_SESSION['errors'] = "Problème lors de la suppression étudiant innexistant :)";
        header('location:studentList.php');
    }
} else {
    $_SESSION['errors'] = "Problème lors de la suppression :)";
    header('location:studentList.php');
}
include 'layout fragments/header.php';
?>
<div class="container">
    <form action="handleUpdateStudent.php?id=<?= $student->id?>" method="post" _lpchecked="1">
        <fieldset>
            <legend>Mettre à jour un étudiant</legend>
            <div class="form-group">
                <label for="name" class="col-sm-2 col-form-label">name</label>
                <div>
                    <input
                        required
                        type="text"
                        value="<?= $student->name?>"
                        class="form-control"
                        id="name"
                        name="name"
                    >
                </div>
                <label for="birthday" class="col-sm-2 col-form-label">
                    Date de naissance
                </label>
                <div>
                    <input
                        required
                        type="date"
                        value="<?= $student->birthday?>"
                        class="form-control"
                        id="birthday"
                        name="birthday"
                    >
                </div>
            </div>
            <div class="form-group">
                <label for="section">Section</label>
                <select
                    required
                    name="section" class="form-control" id="section">
                    <option value="<?= $student->section_id?>">Votre section</option>
                    <?php foreach ($sections as $section) { ?>
                        <option value="<?=$section->id ?>">
                            <?=$section->designation ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </fieldset>
    </form>
</div>
<?php
include 'layout fragments/footer.php';
?>
