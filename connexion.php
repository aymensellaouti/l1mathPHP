<?php
session_start();
// Il vérifie le mail et le pwd
if ($_POST['email'] == 'aymen.sellaouti@gmail.com' && $_POST['pwd']='pwd') {
    $_SESSION['email'] = $_POST['email'];
    header('location:accueil.php');
} else {
    $_SESSION['messageErreur'] = 'Veuillez vérifier vos données';
    header('location:login.php');
}
// Si c'est correct => Page d'acceuil
// Sinon on le redirige vers login.php et on lui affiche un message d'erreur

//header('location:login.php?message=verifier vos donnes');