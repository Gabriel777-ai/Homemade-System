<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<style>
/* Color of the links BEFORE scroll */
.navbar-scroll .nav-link,
.navbar-scroll .navbar-toggler-icon,
.navbar-scroll .navbar-brand {
  color: #262626;
}

/* Color of the navbar BEFORE scroll */
.navbar-scroll {
  background-color: #FFC017;
}

/* Color of the links AFTER scroll */
.navbar-scrolled .nav-link,
.navbar-scrolled .navbar-toggler-icon,
.navbar-scroll .navbar-brand {
  color: #262626;
}

/* Color of the navbar AFTER scroll */
.navbar-scrolled {
  background-color: #fff;
}

/* An optional height of the navbar AFTER scroll */
.navbar.navbar-scroll.navbar-scrolled {
  padding-top: auto;
  padding-bottom: auto;
}
.navbar-brand {
  font-size: unset;
  height: 3.5rem;
}
</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
    <a class="navbar-brand" href="#"><i class="fab fa-linkedin fa-2x"></i></a>
    <!-- Search form -->
    <form class="input-group" style="width: 400px">
      <input type="search" class="form-control" placeholder="Thoughts?" aria-label="Search" />
      <button class="btn btn-outline-primary" type="button" data-mdb-ripple-init data-mdb-ripple-color="dark" style="padding: .45rem 1.5rem .35rem;">
        Search
      </button>
    </form>

    <!-- Toggle button -->
    <button class="navbar-toggler" type="button" data-mdb-collapse-init
      data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
      aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left links -->
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link d-flex flex-column text-center active" aria-current="page" href="<?= BASE_URL ?>/home/"><i class="fas fa-home fa-lg my-2"></i><span class="small">Home</span></a>
        </li>
        <?php
          require_once __DIR__ . '/../../config-helper.php';
          if (isset(config('role')[$role])) {
            foreach (config('role')[$role] as $buttonLabel => $fileLocation) {
              ?>
                <li class="nav-item">
                  <a class="nav-link d-flex flex-column text-center active" aria-current="page" href="<?= $fileLocation ?>"><i class="fas fa-home fa-lg my-2"></i><span class="small"><?= $buttonLabel ?></span></a>
                </li>
              <?php
            }
          }
        ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-dropdown-init aria-expanded="false">
            <?php
              switch($gender){
                case 'm': $pfp = BASE_URL . "/home/images/pfp-m.jpg"; break;
                case 'f': $pfp = BASE_URL . "/home/images/pfp-f.jpg"; break;
                case 'o': $pfp = BASE_URL . "/home/images/pfp-lgbtq.jpg"; break;
              }
            ?>
            <img src="<?= $pfp ?>" class="rounded-circle" onclick="visible('personalActions');" height="30" alt="" loading="lazy"/>
            <ul class="dropdown-menu" id="personalActions" aria-labelledby="navbarDropdownMenuLink">
              <li>
                <form action='<?= BASE_URL ?>home/users/view-account.php' method='POST'>
                  <input type='hidden' name='user_id' value="<?= $user_id ?>">
                  <a href="#" onclick="this.closest('form').submit();" class="dropdown-item">My Profile</a>
                </form>
              </li>
              <li>
                <form action="<?= BASE_URL ?>/home" method="POST">
                  <a href="#" onclick="this.closest('form').submit();" class="dropdown-item">Settings</a>
                </form>
              </li>
              <li>
                <form action="<?= BASE_URL ?>/home/process_logout.php" method="POST">
                  <a href="#" onclick="this.closest('form').submit();" class="dropdown-item">Log Out</a>
                </form>
              </li>
            </ul>
          </a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->

<script src="<?= BASE_URL ?>vendor/bootstrap/bootstrap.bundle.min.js"></script>
<script src="<?= BASE_URL ?>main.js"></script>