<?php
$date = getDate();
if ($date['mday']<10) {
    echo '1ére dizaine du mois';
} elseif ($date['mday']<20) {
    echo 'Deuxième dizaine de la semaine ';
} else {
    echo 'Troisième dizaine de la semaine ';
}