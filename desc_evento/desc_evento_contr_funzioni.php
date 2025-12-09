<?php

function get_event_desc(object $conn, string $idEvento){

    
    
    $result = retrieves_event_desc($conn,$idEvento);
    return $result;


}
