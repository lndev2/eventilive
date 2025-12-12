<?php

declare(strict_types=1);

function get_user_events(mysqli $mysqli, string $id_utente): mixed
{
    $query = "SELECT id_evento, titolo, città, luogo, data_inizio, ora, provincia, immagine
    FROM eventi 
    WHERE id_utente = ?"; // Placeholder for prepared statement
    $stmt = $mysqli->prepare($query);

    // Bind parameters
    $stmt->bind_param("s", $id_utente); // "s" indicates the type is string
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();
    $stmt->close();

    return $result;
}




function insert_event(object $conn, string $userId, string $titolo, string $categoria, string $città, string $luogo, string $provincia, string $data, string $ora, string $descrizione)
{

    $sql = "INSERT INTO eventi (id_utente, titolo, id_categoria, città, luogo, provincia, data_inizio, ora, descrizione) VALUES
    (?,?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isissssss", $userId, $titolo, $categoria, $città, $luogo, $provincia, $data, $ora, $descrizione);
    $stmt->execute();

}





function del_event(object $conn, string $idEvento): void
{

    $sql = "DELETE FROM eventi WHERE id_evento = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idEvento);
    $stmt->execute();

}