<?php
session_start();
if (isset($_GET['name'])) {
    $todos = $_SESSION['todos'];

    for ($i=  0; $i < count($todos); $i++) {
        if ($todos[$i]['name'] == $_GET['name']) {
            if ($todos[$i]['etat'] == 1) {
                $todos[$i]['etat'] = 0;
            } else {
                $todos[$i]['etat'] = 1;
            }
            $_SESSION['todos'] = $todos;
            break;
        }
    }
}
header('location:todo.php');