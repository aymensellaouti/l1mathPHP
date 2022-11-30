<?php

try {
    $bdd = new PDO("mysql:host=localhost;dbname=l1math",'root','',
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
            )
    );
} catch (PDOException $error) {
    echo ($error->getMessage());
}
