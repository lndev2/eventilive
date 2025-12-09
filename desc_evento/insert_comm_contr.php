<?php



if ($_SESSION['user'] && $_SERVER["REQUEST_METHOD"] === "POST") {


    //inserimento commento



} else {

    // reinvio alla pagina precedente
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit(); 
}