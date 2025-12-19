<?php
require_once "../config_session.inc.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION["user"])) {

    $idEvento = $_POST["idEvento"];
    $titolo = $_POST["titolo"];
    $categoria = $_POST["categoria"];
    $città = $_POST["città"];
    $luogo = $_POST["luogo"];
    $provincia = $_POST["provincia"];
    $data = $_POST["data"];
    $ora = $_POST["ora"];
    $descrizione = $_POST["descrizione"];


    try {

        require_once '../connessione.php';
        require_once "user_contr_funzioni.php";
        require_once "user_model.php";


        if (isset($_POST["elimina"])) {

           
            del_event($conn, $idEvento);
            

        } else {


            $errors = [];

            if (is_input_empty($titolo, $categoria, $città, $luogo, $provincia, $data, $descrizione)) {

                $errors["input_vuoto"] = "inserisci Tutti i campi!";
            }


            if ($errors) {

                //$_SESSION["errori_evento"] = $errors;

                header("Location: " . $_SERVER['HTTP_REFERER']);
                die();
            }


            if (isset($_POST["modifica"])) {
                mod_event($conn, $idEvento, $titolo, $categoria, $città, $luogo, $provincia, $data, $ora, $descrizione);
                
            }


            if (isset($_POST["inserisci"])) {
                $userId = $_SESSION["user"]["id_utente"];
                insert_event($conn, $userId, $titolo, $categoria, $città, $luogo, $provincia, $data, $ora, $descrizione);
            }



        }


        header("Location: " . $_SERVER['HTTP_REFERER']);
        $conn = null;
        $stmt = null;
        die();

    } catch (Exception $e) {
        die("Query failed: " . $e->getMessage());
    }



} else {

    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}