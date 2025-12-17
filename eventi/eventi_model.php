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


function retrieves_events_by_prov(object $conn, string $idCategoria, string $provincia)
{

    $sql = 'SELECT titolo, città, data_inizio , id_evento, immagine FROM eventi WHERE eventi.id_categoria = ? AND eventi.provincia = ? ORDER BY data_inizio ASC ';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $idCategoria, $provincia);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result;
}