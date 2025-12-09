

<?php

function display_event_desc(object $result)
{

    

    if ($result->num_rows > 0) {


        //il risultato è solo 1 NO WHILE
        $row = $result->fetch_row();

            //echo '<div class="evento" style="background-image: url(' . $row["immagine"] . ');">';
            
            $immagine = $row[9];
            
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
            echo '<p>' . $row[8] . '</p><br>';
            echo '</div>';

            echo '<div class="img" style="background-image: url(\'' . $immagine . '\');"></div>';

            echo '</div>';
            
        
    } else {
        echo "0 risultati";
    }

    
}