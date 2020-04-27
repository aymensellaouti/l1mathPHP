<?php
try {
    $bdd = new PDO("mysql:host=localhost;dbname=l1math",'root','',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
} catch (PDOException $error) {
    echo ($error->getMessage());
}

$req="select * From etudiant";
$reponse = $bdd->query($req);
$data = $reponse->fetchAll(PDO::FETCH_OBJ);
var_dump($data);