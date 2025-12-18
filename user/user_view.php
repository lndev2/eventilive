<?php

function display_user_events($events)
{
    ?>

    <table>
        <thead>
            <tr>
                <th>Titolo</th>
                <th>Città</th>
                <th>Luogo</th>
                <th>Data</th>
                <th>Ora</th>
                <th>Provincia</th>
            </tr>
        </thead>

        <?php

        while ($evento = $events->fetch_assoc()) {
            ?>



            <tr class="riga-evento" id="<?php echo $evento["id_evento"] ?>" onclick='modEventoForm( 
                    <?php echo $evento["id_evento"] ?>, 
                    <?php echo json_encode($evento["titolo"], JSON_HEX_QUOT | JSON_HEX_APOS); ?>, 
                    <?php echo json_encode($evento["id_categoria"], JSON_HEX_QUOT | JSON_HEX_APOS); ?>,
                    <?php echo json_encode($evento["città"], JSON_HEX_QUOT | JSON_HEX_APOS); ?>,
                    <?php echo json_encode($evento["luogo"], JSON_HEX_QUOT | JSON_HEX_APOS); ?>,
                    <?php echo json_encode($evento["provincia"], JSON_HEX_QUOT | JSON_HEX_APOS); ?>, 
                    <?php echo json_encode($evento["data_inizio"], JSON_HEX_QUOT | JSON_HEX_APOS); ?>,
                    <?php echo json_encode($evento["ora"], JSON_HEX_QUOT | JSON_HEX_APOS); ?>,
                    <?php echo json_encode($evento["descrizione"], JSON_HEX_QUOT | JSON_HEX_APOS); ?> )'>
                <td><a
                        href="../desc_evento/desc_evento_contr.php?idEvento=<?php echo $evento['id_evento'] ?>"><?php echo $evento['titolo'] ?></a>
                </td>
                <td><?php echo $evento['città'] ?></td>
                <td><?php echo $evento['luogo'] ?></td>
                <td><?php echo $evento['data_inizio'] ?></td>
                <td><?php echo $evento['ora'] ?></td>
                <td><?php echo $evento['provincia'] ?></td>

            </tr>


            <?php

        }

        echo '</table>';
}


function display_subs(array $subs)
{

    ?>
        <form class="categories-form" action="iscrizioni_contr.php" method="POST">


            <input type="checkbox" id="c1" name="categorie[]" value="1" <?php echo is_subscribed($subs, 1) ?>>
            <label for="c1">Concerti</label><br>
            <input type="checkbox" id="c2" name="categorie[]" value="2" <?php echo is_subscribed($subs, 2) ?>>
            <label for="c2">Teatro</label><br>
            <input type="checkbox" id="c3" name="categorie[]" value="3" <?php echo is_subscribed($subs, 3) ?>>
            <label for="c3">Ballo</label><br>
            <input type="checkbox" id="c4" name="categorie[]" value="4" <?php echo is_subscribed($subs, 4) ?>>
            <label for="c4">Conferenze</label><br>
            <input type="checkbox" id="c5" name="categorie[]" value="5" <?php echo is_subscribed($subs, 5) ?>>
            <label for="c5">Gastronomia</label><br><br>

            <button type="submit" name="iscrizioni" value="invioIscrizioni">Aggiorna Iscrizioni</button>

        </form>
        <?php
}