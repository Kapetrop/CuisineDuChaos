<?php

declare(strict_types=1);

function get_username(object $pdo,string $username)
{
    $query = "SELECT nomUtilisateur FROM Utilisateur WHERE nomUtilisateur = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function get_email(object $pdo,string $email)
{
    $query = "SELECT email FROM Utilisateur WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function set_user(object $pdo,string $nomUser, string $passwordfr, string $email, string $prenom)
{
    // echo "create_user";
    $query = "INSERT INTO `Utilisateur`( `nomUtilisateur`, `prenom`, `email`, `motDePasse`) VALUES (?,?,?,?);";
    $stmt = $pdo->prepare($query);

    $options = [
            'cost' => 12,
            ];
    $hashedPwd = password_hash($passwordfr, PASSWORD_BCRYPT, $options);
        
    $stmt->execute([$nomUser, $prenom, $email, $hashedPwd]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}