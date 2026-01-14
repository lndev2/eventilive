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
    <link rel="stylesheet" href="../style/main.css">

    </link>
</head>

<body>

    <?php renderNavbar($user); ?>

    <form class="filtra" action="eventi_contr.php" method="GET">

        <br>
        <input  type="text" id="provincia" value="<?php echo $provincia ?>" name="provincia"
            placeholder="filtra per provincia" required>
        <input type="hidden" name="categoria" value="<?php echo $idCategoria ?>">
        <button class="button1" type="submit">Cerca</button>
        <br><br>
    </form>

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