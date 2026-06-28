<?php

$host = "localhost";
$user = "db_user";
$password = "5678";
$database = "eventilive";

$conn = new mysqli($host,$user,$password,$database);

if (mysqli_connect_errno()) {

    echo "Connessione fallita: ". $profile . $conn->connect_error;
    die();
    
} else {
    //echo "connessione riuscita: " . $profile;
}






?>