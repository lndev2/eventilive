<?php
require_once "../config_session.inc.php";


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION["user"])) {


    $commento = $_POST["commento"];
    $voto = $_POST["voto"];
    $idEvento = $_POST["idEvento"];


    try {

        require_once '../connessione.php';
        require_once "desc_evento_model.php";


        $userId = $_SESSION["user"]["id_utente"];
        $conn = Database::user();

        if (isset($_POST["elimina"])) {


            del_comment($conn, $userId, $idEvento);


        } else {

            $errors = [];

            if (empty($commento)) {

                $errors["commento_vuoto"] = "Inserisci un commento!";
            }


            if ($errors) {

                $_SESSION["errori_post"] = $errors;

                //completare display
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit();
            }

            if (isset($_POST["invia"])) {

                insert_comment($conn, $userId, $idEvento, $commento, $voto);


            } else if (isset($_POST["modifica"])) {

                mod_comment($conn, $userId, $idEvento, $commento, $voto);

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