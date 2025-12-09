<?php

function display_user_events($events)
{

    echo '<table>
        <thead>
        <tr>
        <th>Titolo</th>
        <th>Città</th>
        <th>Luogo</th>
        <th>Data</th>
        <th>Ora</th>
        <th>Provincia</th>
        </tr>
        </thead>';



    while ($evento = $events->fetch_assoc()) {

        echo '<tr>';
        ?>

        <td><a href="../desc_evento/desc_evento_contr.php?idEvento=<?php echo $evento['id_evento'] ?>"><?php echo $evento['titolo'] ?></a></td>

        <?php
        echo '<td>' . $evento['città'] . '</td>';
        echo '<td>' . $evento['luogo'] . '</td>';
        echo '<td>' . $evento['data_inizio'] . '</td>';
        echo '<td>' . $evento['ora'] . '</td>';
        echo '<td>' . $evento['provincia'] . '</td>';
        echo '</tr>';

    }

    echo '</table>';
}