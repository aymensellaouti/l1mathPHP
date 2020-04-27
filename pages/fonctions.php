<?php

function somme ($x, $y) {
    echo func_num_args();
    echo 'mes paramètres sont : '.func_get_arg(0).' '.func_get_arg(1);
    echo $x+$y;
}
//somme(3,4);

function sommeInfi() {
    $somme = 0;
    for ($i=0; $i < func_num_args();$i++) {
        $somme += func_get_arg($i);
    }
    echo $somme;
    return $somme;
}
//sommeInfi(1,2,3,4,5,6);

function test(...$args) {
    foreach ($args as $element) {
        echo $element.'<br>';
    }
}

test(1,'a', 254, date('l'), getdate());