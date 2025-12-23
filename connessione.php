<?php


class Database
{

    private static function connect(string $profile): mysqli
    {
        $cfg = require __DIR__ . "/config/db_$profile.php";

        $conn = new mysqli($cfg['host'], $cfg['user'], $cfg['pass'], $cfg['db']);

        if (mysqli_connect_errno()) {

            //echo "Connessione fallita: ". $profile . $conn->connect_error;
        } else {
            //echo "connessione riuscita: " . $profile;
        }

        return $conn;
    }

    public static function guest(): mysqli
    {
        return self::connect('guest');
    }

    public static function user(): mysqli
    {
        return self::connect('user');
    }
}





?>