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
            <form>
                <fieldset>

                    <label for="titolo">Titolo</label><br>
                    <input type="text" name="titolo" required></input><br><br>


                    <label for="select">Categoria</label><br>
                    <select id="select" name="select" required>
                        <option value="1">Concerti</option>
                        <option value="2">Teatro</option>
                        <option value="3">Ballo</option>
                        <option value="4">Conferenze</option>
                        <option value="5">Gastronomia</option>
                    </select><br><br>

                    <label for="città">Città</label><br>
                    <input type="text" name="città" required></input><br><br>

                    <label for="luogo">Luogo</label><br>
                    <input type="text" name="Luogo" required></input><br><br>

                    <label for="provincia">Provincia</label><br>
                    <input type="text" name="provincia" required></input><br><br>

                    <label for="ora">Data</label><br>
                    <input type="text" name="Luogo" required></input><br><br>

                    <label for="descrizione">Descrizione</label><br>
                    <textarea type="textarea" name="descrizione" rows="4" cols="50" required></textarea><br><br>

                    <label for="immagine">Carica Immagine:</label>
                    <input type="file"  name="immagine"><br><br>

                    <button type="submit">Invia</button>

                </fieldset>
            </form>
        </div>

        <div id="visualizzaIscrizioni" class="tabcontent">
            <p>Iscrizioni Effettuate</p>
        </div>





        <script src="tab.js"></script>
    </div>

    <?php renderTrailer($user) ?>


</body>

</html>