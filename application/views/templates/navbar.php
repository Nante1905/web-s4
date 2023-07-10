<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
        <strong>Nom App</strong>
    </a>
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarText"
      aria-controls="navbarText"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars nav__i "></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php if($metadata['active'] == 'Accueil') { echo( 'active-link'); } ?>" aria-current="page" href="<?= base_url() ?>index.php/welcome/accueil">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($metadata['active'] == 'Mes Objectifs') { echo( 'active-link'); } ?> " href="<?= base_url() ?>index.php/mesobjectifs">Mes Objectifs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($metadata['active'] == 'Profil') { echo( 'active-link'); } ?> " href="#">Profil</a>
        </li>
        <li class="nav-item" >
          <a href="" class="nav-link">
            <i class="fa-solid fa-wallet" style="color: #1f5125;"></i>
            <span>15k</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
