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


function retrives_posts(object $conn, string $idEvento)
{

    $sql = 'SELECT commento, voto, nickname
    FROM post AS p
    JOIN utenti AS u ON p.id_utente = u.id_utente
    JOIN eventi AS e ON p.id_evento = e.id_evento
    WHERE e.id_evento = ?';

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $idEvento);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result;

}

function insert_comment(object $conn, string $userId, string $idEvento, string $commento, int $voto)
{

    $sql = "INSERT INTO post (id_utente,id_evento,commento,voto) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $userId, $idEvento, $commento, $voto);
    $stmt->execute();

}

function mod_comment(object $conn, string $userId, string $idEvento, string $commento, int $voto)
{
    $sql = "UPDATE post SET commento = ? , voto = ? WHERE id_utente = ? AND id_evento = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siii", $commento, $voto, $userId, $idEvento);
    $stmt->execute();

}

function del_comment(object $conn, string $userId, string $idEvento)
{
    $sql = "DELETE FROM post WHERE id_utente = ? AND id_evento = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $userId, $idEvento);
    $stmt->execute();

}


function retrives_user_post(object $conn, string $userId, string $idEvento)
{

    $sql = "SELECT * FROM post 
            WHERE id_utente = ? AND id_evento = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $userId, $idEvento);
    $stmt->execute();
    $result = $stmt->get_result();
    $post = $result->fetch_assoc();

    return $post;
}