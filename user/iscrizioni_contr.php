<?php
require_once "../config_session.inc.php";


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION["user"])) {

    if (isset($_POST["categorie"])) {

        $iscrizioni = $_POST["categorie"];
    } else {

        $iscrizioni = [];
    }

    $cancellazioni = [];
    for ($i = 1; $i < 6; $i++) {

        $contiene = false;
        foreach ($iscrizioni as $iscrizione) {

            if ($iscrizione == $i) {

                $contiene = true;
            }

        }

        if (!$contiene) {
            $cancellazioni[] = $i;
        }

    }

    try {

        require_once '../connessione.php';
        require_once "user_model.php";


        $userId = $_SESSION["user"]["id_utente"];


        for($i =0; $i < count($iscrizioni); $i ++){

            subscribe($conn,$userId,$iscrizioni[$i]);
        }

        for($i =0; $i < count($cancellazioni); $i ++){

            unsubscribe($conn,$userId,$cancellazioni[$i]);
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