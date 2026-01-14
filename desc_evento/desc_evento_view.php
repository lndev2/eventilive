<?php

function display_event_desc(object $result)
{



    if ($result->num_rows > 0) {


        //il risultato è solo 1 NO WHILE
        $row = $result->fetch_row();

        //echo '<div class="evento" style="background-image: url(' . $row["immagine"] . ');">';

        $immagine = $row[8];

        echo '<div class="container">';



        echo '<div class="descrizione">';
        echo '<h2>' . $row[0] . '</h2><br>';
        echo '<p>' . $row[1] . '</p><br>';
        echo '<p>' . $row[2] . '</p><br>';
        echo '<p>' . $row[3] . '</p><br>';
        echo '<p>' . $row[4] . '</p><br>';
        echo '<p>' . $row[5] . '</p><br>';
        echo '<p>' . $row[6] . '</p><br>';
        echo '<p>' . $row[7] . '</p><br>';
        echo '</div>';

        echo '<div class="img" style="background-image: url(\'' . $immagine . '\');"></div>';

        echo '</div>';


    } else {
        echo "0 risultati";
    }


}

function display_event_posts(object $result)
{


    if ($result->num_rows > 0) {
        ?>


        <div class="commenti">

            <?php
            while ($row = $result->fetch_assoc()) {

                ?>

                <div class="commento">
                    <p class="nickname"><?php echo $row["nickname"] ?></p><br>
                    <p><?php echo $row["commento"] ?></p><br>
                    <p><?php echo "Voto " . $row["voto"] ?></p>
                    <div>



                        <?php
            }
            echo '</div>';


    } else {
        echo "Nessun commento ancora inserito";
    }


}



function display_inserisci_commento(object $conn, ?string $idEvento, ?string $userId)
{



    if (isset($_SESSION['user'])) {


        if (is_post_already_insert($conn, $userId, $idEvento)) {
            ?>


                        <button onclick="formCommento(<?php echo $idEvento ?>,true)">Modifica Commento</button>
                        <div id="form-commento" class="form-commento">
                        </div>


                        <?php
        } else {

            ?>


                        <button onclick="formCommento(<?php echo $idEvento ?>, false)">Inserisci Commento</button>
                        <div id="form-commento" class="form-commento">
                        </div>


                        <?php

        }

    } else {

        echo "Accedi per commentare!";
    }


}

