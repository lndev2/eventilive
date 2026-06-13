<?php
require "desc_evento_view.php";
require '../partials/navbar.php';

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </link>
    <link rel="stylesheet" href="../style/navbar.css">
    <link rel="stylesheet" href="../style/desc_evento.css">
    </link>
</head>

<body>
    <?php renderNavbar($user); ?>

    <main class="content">
        <div>
            <?php display_event_desc($result) ?>
        </div>

        <?php display_inserisci_commento($conn, $idEvento, $userId) ?>
        <?php display_event_posts($post) ?>;

    </main>
    <?php renderTrailer() ?>

    <script src="commento.js"></script>
</body>

<?php
$conn->close();
?>



</html>