<?php
$pwd = "Youpi";
$options = [
    'cost' => 12,
];
$hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

$pwdLogin = "Youpi";
password_verify($pwdLogin, $hashedPwd);

if(password_verify($pwdLogin, $hashedPwd)){
    echo "Password is correct";
}else{
    echo "Password is incorrect";
}