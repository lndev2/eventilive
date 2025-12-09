<?php
require "../connessione.php";
require "user_model.php";
require_once '../config_session.inc.php';


if (isset($_SESSION['user'])) {

    
    $user = $_SESSION['user'] ?? null;
    $id_utente = $_SESSION['user']["id_utente"];
    $result = get_user_events($conn, $id_utente);

    require_once "user_page.php";


} else {

    header("Location: ../home/index.php");

}


