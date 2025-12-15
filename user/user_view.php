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



            <tr>
                <td><a
                        href="../desc_evento/desc_evento_contr.php?idEvento=<?php echo $evento['id_evento'] ?>"><?php echo $evento['titolo'] ?></a>
                </td>
                <td><?php echo $evento['città'] ?></td>
                <td><?php echo $evento['luogo'] ?></td>
                <td><?php echo $evento['data_inizio'] ?></td>
                <td><?php echo $evento['ora'] ?></td>
                <td><?php echo $evento['provincia'] ?></td>
                <td>
                    <form action="del_evento_contr.php" method="POST" onsubmit="return confermaEliminazione()">
                        <button type="submit" name="elimina" value="<?php echo $evento['id_evento'] ?> ">Elimina</button>
                    </form>
                </td>
                <td>
                    <button
                    
                    onclick='modEventoForm( 
                    <?php echo $evento["id_evento"] ?>, 
                    <?php echo json_encode($evento["titolo"], JSON_HEX_QUOT | JSON_HEX_APOS); ?>, 
                    <?php echo json_encode($evento["id_categoria"], JSON_HEX_QUOT | JSON_HEX_APOS); ?>,
                    <?php echo json_encode($evento["città"], JSON_HEX_QUOT | JSON_HEX_APOS); ?>,
                    <?php echo json_encode($evento["luogo"], JSON_HEX_QUOT | JSON_HEX_APOS); ?>,
                    <?php echo json_encode($evento["provincia"], JSON_HEX_QUOT | JSON_HEX_APOS); ?>, 
                    <?php echo json_encode($evento["data_inizio"], JSON_HEX_QUOT | JSON_HEX_APOS); ?>,
                    <?php echo json_encode($evento["ora"], JSON_HEX_QUOT | JSON_HEX_APOS); ?>,
                    <?php echo json_encode($evento["descrizione"], JSON_HEX_QUOT | JSON_HEX_APOS); ?> )'>Modifica</button>
                </td>


            </tr>

            <tr>
                <td colspan="8">
                    <div id="<?php echo $evento['id_evento'] ?>" class="modevento">

                    </div>
                </td>
            </tr>


            <?php

        }

        echo '</table>';
}