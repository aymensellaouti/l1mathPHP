<?php
//$som = 0;
//function somme (&$s, $x, $y ) {
//    echo $s;
//    $s = $x + $y;
//    echo $s;
//}
//somme ($som, 3,4);
//echo $som;
//
$som = 0; $prod = 0;
function sommeProduit(&$som, &$prod, $x, $y) {
    $som = $x + $y;
    $prod = $x * $y;
}
sommeProduit($som, $prod, 7, 8);
echo $som;
echo $prod;