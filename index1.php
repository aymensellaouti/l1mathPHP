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
<h1>
    <?php
        echo 'Bonjour L1Math';
        $ndv = 'varDyn';
        echo $ndv. '  '. chr(65). '<br>';
        echo $ndv. '  '. chr(67). '<br>';
        $personne = [
          'nom' => 'sellaouti',
          'prenom' => 'aymen',
          'age' => 37
        ];

        echo 'Je suis '. $personne['nom'].' '. $personne['prenom'] .' et mon age est '. $personne['age'];
        $chaine = 'Bonjour L1MAth promo 2020';
        $stats = count_chars($chaine, 1);
        echo 'la chaine est : '. $chaine. ' <br>';
//        $segments = explode('-', '02-07-1982');
//        var_dump($segments);
//        var_dump(implode($segments));
        ?>
</h1>

<h2>Contenu du tableau</h2>
<?php
    $tab = ['lundi', 'mardi', 'mercredi', 'jeudi'];
?>
    <table border="2">
        <tr>
            <th>Indice</th>
            <th>Jour</th>
        </tr>
        <?php
        foreach ( $stats as $caractere => $nbOccurence ) {
                ?>
                <tr>
                    <td><?= chr($caractere)?></td>
                    <td><?= $nbOccurence?></td>
                </tr>
                <?php
            }
        ?>
    </table>
</body>
</html>