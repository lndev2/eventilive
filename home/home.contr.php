
<?php

require_once '../config_session.inc.php';
require_once '../connessione.php';

if (isset($_SESSION["user"])) {

    $user = $_SESSION['user'];
    $conn = Database::user();

} else {

    $user = null;
    $conn = Database::guest();
    
}


