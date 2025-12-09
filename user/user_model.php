<?php

declare(strict_types=1);

function get_user_events( mysqli $mysqli, string $id_utente): mixed
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




