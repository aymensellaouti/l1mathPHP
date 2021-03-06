<?php
session_start();
// Récupérer le login et le password à travers $_POST
include_once 'auth/isAdmin.php';
// On a récupéré l'image uploadé via $_FILES
// On a préparé le chemi de notre image
if ($_FILES['image']) {
$path = 'assets/uploads/'.uniqid().$_FILES['image']['name'];
//On a copié l'image de l'emplacement temporaire vers notre dossier upload
copy($_FILES['image']['tmp_name'], $path);
} else {
    $path = '';
}

if (isset($_POST['name'])&&isset($_POST['birthday'])&&isset($_POST['section'])) {
    // Vérifier s'ils sont bon en requetant notre base de données
    include_once 'connexionBD/getConnexion.php';
    $req="insert into etudiant (name, birthday, image, section_id) values (:name, :birthday, :image, :section)";
    $reponse = $bdd->prepare($req);
    $result = $reponse->execute(array(
        'birthday' => $_POST['birthday'],
        'name' => $_POST['name'],
        'section' => $_POST['section'],
        'image' => $path
    ));
    if ($result) {
        $_SESSION['success'] = "L'étudiant(e) ${_POST['name']} a été ajouté avec succès";
    } else {
        $_SESSION['errors'] = "Problème avec la base de données";
    }
    header('location:studentList.php');
} else {
    $_SESSION['errors'] = "Problème lors de l'ajout vérifier vos champs";
    header('location:login.php');
}
