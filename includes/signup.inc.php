<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
// if(isset($_POST["type"]) && $_POST["type"] === "signup")
{
    
    $nomUser = $_POST['nomUtilisateur'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $passwordfr = $_POST['motDePasse'];

    try{
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        //Error handlers
        $errors = [];
        if(is_input_empty($nomUser,$passwordfr,$email,$prenom))
        {
            
           $errors["empty_input"] = "Veuillez remplir tous les champs.";
           
        }
        if(is_email_invalid($email))
        {  
            $errors["email_invalide"] = "Email invalide.";
        }
        if(is_username_taken($pdo,$nomUser))
        {
            $errors["nom_utilise"] = "Nom d'utilisateur déjà pris.";
        }
        if( is_email_taken($pdo,$email))
        {
            $errors["email_utilise"] = "Email déjà pris.";
        }
       
        require_once 'config.php';
        
        if($errors)
        {
            
            $_SESSION["signup_errors"] = $errors;

            header("Location: ../index.php");
            exit();
        }

        create_user($pdo,$nomUser, $passwordfr, $email, $prenom);  
        
        header("Location: ../index.php");

        $pdo = null;
        $stmt = null;
        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

}else{
    header("Location: ../index.php");
    exit();
}