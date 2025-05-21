<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Warehousing";
require_once __DIR__ . '../../../components/head.inc.php'; ?>
<body>
    <?php require_once __DIR__ . '../../../components/nav-bar.inc.php'; ?>

    <?php

$canView = in_array($role, ['admin', 'employee']);

if (!$canView) {
    require_once __DIR__ . '../../../components/restricted.inc.php';
    exit;
}
?>

<div class="container mt-5">
  <h2 class="text-success mb-3">Warehousing</h2>
  <p class="text-muted">Overview of storage locations and inventory counts.</p>

  <div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
      <div class="card shadow-sm border-success h-100">
        <div class="card-body">
          <h5 class="card-title"><i class="bi bi-box-seam me-2"></i>Main Warehouse</h5>
          <p class="card-text">Current Inventory: <span class="fw-bold">1,234 Items</span></p>
          <div class="progress" style="height: 6px;">
            <div class="progress-bar bg-success" role="progressbar" style="width: 75%;" aria-valuenow="1234" aria-valuemin="0" aria-valuemax="1500"></div>
          </div>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card shadow-sm border-primary h-100">
        <div class="card-body">
          <h5 class="card-title"><i class="bi bi-building me-2"></i>East Storage</h5>
          <p class="card-text">Current Inventory: <span class="fw-bold">830 Items</span></p>
          <div class="progress" style="height: 6px;">
            <div class="progress-bar bg-primary" role="progressbar" style="width: 55%;" aria-valuenow="830" aria-valuemin="0" aria-valuemax="1500"></div>
          </div>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card shadow-sm border-info h-100">
        <div class="card-body">
          <h5 class="card-title"><i class="bi bi-snow me-2"></i>Cold Storage</h5>
          <p class="card-text">Current Inventory: <span class="fw-bold">550 Items</span></p>
          <div class="progress" style="height: 6px;">
            <div class="progress-bar bg-info" role="progressbar" style="width: 37%;" aria-valuenow="550" aria-valuemin="0" aria-valuemax="1500"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>





    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>