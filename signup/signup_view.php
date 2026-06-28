<?php

// Mostrare i dati sul sito

declare(strict_types=1);

function signup_inputs(){

     // Username: ripristinato se presente in sessione e se non c'è errore "username_taken"
    if(isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["error_signup"]["username_taken"])){
        echo '<input type="text" name="username" placeholder="Username" value="'.$_SESSION["signup_data"]["username"] .'"><br>';
    }else{
        echo '<input type="text" name="username" placeholder="Username"><br>';
    }   

    // Nome: ripristina valore precedente se presente in sessione
    if(isset($_SESSION["signup_data"]["nome"])){
        echo '<input type="text" name="nome" placeholder="Nome" value="' . $_SESSION["signup_data"]["nome"].'"><br>';
    }else{
        echo '<input type="text" name="nome" placeholder="Nome"><br>';
    }

     // Cognome: ripristina valore precedente se presente in sessione
    if(isset($_SESSION["signup_data"]["cognome"])){
        echo '<input type="text" name="cognome" placeholder="Cognome" value="' . $_SESSION["signup_data"]["cognome"].'"><br>';
    }else{
        echo '<input type="text" name="cognome" placeholder="Cognome"><br>';
    }

    // Password: non viene mai ripristinata
    echo '<input type="password" name="pwd" placeholder="Password"><br>';


    // Email: ripristina valore solo se non ci sono errori specifici (email usata o non valida)
    if(isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["error_signup"]["email_used"]) && !isset($_SESSION["error_signup"]["invalid_email"])){
        echo '<input type="text" name="email" placeholder="E-Mail" value="'. $_SESSION["signup_data"]["email"].'">';
    }else{
        echo '<input type="text" name="email" placeholder="E-Mail">';
    } 

}

function check_signup_errors(){

    
    if (isset($_SESSION['errors_signup'])){

        
        
        $errors = $_SESSION['errors_signup'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p>' .$error. '</p>';
        }

        unset($_SESSION['errors_signup']);

    }else if (isset($_GET["signup"]) && $_GET["signup"] === "success"){

        echo '<br>';
        echo '<p>Signup success!</p>';

    }
}