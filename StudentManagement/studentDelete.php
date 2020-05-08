<?php
session_start();
//vérifier s'il authentifié
require_once 'auth/isAdmin.php';
// récupérer ma base de données
require_once 'connexionBD/getConnexion.php';
//Vérifier si j'ai un id
    if (isset($_GET['id'])) {
    // Si oui
        //Créer ma requete
        $req = "delete from etudiant where id = :id";
        $response = $bdd->prepare($req);
        $response->execute(
            array(
                'id' => $_GET['id']
            )
        );
        if ($response) {
            $_SESSION['success'] = "Etudiant supprimé avec succès :)";
        } else {
            $_SESSION['errors'] = "Problème avec la base de données lors de la suppression :)";
        }
        // lancer la requete
        // ajouter un message de success
    } else {
        $_SESSION['errors'] = "Problème lors de la suppression :)";
    }
// rediriger vers la liste
header('location:studentList.php');