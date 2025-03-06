<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $sForm = $_POST['sansFormation'];
    $serv = $_POST['serveur'];
    $cuisinier = $_POST['cuisinier'];
    $gardien = $_POST['gardien'];
    $recruteur = $_POST['recruteur'];


    try{
        require_once 'dbh.inc.php';
        require_once 'entrainement_model.inc.php';
        require_once 'entrainement_contr.inc.php';

        //Error handlers
        $errors = [];
        //si pas assez de staff sans formation
        if(trop_de_troupes($sForm,$serv,$cuisinier,$gardien,$recruteur))
        {
            $errors["trop_de_troupes"] = "Trop de troupes.";
        }
        require_once 'config.php';
        if($errors)
        {   
            $_SESSION["entrainement_errors"] = $errors;
          

            header("Location: ../index.php");
            exit();
        }
    
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}else{  
    header("Location: ../stat.php");
    exit();
}