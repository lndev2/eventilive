<?php

function get_event_desc(object $conn, string $idEvento)
{

    $result = retrieves_event_desc($conn, $idEvento);
    return $result;

}



function is_post_already_insert(object $conn, string $userId, string $idEvento)
{

    if (retrives_user_post($conn, $userId, $idEvento)) {
        return true;
    } else {
        return false;
    }

}