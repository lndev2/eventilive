<?php

declare(strict_types=1);

function get_user($mysqli, $username): mixed {
    $query = "SELECT * FROM utenti WHERE nickname = ?"; // Placeholder for prepared statement
    $stmt = $mysqli->prepare($query);

    // Bind parameters
    $stmt->bind_param("s", $username); // "s" indicates the type is string
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();
    $user = $result->fetch_assoc(); // Fetch as an associative array
    return $user;
}


