<?php
    session_start();

    //Vérifier si on l'id de l'étudient à afficher ou pas
    //Si on a pas on redirige vers la liste des étudiant
    if  (!isset($_GET['id'])) {
        header('location:studentList.php');
    }
    $id = $_GET['id'];
    include_once 'auth/isAuthenticated.php';
    include_once 'connexionBD/getConnexion.php';
    $req="SELECT e.id, e.name, e.birthday, s.designation AS section FROM section s, etudiant e where s.id = e.section_id and e.id = ?";
    $reponse = $bdd->prepare($req);
    $reponse->execute(array(
            $id
    ));
    $student = $reponse->fetch(PDO::FETCH_OBJ);
    if (!$student) {
        $_SESSION['errors'] = "L'étudiant d'id ${id} n'existe pas :(";
        header('location:studentList.php');
    }
?>

<?php
include 'layout fragments/header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 img">
            <img
                    width="250px"
                    height="250px"
                    src="assets/images/profile.jpg"
                    alt="<?= $student->name ?>"
                    class="img-rounded">
        </div>
        <div class="col-md-6 details">
            <blockquote>
                <h5><?=$student->name ?> ></h5>
                <small><cite title="Source Title">Chicago, United States of America  <i class="icon-map-marker"></i></cite></small>
            </blockquote>
            <p>
                <?= $student->section?> <br>
                <?= $student->birthday?>
            </p>
        </div>
    </div>
</div>
<?php
include 'layout fragments/footer.php';
?>