<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $nomUser = $_POST['nomUtilisateur'];
    $passwordfr = $_POST['motDePasse'];

    try{
       require_once 'dbh.inc.php';
       echo "Connected successfully";
       $query = "DELETE FROM Utilisateur WHERE nomUtilisateur = :username AND motDePasse = :pw;";
      
       $stmt = $pdo->prepare($query);

        
        $stmt -> bindParam(":username", $nomUser);

        $stmt -> bindParam(":pw", $passwordfr);
        $stmt->execute();
        $pdo = null;
        $stmt = null;

        header("Location: ../index.php");

        die("Query successful");

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

}else{
    header("Location: ../index.php");
    exit();
}