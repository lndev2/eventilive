<?php

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);


//funzione che accetta un array nel parametro

session_set_cookie_params([
    'lifetime' => 1800,
    /*     'domain' => '', //dominio dove il cookie dovrebbe funzionare
        'path' => '', //tutti i percorsi dentro questo dominio */
    'secure' => true, //HTTPS
    'httponly' => true // non permette di cambiare questo cookie con uno script
]);

session_start();


if (!isset($_SESSION["last_regeneration"])) {
    regenerate_session_id();

} else {
    $interval = 60 * 30;

    if (time() - $_SESSION["last_regeneration"] >= $interval) {
        regenerate_session_id();


    }
}


function regenerate_session_id()
{
    session_regenerate_id();
    $_SESSION["last_regeneration"] = time();
}


?>