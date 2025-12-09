<?php

function retrieves_event_desc(object $conn, string $idEvento)
{

    $sql = 'SELECT titolo, città, luogo, data_inizio, ora, provincia, nome_categoria, nickname, email, immagine FROM eventi AS e
    INNER JOIN categorie AS c ON c.id_categoria = e.id_categoria
    INNER JOIN utenti AS u ON e.id_utente = u.id_utente
    WHERE e.id_evento = ? ';

 

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $idEvento);
    $stmt->execute();
    $result = $stmt->get_result();


    return $result;
}
