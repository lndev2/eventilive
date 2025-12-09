<?php

//     /opt/lampp/bin/php debug.php

require "connessione.php";
require "login/login_model.inc.php";
require "user/user_model.php";
require "desc_evento/desc_evento_model.php";

print_r(insert_comment($conn,4,1,"evento noioso",2));

?>



