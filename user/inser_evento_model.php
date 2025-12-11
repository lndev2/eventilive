<?php

function insert_event(object $conn, string $userId, string $titolo, string $categoria, string $città, string $luogo, string $provincia, string $data, string $ora, string $descrizione)
{

    $sql = "INSERT INTO eventi (id_utente, titolo, id_categoria, città, luogo, provincia, data_inizio, ora, descrizione) VALUES
    (?,?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isissssss", $userId, $titolo, $categoria, $città, $luogo, $provincia, $data, $ora, $descrizione);
    $stmt->execute();

}


