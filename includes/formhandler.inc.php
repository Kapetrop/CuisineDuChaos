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
       $query = "INSERT INTO `Utilisateur`( `nomUtilisateur`, `prenom`, `email`, `motDePasse`) VALUES (?,?,?,?);";
       $stmt = $pdo->prepare($query);

       $options = [
        'cost' => 12,
        ];
        $hashedPwd = password_hash($passwordfr, PASSWORD_BCRYPT, $options);
        $stmt->execute([$nomUser, $prenom, $email, $hashedPwd]);

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