<?php


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    echo "post";
    echo "<br>";

    $titolo = $_POST["titolo"];

    print_r($titolo);
    echo "<br>";

    $categoria = $_POST["categoria"];

    print_r($categoria);
    echo "<br>";

    $città = $_POST["città"];

    print_r($città);
    echo "<br>";

    $luogo = $_POST["luogo"];

    print_r($luogo);
    echo "<br>";

    $provincia = $_POST["provincia"];

    print_r($provincia);
    echo "<br>";

    $data = $_POST["data"];

    print_r($data);
    echo "<br>";

    $ora = $_POST["ora"];

    print_r($ora);
    echo "<br>";

    $descrizione = $_POST["descrizione"];

    print_r($descrizione);
    echo "<br>";


    try {

        require_once '../connessione.php';
        require_once "../config_session.inc.php";
        require_once "inser_evento_contr_funzioni.php";
        require_once "inser_evento_model.php";

        $errors = [];

        if (is_input_empty($titolo, $categoria, $città, $luogo, $provincia, $data, $descrizione)) {

            $errors["input_vuoto"] = "inserisci Tutti i campi!";
        }

        if (!isset($_SESSION["user"])) {

            $errors["sessione"] = "Sessione non valida!";
        }


        if ($errors) {

            $_SESSION["errori_evento"] = $errors;

            header("Location: " . $_SERVER['HTTP_REFERER']);
            die();
        }


        $userId = $_SESSION["user"]["id_utente"];

        insert_event( $conn,  $userId,  $titolo,  $categoria,  $città,  $luogo,  $provincia,  $data,  $ora,  $descrizione);

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