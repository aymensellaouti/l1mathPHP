<?php

$x = 9 ;
switch($x) {
    case 1 : echo 'On est le Lundi'; break ;
    case 2 : echo 'On est le Mardi'; break ;
    case 3 : echo 'On est le Mercredi'; break ;
    case 4 : echo 'On est le Jeudi'; break ;
    case 5 : echo 'On est le Vendredi'; break ;
    case 6 : echo 'On est le Samedi'; break ;
    case 7 : echo 'On est le Dimanche'; break ;
    default : echo 'Le numéro du jour est erronné il faut un numéro entre 1 et 7'; break ;
}