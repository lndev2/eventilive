<?php
require "../connessione.php";
require_once '../config_session.inc.php';
require "user_model.php";
require "user_contr_funzioni.php";

if (isset($_SESSION['user'])) {

    $user = $_SESSION['user'] ?? null;
    $id_utente = $_SESSION['user']["id_utente"];


    $result = get_user_events($conn, $id_utente);
    $subs = retrives_subs($conn,$id_utente );



    require_once "user_page.php";


} else {

    header("Location: ../home/index.php");

}


