<?php

declare(strict_types=1);

function is_input_empty(string $titolo, string $categoria , string $città, string  $luogo, string $provincia, string $data, string $descrizione){
    if (empty($titolo) || empty($categoria) || empty($città) || empty($luogo) || empty($provincia) || empty($data) || empty($descrizione)){
        return true;
    }else{
        return false;
    }
}


function is_subscribed(array $subs, int $idCategoria){



    for( $i=0; $i < count($subs); $i++){

        if($subs[$i] == $idCategoria){
            return "checked";
        }

    }


    return false;
}


