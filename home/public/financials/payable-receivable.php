<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Accounts Payable / Accounts Receivables";
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
  <h2 class="mb-4 text-primary">
    <i class="bi bi-currency-dollar me-2"></i>Accounts Payable / Accounts Receivable
  </h2>

  <div class="row g-4">
    <!-- Accounts Payable -->
    <div class="col-md-6">
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <h5 class="card-title text-danger mb-3"><i class="bi bi-box-seam me-2"></i>Accounts Payable</h5>
          <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <span><i class="bi bi-building me-2"></i>Supplier A</span>
              <span class="badge bg-danger rounded-pill fs-6">₱50,000</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <span><i class="bi bi-building me-2"></i>Supplier B</span>
              <span class="badge bg-danger rounded-pill fs-6">₱25,000</span>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Accounts Receivable -->
    <div class="col-md-6">
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <h5 class="card-title text-success mb-3"><i class="bi bi-person-lines-fill me-2"></i>Accounts Receivable</h5>
          <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <span><i class="bi bi-person-circle me-2"></i>Client X</span>
              <span class="badge bg-success rounded-pill fs-6">₱75,000</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <span><i class="bi bi-person-circle me-2"></i>Client Y</span>
              <span class="badge bg-success rounded-pill fs-6">₱30,000</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>





    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>