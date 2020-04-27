<?php
$datejour = getdate();
$heure = $datejour["hours"];
$minute = $datejour["minutes"];
function bonjour()
{
    global $heure;
    global $minute;
    echo "<b> BONJOUR A VOUS IL EST : $heure H $minute </b> ";
}
function bonsoir()
{
    global $heure;
    global $minute;
    echo "<b> BONSOIR A VOUS IL EST : $heure H $minute <br  />";
}
if ($heure <= 17) {
    $salut = "bonjour";
} else $salut = "bonsoir";//appel dynamique de la fonction
echo '<b>'.$salut.'</b> <br>';
echo "<b> ${salut} </b> <br>";
$salut();