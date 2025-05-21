<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Asset Management";
require_once __DIR__ . '../../../components/head.inc.php'; ?>
<body>
    <?php require_once __DIR__ . '../../../components/nav-bar.inc.php'; ?>

    <div class="container mt-5">
  <h2 class="mb-4"><i class="bi bi-hdd-stack me-2"></i>Company Assets</h2>
  <ul class="list-group">
    <li class="list-group-item d-flex justify-content-between align-items-center">
      Desktop PC - IT Dept
      <span class="text-muted small">SN# 12345678</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
      Projector - Meeting Room
      <span class="text-muted small">SN# 87654321</span>
    </li>
  </ul>
</div>




    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>