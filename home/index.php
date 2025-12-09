<?php

require '../partials/navbar.php';
require 'home.contr.php';
?>


<!DOCTYPE html>
<html lang="italiano">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eventi</title>
  <link rel="stylesheet" href="../style/index.css">
  <link rel="stylesheet" href="../style/navbar.css">
</head>

<body>


  <?php renderNavbar($user); ?>
  <div class="content">
    <div class="background" id="backgound">
      <h1 class="h1">EventILive</h1>

      <div class="grid-container">

        <a href="../eventi/eventi_contr.php?categoria=1" class="grid-item concerti">
          <span class="titolo">Concerti</span>
        </a>

        <a href="../eventi/eventi_contr.php?categoria=2" class="grid-item teatro">
          <span class="titolo">Teatro</span>
        </a>

        <a href="../eventi/eventi_contr.php?categoria=3" class="grid-item ballo">
          <span class="titolo">Ballo</span>
        </a>

        <a href="../eventi/eventi_contr.php?categoria=4" class="grid-item conferenze">
          <span class="titolo">Conferenze</span>
        </a>

        <a href="../eventi/eventi_contr.php?categoria=5" class="grid-item gastronomia">
          <span class="titolo">Gastronomia</span>
        </a>

      </div>
    </div>
  </div>

  <?php renderTrailer($user) ?>


</body>

</html>