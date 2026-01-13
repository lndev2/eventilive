<?php

require "../connessione.php";
require_once '../config_session.inc.php';
require "desc_evento_model.php";
require "desc_evento_contr_funzioni.php";



if (isset($_SESSION["user"])) {

    $user = $_SESSION['user'];
    $userId = $_SESSION['user']['id_utente'];
    $conn = Database::user();

} else {

    $user = null;
    $conn = Database::guest();

}



if (isset($_GET["idEvento"])) {



    $idEvento = $_GET["idEvento"];
    $result = retrieves_event_desc($conn, $idEvento);
    $post = retrives_posts($conn, $idEvento);




}





require "desc_evento_page.php";
?>