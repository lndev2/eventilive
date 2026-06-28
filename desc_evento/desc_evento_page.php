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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    </link>
</head>

<body>
    <?php renderNavbar($user); ?>

    <main class="row bg-dark">

        <div class="col-lg-10 custom-sky rounded-4 mx-auto p-4">
            <div>
                <?php display_event_desc($result) ?>
            </div>


            <div id="container-commenti" class="container d-flex flex-column">
                <?php display_inserisci_commento($conn, $idEvento, $userId) ?>
                <?php display_event_posts($post) ?>
            </div>

        </div>

    </main>
    <?php renderTrailer() ?>

    <script src="commento.js"></script>
 
</body>

<?php
$conn->close();
?>



</html>