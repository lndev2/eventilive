<?php

require_once '../config_session.inc.php';
require_once 'signup_view.php';
require_once '../login/login_view.inc.php';
require_once '../partials/navbar.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/navbar.css">
    <link rel="stylesheet" href="../style/signup_page.css">
    <title>Document</title>
</head>

<body>

    <?php renderNavbar($user); ?>
    <div class="content">



        <div class="container">

            <h3>login</h3><br>
            <form action="../login/login_contr.php" method="post">

                <fieldset>

                    <input type="text" name="username" placeholder="Username"><br>
                    <input type="password" name="pwd" placeholder="Password"><br><br>

                    <button>Login</button>

                    <?php check_login_errors(); ?>

                </fieldset>
            </form>
        </div>

        <div class="container">

            <h3>Signup</h3><br>
            <form action="signup_contr.php" method="POST">


                <fieldset>

                    <?php signup_inputs() ?>
                    <br>
                    <br>
                    <button>Signup</button>

                    <?php check_signup_errors() ?>
                </fieldset>
            </form>
        </div>
    </div>

</body>

</html>