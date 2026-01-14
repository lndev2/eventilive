<?php

declare(strict_types=1);

function is_input_empty(string $username,string  $pwd){
    if (empty($username) || empty($pwd)){
        return true;
    }else{
        return false;
    }
}


// get_user(object $pdo, string $username) può ritornare un array se trova l'utente o false se non lo trova
function is_username_wrong(null|array $result){

    if(!$result){
        return true;
    }else{
        return false;
    }


}


function is_password_wrong(string $pwd, string $hashedPwd){

    
    if(!password_verify($pwd, $hashedPwd)){
        return true;
    }else{
        return false;
    }

    
}