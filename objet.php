<?php
include_once 'classes/Etudiant.php';

$etudiant = new Etudiant(1, 'aymen ', '1982-07-02', 'info', 123456);
$etudiant2 = new Etudiant(2, 'aymen 2', '1982-07-02', 'info', 123456);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?=$etudiant->getName() ?>
<br/>
<?=$etudiant2->getName() ?>
</body>
</html>
