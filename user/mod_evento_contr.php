<?php



if ($_SERVER["REQUEST_METHOD"] === "POST") {


    $idEvento = $_POST["modifica"];

    try {

        require_once '../connessione.php';
        require_once "../config_session.inc.php";
        require_once "user_model.php";



        if (!isset($_SESSION["user"])) {

            header("Location: " . $_SERVER['HTTP_REFERER']);
            die();

        }




        //del_event( $conn,  $idEvento);



        header("Location: " . $_SERVER['HTTP_REFERER']); //?signup=success
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
?>