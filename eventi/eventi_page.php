<?php

require "eventi_view.php";
require "../partials/navbar.php"

    ?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/eventi.css">
    </link>
    <link rel="stylesheet" href="../style/navbar.css">
    </link>
</head>

<body>

    <?php renderNavbar($user); ?>

    <div class="content">

        <div class="grid-container-eventi">
            <?php display_events($result); ?>
        </div>
    </div>
    <?php renderTrailer() ?>
</body>

<?php
$conn->close();
?>

</html>