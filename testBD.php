<?php
$bdd = new PDO("mysql:host=localhost;dbname=l1math",'root','');
$req="select * From etudiant";
$reponse = $bdd->query($req);
$data = $reponse->fetchAll();
var_dump($data);