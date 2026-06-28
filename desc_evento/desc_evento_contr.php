<?php

require "../connessione.php";
require_once '../config_session.inc.php';
require "desc_evento_model.php";
require "desc_evento_contr_funzioni.php";



if (isset($_SESSION["user"])) {

    $user = $_SESSION['user'];
    $userId = $_SESSION['user']['id_utente'];


} else {

    $user = null;
    $userId = null;

}



if (isset($_GET["idEvento"])) {


    $idEvento = $_GET["idEvento"];
    $result = get_event_desc($conn, $idEvento);
    $post = retrives_posts($conn, $idEvento);


}else{

    header( "Location: index.php");

}





require "desc_evento_page.php";
?>