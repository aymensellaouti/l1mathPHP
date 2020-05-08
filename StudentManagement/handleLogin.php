<?php
session_start();
// Récupérer le login et le password à travers $_POST

if (isset($_POST['username'])&&isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Vérifier s'ils sont bon en requetant notre base de données
    include_once 'connexionBD/getConnexion.php';
    $req="SELECT * from user where username = :uname and password = :pwd";

    $reponse = $bdd->prepare($req);
    $reponse->execute(array(
        'pwd' => $password,
        'uname' => $username
    ));

    $user = $reponse->fetch(PDO::FETCH_OBJ);
    if ($user) {
        $_SESSION['user'] = $username;
        $_SESSION['userRole'] = $user->role;
        header('location:index.php');
    } else {
        $_SESSION['errorMessage'] = 'Veuillez vérifier vos credentials';
        header('location:login.php');
    }
} else {
    // envoyé par GET retourner vers login
    $_SESSION['errorMessage'] = 'Problème lors de la tentative de connexion';
    header('location:login.php');
}


// Si c'est bon on redirige vers la page home

// Sinon On redrige vers la page login avec un message d'erruer