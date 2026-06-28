<?php


declare(strict_types=1);


function get_username(mysqli $conn, string $username) {

    $query = "SELECT nickname FROM utenti WHERE nickname = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
    
    return $user;
}

function get_email(mysqli $conn, string $email) {
   
    $query = "SELECT nickname FROM utenti WHERE email = ?"; 
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email); 
    $stmt->execute();   
    $result = $stmt->get_result();    
    $user = $result->fetch_assoc();
    $stmt->close();
    
    return $user;
}

function set_user(mysqli $conn, string $username, string $nome, string $cognome, string $email, string $pwd ) {

    $query = "INSERT INTO utenti (nickname, nome, cognome, email, pwd) VALUES (?, ?, ?, ?, ?);"; 
    $stmt = $conn->prepare($query);
    $options = [
        'cost' => 12
    ];
    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);
    $stmt->bind_param("sssss", $username, $nome, $cognome, $email,  $hashedPwd);
    $stmt->execute();
    $stmt->close();
}


