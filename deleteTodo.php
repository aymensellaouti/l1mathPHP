<?php
if (isset($_GET['name'])) {
    session_start();
    $todos = $_SESSION['todos'];
    $newTodos = [];
    for ($i=0; $i < count($todos); $i++) {
        // Aller chercher le todo avec le name $_GET['name']
        //On le supprime
        //On redirige vers la liste des todo
        if ($todos[$i]['name'] == $_GET['name']) {
            array_splice($todos, $i, 1);
            $_SESSION['todos'] = $todos;
            $message = "Le todo ${_GET['name']} a été supprimé avec succès";
            header("location:todo.php?successMessage=${message}");
            return ;
        }
    }
    $message = "Le todo ${_GET['name']} n'a pas été supprimé, il n'existe pas";
    header("location:todo.php?errorMessage=${message}");
} else {
    header("location:todo.php");
}
//Cas particulier : il trouve pas le todo