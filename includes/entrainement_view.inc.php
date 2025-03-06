<?php

declare(strict_types=1);

function check_train_errors()
{
    print_r( $_SESSION["entrainement_errors"]);
    
    if(isset($_SESSION["entrainement_errors"]))
    {
        $errors = $_SESSION["entrainement_errors"];
        echo "<br>";
        foreach($errors as $error)
        {
            echo "<p>". $error. "</p>";
            
        }
        unset($_SESSION["entrainement_errors"]);
    } 

    
}