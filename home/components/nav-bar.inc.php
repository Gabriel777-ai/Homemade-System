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
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdownNotification" role="button" data-mdb-dropdown-init aria-expanded="false">
            <svg onclick="visible('notificationWindow');" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
              <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6"/>
            </svg>
            <ul class="dropdown-menu" id="notificationWindow" aria-labelledby="navbarNotificationWindow">
              <?php ?>
                <li onclick="visible('notification_')">
                  <div id="notification_">
                    <input type='hidden' name='' value="">
                    <p>Message</p>
                  </div>
                </li>
              <?php ?>
            </ul>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-dropdown-init aria-expanded="false">
            <?php $pfp = BASE_URL . "/home/images/pfp-m.jpg"; ?>
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