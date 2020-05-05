<?php
session_start();
// Récupérer le login et le password à travers $_POST

if (isset($_POST['name'])&&isset($_POST['birthday'])&&isset($_POST['section'])) {
    // Vérifier s'ils sont bon en requetant notre base de données
    include_once 'connexionBD/getConnexion.php';
    $req="insert into etudiant (name, birthday, section_id) values (:name, :birthday, :section)";
    $reponse = $bdd->prepare($req);
    $result = $reponse->execute(array(
        'name' => $_POST['name'],
        'birthday' => $_POST['birthday'],
        'section' => $_POST['section']
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
