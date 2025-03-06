<?php
declare(strict_types=1);
include_once 'dbh.inc.php';

function trop_de_troupes(int $sForm,int $serv,int $cuisinier,int $gardien,int $recruteur)
{
    $total = $serv + $cuisinier + $gardien + $recruteur;
    if($total > $sForm)
    {
        return true;
    }else {
        return false;
    }
}