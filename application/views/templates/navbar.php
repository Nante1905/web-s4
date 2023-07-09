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
      <!-- toogle -->
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php if($metadata['active'] == 'Home') { echo( 'active'); } ?>" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($metadata['active'] == 'Features') { echo( 'active'); } ?> " href="#">Features</a>
        </li>
        <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-mdb-toggle="dropdown"
              aria-expanded="false"
            >
              Dropdown
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item" href="#">Action</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Another action</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Something else here</a>
              </li>
            </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
      </ul>
    </div>
  </div>
</nav>