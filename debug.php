<?php

//     /opt/lampp/bin/php debug.php

require "connessione.php";
require "desc_evento/desc_evento_model.php";
require "desc_evento/desc_evento_contr_funzioni.php";
require "user/user_model.php";
require "user/user_contr_funzioni.php";

//print_r(subscribe( $conn,  1,  4));






//print_r(retrives_subs($conn,1));

$subs = [1,2,3];

print_r(is_subscribed($subs,4));