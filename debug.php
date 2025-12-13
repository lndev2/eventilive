<?php

//     /opt/lampp/bin/php debug.php

require "connessione.php";
require "user/user_model.php";

print_r(mod_event($conn,54,'Festa della Rocciata',5,'Cannara','Cannara','PG','2025/09/01','15:00', 'se magna'));

?>



