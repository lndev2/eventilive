<?php
require "../connessione.php";
require_once '../config_session.inc.php';
require "user_model.php";
require "user_contr_funzioni.php";

if (isset($_SESSION['user'])) {

    
    $user = $_SESSION['user'] ?? null;
    //print_r($user);
    
    $id_utente = $_SESSION['user']["id_utente"];
    //print_r($id_utente);

    $result = get_user_events($conn, $id_utente);
    //print_r($result);

    $subs = retrives_subs($conn,$id_utente );
    //print_r($subs );



    require_once "user_page.php";


} else {

    header("Location: ../home/index.php");

}


