<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "General Ledger";
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
    <i class="bi bi-journal-text me-2"></i>General Ledger
  </h2>

  <div class="card shadow-sm border-0">
    <div class="card-body">
      <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <div>
            <i class="bi bi-arrow-down-circle-fill text-danger me-2"></i>
            <strong>Debit</strong> — Equipment Expense
          </div>
          <span class="badge bg-danger rounded-pill fs-6">₱300,000</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <div>
            <i class="bi bi-arrow-up-circle-fill text-success me-2"></i>
            <strong>Credit</strong> — Insurance Claims
          </div>
          <span class="badge bg-success rounded-pill fs-6">₱150,000</span>
        </li>
      </ul>
    </div>
  </div>
</div>





    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>