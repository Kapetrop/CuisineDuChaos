<?php
include 'includes/entrainement_view.inc.php';
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $nomUtilisateur = $_POST['nomUtilisateur'];
    $_SESSION['nomUtilisateur'] = $nomUtilisateur;
    

    try{
       require_once 'includes/dbh.inc.php';
       $query1 = "SELECT * FROM Utilisateur WHERE nomUtilisateur = :userName;";
         $stmt1 = $pdo->prepare($query1);
            $stmt1 -> bindParam(":userName", $nomUtilisateur);
            $stmt1->execute();
            $results1 = $stmt1->fetch(PDO::FETCH_ASSOC);
       $query = "SELECT * FROM Staff WHERE idUtilisateur = :userid;";
      
       $stmt = $pdo->prepare($query);

        
        $stmt -> bindParam(":userid", $results1['idUtilisateur']);

        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $pdo = null;
        $stmt = null;

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

}else{
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <p>Stats</p>
    <?php echo "<p>".$nomUtilisateur."</>" ?>
    
        <?php
        if(empty($results)){
            echo "<div>";
            echo "Pas de résultats pour cet utilisateur.";
            echo "</div>";
        }else{
            
            echo "<form action='includes/entrainement.inc.php' method='post'>";
            echo "<h1>Entrainement</h1>";
            foreach($results as $result){
            echo "<div> Sans formation: " . htmlspecialchars($result['sansFormation']). " <input type='hidden' name='sansFormation' value=".$result['sansFormation']."></div>";
            echo "<div> Serveur: " . htmlspecialchars($result['serveur']). " <input type='number' name='serveur' placeholder=0></div>";
            echo "<div> Cuisinier: " . htmlspecialchars($result['cuisinier']). " <input type='number' name='cuisinier' placeholder=0></div>";
            echo "<div> Gardien: " . htmlspecialchars($result['gardien']). " <input type='number' name='gardien' placeholder=0></div>";
            echo "<div> Recruteur: " . htmlspecialchars($result['recruteur']). " <input type='number' name='recruteur' placeholder=0></div>";
        }
        echo "<button type='submit' name='submit'>Entrainement</button>";
        echo "</form>";
            
        }
        check_train_errors();
        ?>

    
</body>
</html>
