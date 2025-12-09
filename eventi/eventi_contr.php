<?php


require "../connessione.php";
require "eventi_model.php";


if (isset($_GET["categoria"])) {
    $idCategoria = $_GET["categoria"];
    $result = retrieves_events($conn, $idCategoria);
}

require_once '../config_session.inc.php';
$user = $_SESSION['user'] ?? null;



require "eventi_page.php";