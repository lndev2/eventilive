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


    if (isset($_FILES['immagine'])) {


        print_r($_FILES);

        $file = $_FILES['immagine'];
        $fileError = $_FILES['immagine']['error'];
        $fileName = $_FILES['immagine']['name'];
        $fileTmpName = $_FILES['immagine']['tmp_name'];
        $fileSize = $_FILES['immagine']['size'];
        $fileType = $_FILES['immagine']['type'];
        
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg', 'jpeg', 'png', 'pdf');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {

                if ($fileSize < 10000000000) {

                    echo 'file ok<br>';

                    $fileNameNew = uniqid('', more_entropy: true) . "." . $fileActualExt;
                    $fileDestination = '../img/eventi/' . $fileNameNew;

                    print_r($fileDestination);

                    move_uploaded_file($fileTmpName, $fileDestination);
                    //header("Location: index.php?uploadsuccess");

                } else {
                    echo "your file is too big!";
                    $fileDestination = '';
                }
            } else {
                echo "Ther was an error uploading you file!";
                $fileDestination = '';

            }
        } else {

            echo "You cannot upload files of this type!";
            $fileDestination = '';
        }

    }



    try {

        require_once '../connessione.php';
        if (isset($_SESSION["user"])) {

            $user = $_SESSION['user'];
            $conn = Database::user();

        } else {

            $user = null;
            $conn = Database::guest();

        }
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

                //TODO
                //$_SESSION["errori_evento"] = $errors;

                header("Location: " . $_SERVER['HTTP_REFERER']);
                die();
            }


            if (isset($_POST["modifica"])) {


                mod_event($conn, $idEvento, $titolo, $categoria, $città, $luogo, $provincia, $data, $ora, $descrizione, $fileDestination);

            }


            if (isset($_POST["inserisci"])) {
                $userId = $_SESSION["user"]["id_utente"];
                insert_event($conn, $userId, $titolo, $categoria, $città, $luogo, $provincia, $data, $ora, $descrizione, $fileDestination);
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