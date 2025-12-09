<?php
require "../partials/navbar.php";
require "user_view.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/navbar.css">
</head>

<body>
    <div class="content">

        <?php renderNavbar($user) ?>
        <h1>Area personale <?php echo $user["nickname"] ?></h1>
        <br><br>

        <p>Eventi Inseriti</p>
        <?php display_user_events($result) ?>
    </div>

    <?php renderTrailer($user) ?>

</body>

</html>