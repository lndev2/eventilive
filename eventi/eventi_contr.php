<?php


require "../connessione.php";
require "eventi_model.php";


if (isset($_GET["categoria"])) {

    
    $idCategoria = $_GET["categoria"];
    $provincia = $_GET["provincia"] ?? null;

    if (!isset($_GET["provincia"])) {

        
        $result = retrieves_events($conn, $idCategoria);
        

    } else {

        

        $result = retrieves_events_by_prov( $conn,  $idCategoria, $provincia);
        //echo $result ;

    }
}



require_once '../config_session.inc.php';
$user = $_SESSION['user'] ?? null;



require "eventi_page.php";