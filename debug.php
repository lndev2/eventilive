<?php

//     /opt/lampp/bin/php debug.php

require "connessione.php";
require "login/login_model.inc.php";
require "user/user_model.php";
require "desc_evento/desc_evento_model.php";
require "user/inser_evento_model.php";

print_r(insert_event($conn,1,'Festa della Cipolla',5,'Cannara','Cannara','PG','2025/09/01','15:00', 'se magna'));

?>



