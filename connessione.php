<?php

$host = "127.0.0.1";
$dbusername = "root";
$password = "";
$database = "eventilive";

// Crea connessione
$conn = new mysqli($host, $dbusername, $password, $database);

// Controlla la connessione
if (mysqli_connect_errno()) {
    die("Connessione fallita: " . $conn->connect_error);
}else{
    //echo "connessione riuscita";
}





?>