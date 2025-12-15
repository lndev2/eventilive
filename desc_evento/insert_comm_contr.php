<?php



if ($_SERVER["REQUEST_METHOD"] === "POST") {


    $commento = $_POST["commento"];
    $voto = $_POST["voto"];
    $idEvento = $_POST["idEvento"];


    try {

        require_once '../connessione.php';
        require_once "../config_session.inc.php";
        require_once "desc_evento_model.php";


        $errors = [];

        if (!isset($_SESSION["user"])) {

            $errors["sessione"] = "Sessione non valida!";
        }


        if (empty($commento)) {

            $errors["commento_vuoto"] = "Inserisci un commento!";
        }


        if ($errors) {

            $_SESSION["errori_post"] = $errors;

            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }


        $userId = $_SESSION["user"]["id_utente"];

        if (isset($_POST["invia"])) {

            insert_comment($conn, $userId, $idEvento, $commento, $voto);



        } else if (isset($_POST["modifica"])) {

            mod_comment($conn, $userId, $idEvento, $commento, $voto);
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