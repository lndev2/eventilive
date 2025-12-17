<?php

//     /opt/lampp/bin/php debug.php



require "connessione.php";
require "eventi/eventi_model.php";

$x = retrieves_events_by_prov( $conn,  5,  "PG");

print_r($x);