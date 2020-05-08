<?php
/*
 * 1- vérifier qu'on a un id
 * 2- vérifier qu'on un user connecté
 * 3- mettre à jour la base de données
 * */
session_start();
if (isset($_GET['id'])) {
    include_once 'auth/isAdmin.php';
    include_once 'connexionBD/getConnexion.php';
    $req = "update etudiant set name = :name, birthday = :birthday, section_id= :section where id= :id";
    $response = $bdd->prepare($req);
    $response->execute(
        array(
            'birthday' => $_POST['birthday'],
            'name' => $_POST['name'],
            'section' => $_POST['section'],
            'id' => $_GET['id']
        )
    );
    $_SESSION['success'] = "${_POST['name']} a été modifié avec succès )";
} else {
    $_SESSION['errors'] = "Problème lors de la suppression :)";
}

header('location:studentList.php');