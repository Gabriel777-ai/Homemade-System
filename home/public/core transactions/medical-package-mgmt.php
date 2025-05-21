<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Medical Package Management";
require_once __DIR__ . '../../../components/head.inc.php'; ?>
<body>
    <?php require_once __DIR__ . '../../../components/nav-bar.inc.php'; ?>

    <div class="container mt-5">
  <h2 class="mb-4 text-primary">
    <i class="bi bi-box-seam me-2"></i>Medical Package Management
  </h2>

  <ul class="list-group shadow-sm">
    <li class="list-group-item">
      <h6 class="mb-1">Basic Checkup</h6>
      <small class="text-muted">Includes: CBC, Urinalysis, Physical Exam</small>
    </li>
    <li class="list-group-item">
      <h6 class="mb-1">Executive Package</h6>
      <small class="text-muted">Includes: Full Labs, ECG, X-Ray, Doctor Consultation</small>
    </li>
  </ul>
</div>




    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>