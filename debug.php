<?php

///opt/lampp/bin/php debug.php

require "connessione.php";
require "login/login_model.inc.php";
require "user/user_model.php";


print_r(get_user_events($conn,1));

?>



