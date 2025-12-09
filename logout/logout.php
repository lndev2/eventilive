<?php
session_start();
session_unset();        // Cancella tutte le variabili di sessione
session_destroy();      // Distrugge la sessione sul server

header("Location: ../home/index.php");