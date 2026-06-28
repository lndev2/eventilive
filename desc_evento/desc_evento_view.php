<?php

function display_event_desc(object $result)
{



    if ($result->num_rows > 0) {


        //il risultato è solo 1 NO WHILE
        $row = $result->fetch_row();

        //echo '<div class="evento" style="background-image: url(' . $row["immagine"] . ');">';

        $immagine = $row[8];

        echo '<div class="container my-5">';



        echo '<div class="bg-white rounded-4 shadow-lg p-5 border-start border-5" style="border-color:#310650 !important;">';
        echo '<h2 class="mb-3 fw-semibold" style="color:#310650;">' . $row[0] . '</h2><br>';
        echo '<p class="text-dark mb-0">' . $row[1] . '</p><br>';
        echo '<p class="text-dark mb-0">' . $row[2] . '</p><br>';
        echo '<p class="text-dark mb-0">' . $row[3] . '</p><br>';
        echo '<p class="text-dark mb-0">' . $row[4] . '</p><br>';
        echo '<p class="text-dark mb-0">' . $row[5] . '</p><br>';
        echo '<p class="text-dark mb-0">' . $row[6] . '</p><br>';
        echo '<p class="text-dark mb-0">' . $row[7] . '</p><br>';
        echo '</div>';

        echo '<div class="img rounded-4 shadow-sm mt-4" style="background-image: url(\'' . $immagine . '\'); height: 600px; background-size: cover; background-position: center;"></div>';

        echo '</div>';


    } else {
        echo "0 risultati";
    }


}

function display_event_posts(object $result)
{


    if ($result->num_rows > 0) {






        while ($row = $result->fetch_assoc()) {

            ?>

            <div class="card my-3 shadow-sm border-0 rounded-4">

                <div class="card-body p-4">

                    <p class="mb-1 fw-semibold" style="color:#310650;">
                        <?php echo $row["nickname"] ?>
                    </p>

                    <p class="mb-2 text-dark">
                        <?php echo $row["commento"] ?>
                    </p>

                    <p class="mb-0">
                        <span class="badge rounded-pill" style="background:#310650;">
                            Voto <?php echo $row["voto"] ?>
                        </span>
                    </p>

                </div>
            </div>



            <?php
        }





    } else {
        echo '<p class="istruzioni">Nessun commento ancora inserito</p>';
    }


}



function display_inserisci_commento(object $conn, ?string $idEvento, ?string $userId)
{



    if (isset($_SESSION['user'])) {


        if (is_post_already_insert($conn, $userId, $idEvento)) {
            ?>


            <button id="pulsanteCommento" class="button-comment" 
                onclick="formCommento(<?php echo $idEvento ?>,true)">Modifica Commento</button>
            <div id="form-commento" class="form-commento">
            </div>

            <?php
        } else {

            ?>


            <button id="pulsanteCommento" class="button-comment"
                onclick="formCommento(<?php echo $idEvento ?>, false)">Inserisci Commento</button>
            <div id="form-commento" class="form-commento">
            </div>


            <?php

        }

        if (isset($_SESSION["errore_post"])) {

            echo '<p class="descrizione" > ' . $_SESSION["errore_post"] . '</p>';
            unset($_SESSION["errore_post"]);
        }


    } else {

        echo '<p class="text-center text-secondary my-3">';
        echo 'Accedi per commentare!';
        echo '</p>';

    }




}