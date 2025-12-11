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
    <link rel="stylesheet" href="../style/user_tab.css">
</head>

<body>
    <div class="content">

        <?php renderNavbar($user) ?>
        <h1>Area personale <?php echo $user["nickname"] ?></h1>
        <br><br>


        <!-- Tab links -->
        <div class="tab">
            <button class="tablinks" onclick="changeTab(event, 'eventiInseriti')">Eventi Inseriti</button>
            <button class="tablinks" onclick="changeTab(event, 'inserisciEvento')">Inserisci Evento</button>
            <button class="tablinks" onclick="changeTab(event, 'visualizzaIscrizioni')">Visualizza Iscrizioni</button>
        </div>

        <!-- Tab content -->
        <div id="eventiInseriti" class="tabcontent">
            <p>Eventi Inseriti</p>
            <?php display_user_events($result) ?>
        </div>

        <div id="inserisciEvento" class="tabcontent">
            <p>Inserisci Evento</p>
            <form></form>
        </div>

        <div id="visualizzaIscrizioni" class="tabcontent">
            <p>Iscrizioni Effettuate</p>
        </div>





        <script src="tab.js"></script>
    </div>

    <?php renderTrailer($user) ?>


</body>

</html>