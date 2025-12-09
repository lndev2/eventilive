<?php



declare(strict_types=1);


function is_input_empty(string $username, string $nome , string $cognome, string  $pwd, string $email){
    if (empty($username) || empty($nome) || empty($cognome) || empty($pwd) || empty($email)){
        return true;
    }else{
        return false;
    }
}

function is_email_invalid(string $email){

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
        return false;
    }
}

function is_username_taken(mysqli $conn, string $username) {

    if (get_username($conn,$username)){
        return true;
    }else{
        return false;
    }
}

function is_email_registered(mysqli $conn, string $email) {

    if (get_email($conn,$email)){
        return true;
    }else{
        return false;
    }
}

function create_user(mysqli $conn, string $username, string $nome, string $cognome, string $email, string $pwd ){
    set_user( $conn,  $username,  $nome,  $cognome,  $email,  $pwd );
}

