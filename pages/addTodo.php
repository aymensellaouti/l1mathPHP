<?php
session_start();
$nouveauTodo = ['name' => $_POST['name'], 'description'=>$_POST['description'], 'etat'=>0];
$trouve = 0;

foreach ($_SESSION['todos'] as $todo) {
    if ($todo['name'] == $_POST['name']) {
        $trouve = 1;
        break;
    }
}
if ($trouve) {
    $message = "Le todo ${_POST['name']} existe déjà";
    header("location:todo.php?errorMessage=${message}");
} else {
    $_SESSION['todos'][] = $nouveauTodo;
    $message= "Le todo ${_POST['name']} a été ajouté avec succès";
    header("location:todo.php?successMessage=${message}");
//Redirection

}