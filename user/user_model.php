<?php

declare(strict_types=1);

function get_user_events(mysqli $mysqli, string $id_utente): mixed
{
    $query = "SELECT id_evento, titolo, nome_categoria , città, luogo, data_inizio, ora, provincia, immagine, e.id_categoria, descrizione
                FROM eventi AS e
                JOIN categorie AS c ON e.id_categoria = c.id_categoria
                WHERE id_utente = ?;"; // Placeholder for prepared statement
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



function mod_event(object $conn, string $idEvento, string $titolo, string $categoria, string $città, string $luogo, string $provincia, string $data, string $ora, string $descrizione): void
{

    $sql = "UPDATE eventi
SET titolo = ?, id_categoria=?, città = ?, luogo = ?, provincia = ?, data_inizio = ?, ora = ?, descrizione = ?
WHERE id_evento = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sissssssi", $titolo, $categoria, $città, $luogo, $provincia, $data, $ora, $descrizione, $idEvento);
    $stmt->execute();

}


function subscribe(object $conn, string $idUtente, string $idCategoria)
{


    $sql = "INSERT INTO iscrizioni (id_utente, id_categoria)
VALUES (?, ?)
ON DUPLICATE KEY UPDATE id_utente = id_utente;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $idUtente, $idCategoria);
    $stmt->execute();

}


function unsubscribe(object $conn, string $idUtente, string $idCategoria)
{


    $sql = "DELETE FROM iscrizioni WHERE id_utente = ? AND id_categoria =  ? ;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $idUtente, $idCategoria);
    $stmt->execute();

}

function retrives_subs(object $conn, string $idUtente)
{


    $sql = "SELECT id_categoria FROM iscrizioni WHERE id_utente = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idUtente);
    $stmt->execute();

    $result = $stmt->get_result();

    $subs = [];

    while ($row = $result->fetch_row()) {

        $subs[] = $row[0];
    }

    return $subs;
}