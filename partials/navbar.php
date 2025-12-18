<?php
function renderNavbar($user = null)
{
  ?>

  <div class="navbar">

    <a class="home" href="../home/index.php">Home</a>

    <!-- se loggato -->
    <?php if ($user): ?>

      <div class="dati-utente">
        <a href="../user/user_contr.php">
          <p class="dati nickname"><?php echo $_SESSION["user"]["nickname"] ?></p>
          <p class="dati">
            <?php echo $_SESSION["user"]["nome"] . " " . $_SESSION["user"]["cognome"] . " " . $_SESSION["user"]["email"] ?></span>
          </p>
        </a>
        <a href="../logout/logout.php">Logout</a>
      </div>


      <!-- non loggato -->
    <?php else: ?>

      <div class="dati-utente">
        <a href="../signup/signup_page.php">LogIn</a>
      </div>

    <?php endif; ?>



  </div>
  <?php
}

function renderTrailer()
{
  ?>

  <div class="navbar trailer">

    <p class="trailer" href="../home/index.php">EventiLive.com</p>

  </div>
  <?php
}