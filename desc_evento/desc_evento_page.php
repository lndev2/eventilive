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

    <div>
    <?php display_event_desc($result)?>
    </div>
    
</body>

<?php
$conn->close();
?>

</html> 