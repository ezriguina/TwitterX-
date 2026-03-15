<!DOCTYPE html>
<html>
<head>
  <title>Alpicat FC</title>
  <link rel="icon" type="image/png" href="<?= base_url('img/alpicat.png') ?>">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url('css/plantilla.css') ?>">
  <link rel="stylesheet" href="<?= base_url('css/customRed.css') ?>">
  <link rel="stylesheet" href="<?= base_url('css/pager.css') ?>">
</head>
<body class="w3-light-grey">

<?php $socialLinks = get_social_links(); ?>

<div class="w3-top">
  <div class="w3-bar w3-card" style="display: flex; align-items: center; justify-content: space-between; background-color: #000000 !important;">

    <!-- Logo -->
    <a href="/" class="w3-bar-item w3-button w3-padding-large w3-right" style="background-color: #000000 !important;">
      <img src="<?= base_url('img/alpicat.png') ?>" class="logo" alt="Logo">
      <span class="w3-hide-small w3-text-white w3-hover-text-red"><b>ALPICAT FC</b></span>
    </a>

    <!-- LINKS PC -->
    <div class="w3-hide-small" style="display: flex; flex: 1; justify-content: flex-start;">
      <!-- DROPDOWN SOBRE NOSALTRES -->
      <div class="w3-dropdown-hover">
        <button class="w3-button w3-text-white w3-padding-large w3-hover-text-white red-underline" style="background-color: #000000 !important;">
          <i class="fa fa-info-circle"></i> Sobre Nosaltres <i class="fa fa-caret-down"></i>
        </button>
        <div class="w3-dropdown-content w3-bar-block w3-card-4" style="background-color: #000000 !important;">
          <a href="/historia" class="w3-bar-item w3-button w3-text-white w3-hover-text-white red-underline" style="background-color: #000000 !important;">
            <i class="fa fa-history"></i> Història
          </a>
          <a href="/club" class="w3-bar-item w3-button w3-text-white w3-hover-text-white red-underline" style="background-color: #000000 !important;">
            <i class="fa fa-users"></i> Club
          </a>
        </div>
      </div>
      <!-- NOTICIES -->
      <a href="/noticies" class="w3-bar-item w3-text-white w3-button w3-padding-large w3-hover-text-white red-underline" style="background-color: #000000 !important;">
        <i class="fa fa-newspaper"></i> Notícies
      </a>
      <!-- PROGRAMES -->
      <a href="/programes" class="w3-bar-item w3-text-white w3-button w3-padding-large w3-hover-text-white red-underline" style="background-color: #000000 !important;">
        <i class="fa fa-calendar-alt"></i> Programes
      </a>
      <!-- GALERIA -->
      <a href="/galeria" class="w3-bar-item w3-text-white w3-button w3-padding-large w3-hover-text-white red-underline" style="background-color: #000000 !important;">
        <i class="fa fa-images"></i> Galeria
      </a>
      <!-- CONTACTE -->
      <a href="/contacte" class="w3-bar-item w3-text-white w3-button w3-padding-large w3-hover-text-white red-underline" style="background-color: #000000 !important;">
        <i class="fa fa-envelope"></i> Contacte
      </a>
      <a href="/botiga/landing" class="w3-bar-item w3-text-white w3-button w3-padding-large w3-hover-text-white red-underline" style="background-color: #000000 !important;">
        <i class="fa fa-store"></i> Botiga del equip
      </a>
      <!-- ADMIN -->
      <div class="w3-dropdown-hover" style="margin-left: auto;">
        <button class="w3-button w3-text-white w3-padding-large w3-hover-text-white red-underline" style="background-color: #000000 !important;">
          <i class="fa fa-user-circle"></i> Usuari <i class="fa fa-caret-down"></i>
        </button>
        <div class="w3-dropdown-content w3-bar-block w3-card-4" style="background-color: #000000 !important;">
          <?php $session = session(); ?>
          <?php if ($session->get('logged_in')): ?>

            <a href="/admin" class="w3-bar-item w3-button w3-text-white w3-hover-text-white red-underline" style="background-color: #000000 !important;">
              <i class="fa fa-info-circle"></i> Admin
            </a>
            
            <a href="/logout" class="w3-bar-item w3-button w3-text-white w3-hover-text-white red-underline" style="background-color: #000000 !important;">
              <i class="fa fa-sign-in-alt"></i> Tancar sessió
            </a>

          <?php else: ?>

            <a href="/login" class="w3-bar-item w3-button w3-text-white w3-hover-text-white red-underline" style="background-color: #000000 !important;">
              <i class="fa fa-sign-in-alt"></i> Login
            </a>

          <?php endif; ?>
        </div>
      </div>
    </div>

    <!-- Menú mòbil -->
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-text-white w3-hover-red" onclick="toggleMobileMenu()" style="background-color: #000000 !important;">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Menú per a dispositius mòbils -->
<div id="mobileMenu" class="w3-bar-block w3-hide w3-hide-large w3-hide-medium w3-top w3-right" style="margin-top: 70px; background-color: #000000 !important;">
  <div>
    <button onclick="toggleSubmenu()" class="w3-button w3-padding-large w3-block w3-left-align w3-text-white w3-hover-red" style="background-color: #000000 !important;">
      <i class="fa fa-info-circle"></i> Sobre Nosaltres <i class="fa fa-caret-down"></i>
    </button>
    <div id="submenu" class="w3-bar-block w3-hide" style="background-color:rgb(65, 65, 65) !important;">
      <a href="/historia" class="w3-bar-item w3-button w3-text-white w3-hover-black">
        <i class="fa fa-history"></i> Història
      </a>
      <a href="/club" class="w3-bar-item w3-button w3-text-white w3-hover-black">
        <i class="fa fa-users"></i> Club
      </a>
    </div>
  </div>
  <a href="/noticies" class="w3-bar-item w3-button w3-padding-large w3-text-white w3-hover-red" style="background-color: #000000 !important;">
    <i class="fa fa-newspaper"></i> Notícies
  </a>
  <a href="/programes" class="w3-bar-item w3-button w3-padding-large w3-text-white w3-hover-red" style="background-color: #000000 !important;">
    <i class="fa fa-calendar-alt"></i> Programes
  </a>
  <a href="/galeria" class="w3-bar-item w3-button w3-padding-large w3-text-white w3-hover-red" style="background-color: #000000 !important;">
    <i class="fa fa-images"></i> Galeria
  </a>
  <a href="/contacte" class="w3-bar-item w3-button w3-padding-large w3-text-white w3-hover-red" style="background-color: #000000 !important;">
    <i class="fa fa-envelope"></i> Contacte
  </a>
  <a href="/" class="w3-bar-item w3-button w3-padding-large w3-text-white w3-hover-red" style="background-color: #000000 !important;">
    <i class="fa fa-store"></i> Botiga del equip
  </a>
  <div class="w3-dropdown-hover" style="margin-left: auto;">
    <button class="w3-button w3-text-white w3-padding-large w3-hover-text-red" style="background-color: #000000 !important;">
      <i class="fa fa-user-circle"></i> Usuari <i class="fa fa-caret-down"></i>
    </button>
    <div class="w3-dropdown-content w3-bar-block w3-card-4" style="background-color:rgb(65, 65, 65) !important;">
      <?php $session = session(); ?>
      <?php if ($session->get('logged_in')): ?>

        <a href="/admin" class="w3-bar-item w3-button w3-text-white w3-hover-text-red" style="background-color: #000000 !important;">
          <i class="fa fa-info-circle"></i> Admin
        </a>
        
        <a href="/logout" class="w3-bar-item w3-button w3-text-white w3-hover-text-red" style="background-color:rgb(65, 65, 65) !important;">
          <i class="fa fa-sign-in"></i> Tancar sessió
        </a>

      <?php else: ?>

        <a href="/login" class="w3-bar-item w3-button w3-text-white w3-hover-text-red" style="background-color:rgb(65, 65, 65) !important;">
          <i class="fa fa-sign-in-alt"></i> Login
        </a>

      <?php endif; ?>
    </div>
  </div>
</div>

<div class="main-content w3-container w3-padding-64">
  <?php echo $this->renderSection('contingut'); ?>
</div>

<footer class="w3-container w3-padding-top-32" style="background-color: #000000 !important;">
  <div class="w3-row-padding">
    <div class="w3-third">
      <h3 class="w3-border-bottom w3-border-red w3-text-white">ALPICAT FC</h3>
      <p class="w3-text-white">El club esportiu d'Alpicat, compromès amb el desenvolupament esportiu i personal dels nostres jugadors.</p>
      <div class="w3-padding">
        <a href="<?= esc($socialLinks['facebookLink']) ?>" class="w3-button w3-round w3-red w3-margin-bottom w3-hover-black"><i class="fab fa-facebook"></i></a>
        <a href="<?= esc($socialLinks['twitterLink']) ?>" class="w3-button w3-round w3-red w3-margin-bottom w3-hover-black"><i class="fab fa-x"></i></a>
        <a href="<?= esc($socialLinks['instagramLink']) ?>" class="w3-button w3-round w3-red w3-margin-bottom w3-hover-black"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
    <div class="w3-third">
      <h3 class="w3-border-bottom w3-border-red w3-text-white">Enllaços Ràpids</h3>
      <ul class="w3-ul">
        <li><a href="/" class="w3-hover-text-white red-underline w3-text-white">Inici</a></li>
        <li><a href="/noticies" class="w3-hover-text-white red-underline w3-text-white">Notícies</a></li>
        <li><a href="/programes" class="w3-hover-text-white red-underline w3-text-white">Programes</a></li>
        <li><a href="/galeria" class="w3-hover-text-white red-underline w3-text-white">Galeria</a></li>
        <li><a href="/contacte" class="w3-hover-text-white red-underline w3-text-white">Contacte</a></li>
      </ul>
    </div>
    <div class="w3-third">
      <h3 class="w3-border-bottom w3-border-red w3-text-white">Administració</h3>
      <a href="/botiga" class="w3-button w3-block w3-margin-bottom w3-red w3-hover-black"><i class="fa fa-store"></i> Botiga</a>
      <a href="/programes" class="w3-button w3-block w3-margin-bottom w3-white w3-hover-red"><i class="fa fa-external-link-alt"></i> FCF</a>
      <a href="/contacte" class="w3-button w3-block w3-white w3-hover-red"><i class="fa fa-envelope"></i> Contacte Admin</a>
    </div>
  </div>
  <div class="w3-center w3-padding-16">
    <p class="w3-text-white">&copy; <?= date('Y') ?> Alpicat FC. Tots els drets reservats.</p>
  </div>
</footer>

<script>
function toggleMobileMenu() {
  var x = document.getElementById("mobileMenu");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}

function toggleSubmenu() {
  var submenu = document.getElementById("submenu");
  if (submenu.classList.contains("w3-hide")) {
    submenu.classList.remove("w3-hide");
  } else {
    submenu.classList.add("w3-hide");
  }
}
</script>

</body>
</html>