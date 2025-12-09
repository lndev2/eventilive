<?php


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    try {

        require_once '../connessione.php';
        require_once 'signup_model.php';
        //view
        require_once 'signup_contr_funzioni.php';


        //ERROR HANDLERS 
        $errors = [];

        if (is_input_empty($username,  $nome,  $cognome,   $pwd,  $email)) {
            $errors["empty_input"] = "Fill in all fields!";
        }
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid email used!";
        }
        if (is_username_taken($conn, $username)) {
            $errors["username_taken"] = "Username already taken!";
        }
        if (is_email_registered($conn, $username)) {
            $errors["email_used"] = "Email already registered!";
        }

        require_once "../config_session.inc.php";

        if ($errors) {

            $_SESSION["errors_signup"] = $errors;

            $signupData = [
                "nome" => $nome,
                "cognome" => $cognome,
                "username" => $username,
                "email" => $email
            ];

            $_SESSION["signup_data"] = $signupData; //$_SESSION["signup_data"] del signup != da $_SESSION['user'] del login

            header("Location: signup_page.php");
            die();
        }

        $_SESSION["errors_signup"] = null;
        $_SESSION["signup_data"] = null;

        create_user( $conn,  $username,  $nome,  $cognome,  $email,  $pwd );

        
        
        header("Location: ../home/index.php?signup=success");
        
        
        $conn = null;
        $stmt = null;
        die();

    } catch (Exception $e) {
        die("Query failed: " . $e->getMessage());
    }


} else { //se il request method non è POST l'utente non è arrivato alla pagina correttamente ...

    


    header("Location: signup_page.php?");
    die(); // interruzione script ...
}
