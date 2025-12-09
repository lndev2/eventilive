<?php


function retrieves_events(object $conn, string $idCategoria)
{

    $sql = 'SELECT titolo, città, data_inizio , id_evento, immagine FROM eventi WHERE eventi.id_categoria = ? ';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $idCategoria);
    $stmt->execute();
    $result = $stmt->get_result();


    return $result;
}


