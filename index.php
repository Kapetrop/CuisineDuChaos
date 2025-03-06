<?php
require_once 'includes/config.php';
require_once 'includes/signup_view.inc.php';
require_once 'includes/entrainement_view.inc.php';



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <h1>Créer un compte</h1>

    <form action="includes/signup.inc.php" method="post"> 
        <input type="text" name="nomUtilisateur" placeholder="Nom d'utilisateur">
        <input type="text" name="prenom" placeholder="Prénom">
        <input type="email" name="email" placeholder="Email" autocomplete="email">
        <input type="password" name="motDePasse" placeholder="password">
        <button type="submit" name="submit">Envoyer</button>

    </form>
   <?php 

   check_signup_errors();
   ?>
    <h1>Se Connecter</h1>

    <form action="includes/logIn.inc.php" method="post"> 
        <input type="text" name="nomUtilisateur" placeholder="Nom d'utilisateur">
        <input type="password" name="motDePasse" placeholder="password">
        <button type="submit" name="submit">Envoyer</button>
    </form>
    <!-- <h1>Effacer un compte</h1>

    <form action="includes/deleteuser.inc.php" method="post"> 
        <input type="text" name="nomUtilisateur" placeholder="Nom d'utilisateur">
        <input type="password" name="motDePasse" placeholder="password">
        <button type="submit" name="submit">Envoyer</button>
    </form>
    <h1>Changer un compte</h1>

    <form action="includes/changeuser.inc.php" method="post"> 
        <input type="text" name="nomUtilisateur" placeholder="Nom d'utilisateur">
        <input type="text" name="prenom" placeholder="Prénom">
        <input type="email" name="email" placeholder="Email" autocomplete="email">
        <input type="password" name="motDePasse" placeholder="password">
        <button type="submit" name="submit">Envoyer</button>
    </form> -->
    <h1>Stats</h1>
    <form action="stats.php" method="post">
    <input type="text" name="nomUtilisateur" placeholder="nom d'utilisateur">
        <button type="submit" name="submit">Stats</button>
    </form>
    <?php 

    check_train_errors();
    print_r( $_SESSION);
   ?>
</body>
</html>