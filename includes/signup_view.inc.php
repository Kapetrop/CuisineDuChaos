<?php

declare(strict_types=1);

function check_signup_errors()
{
    
    if(isset($_SESSION["signup_errors"]))
    {
        $errors = $_SESSION["signup_errors"];
        echo "<br>";
        foreach($errors as $error)
        {
            echo "<p>". $error. "</p>";
            
        }
        unset($_SESSION["signup_errors"]);
    } 
    // else if(isset($_GET["signup"]) && $_GET["signup"] === "success")
    // {
       
    //         echo "<p>Signup successful</p>";
       
    // }
    
}