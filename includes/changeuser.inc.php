<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $nomUser = $_POST['nomUtilisateur'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $passwordfr = $_POST['motDePasse'];

    try{
       require_once 'dbh.inc.php';
       echo "Connected successfully";
       $query = "UPDATE Utilisateur SET nomUtilisateur = :username,prenom = :prenom, email = :email,motDePasse = :motDePasse WHERE idUtilisateur = 7;";
      
       $stmt = $pdo->prepare($query);

        
        $stmt -> bindParam(":username", $nomUser);
        $stmt -> bindParam(":prenom", $prenom);
        $stmt -> bindParam(":email", $email);
        $stmt -> bindParam(":motDePasse", $passwordfr);
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