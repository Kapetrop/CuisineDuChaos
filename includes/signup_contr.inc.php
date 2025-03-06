<?php
declare(strict_types=1);
include_once 'dbh.inc.php';

function is_input_empty(string $username,string $pwd,string $email,string $prenom)
{
    if(empty($username) || empty($pwd) || empty($email) || empty($prenom))
    {
        return true;
    }else 
    {
        return false;
    }
    
}
function is_email_invalid(string $email)
{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        return true;
   
    }else 
    {
        return false;
    }
}
function is_username_taken(object $pdo,string $username)
{
   if(get_username($pdo,$username))
   {
       return true;
   }else
    {
         return false;
    }
}
function is_email_taken(object $pdo,string $email)
{
   if(get_email($pdo,$email))
   {
       return true;
   }else
    {
         return false;
    }
}
function create_user(object $pdo,string $username,string $pwd,string $email,string $prenom)
{

   set_user($pdo,$username,$pwd,$email,$prenom);

}
