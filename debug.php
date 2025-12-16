<?php

//     /opt/lampp/bin/php debug.php

require "connessione.php";
require "desc_evento/desc_evento_model.php";
require "desc_evento/desc_evento_contr_funzioni.php";
//print_r(retrives_user_post( $conn,  1,  1));
print_r(del_comment($conn,1,1));




