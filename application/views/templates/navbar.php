<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
        <strong>Regime</strong>
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
            <?php if(isset($isGold) && $isGold == true) { ?>
              <a class="nav-link">
                <span class="badge rounded-pill badge-gold">
                  Option gold
                </span>
              </a>
            <?php } else { ?>
              <a href="<?= site_url('profil/gold') ?>" class="nav-link">
                <span class="badge rounded-pill badge-gold">
                  Passez en gold
                </span>
              </a>
            <?php }?>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($metadata['active'] == 'Accueil') { echo( 'active-link'); } ?>" aria-current="page" href="<?= base_url() ?>index.php/welcome/accueil">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($metadata['active'] == 'Mes Objectifs') { echo( 'active-link'); } ?> " href="<?= base_url() ?>index.php/mesobjectifs">Mes Objectifs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($metadata['active'] == 'Profil') { echo( 'active-link'); } ?> " href="<?= base_url() ?>index.php/profil">Profil</a>
        </li>
        <li class="nav-item">
          <?= anchor("user/logout", "<i class='fas fa-sign-out fa-fw me-3'></i>", ['class' => "nav-link"]) ?>
        </li>
      </ul>
    </div>
  </div>
</nav>
