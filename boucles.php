<?php

for ($i=1; $i<6; $i++) {
    echo "$i<br>";
}
$i = 1;
while ($i<6) {
    echo "$i<br>";
    $i++;
}
$tab = [1,2,3,4,5];
$tabAssoc = [
    'name' => 'Sellaouti',
    'firstname' => 'Aymen',
    'age' => 37
];
foreach ($tabAssoc as $cle => $item) {
    echo $cle.' : '.$item. '<br>';
}
foreach($tab as $valeur) {
    echo $valeur;
}