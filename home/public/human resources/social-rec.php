<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Social Recognition";
require_once __DIR__ . '../../../components/head.inc.php'; ?>
<body>
    <?php require_once __DIR__ . '../../../components/nav-bar.inc.php'; ?>

    <div class="container mt-5">
  <h2 class="mb-4"><i class="bi bi-stars me-2"></i>Employee Shoutouts</h2>

  <div class="card shadow-sm border-0 mb-3">
    <div class="card-body d-flex align-items-start">
      <i class="bi bi-award text-success fs-4 me-3"></i>
      <div>
        <h6 class="mb-1 fw-bold">Jane Dela Cruz</h6>
        <p class="mb-0 text-muted">🎉 Resolved <strong>50+ tickets</strong> this week!</p>
        <span class="badge bg-success mt-1">Support Excellence</span>
      </div>
    </div>
  </div>

  <div class="card shadow-sm border-0 mb-3">
    <div class="card-body d-flex align-items-start">
      <i class="bi bi-people text-primary fs-4 me-3"></i>
      <div>
        <h6 class="mb-1 fw-bold">Tom Navarro</h6>
        <p class="mb-0 text-muted">🙌 Organized an amazing <strong>team event</strong>!</p>
        <span class="badge bg-primary mt-1">Team Spirit</span>
      </div>
    </div>
  </div>
</div>




    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>