<?php



function display_events(object $result)
{



    if ($result->num_rows > 0) {

        while ($row = $result->fetch_row()) {

            

            $idEvento = $row[3]; 
            $immagine = $row[4];

            
            echo '<div class="grid-item" onclick="window.location.href=\'../desc_evento/desc_evento_contr.php?idEvento=' . $idEvento . '\'">';
            echo '<div class="img" style="background-image: url(\'' . $immagine . '\');">';
            echo '</div>';
            echo '<div class="titolo-evento">';
            echo '<h2>' . $row[0] . '</h2><br>';
            echo '<p>' . $row[1] . '</p><br>';
            echo '<p>' . $row[2] . '</p><br>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "0 risultati";
    }
}
