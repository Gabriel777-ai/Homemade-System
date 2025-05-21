<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Claims and Reimbursement";
require_once __DIR__ . '../../../components/head.inc.php'; ?>
<body>
    <?php require_once __DIR__ . '../../../components/nav-bar.inc.php'; ?>

    <?php
// Define RBAC
$canView = in_array($role, ['admin', 'employee']);
$canEdit = ($role === 'admin');

if (!$canView) {
  require_once __DIR__ . '../../../components/restricted.inc.php';
  exit;
}
?>

<div class="container mt-5">
  <h2 class="mb-3"><i class="bi bi-receipt me-2"></i>Claims and Reimbursement</h2>
  <p class="text-muted">Recent reimbursement requests submitted by employees.</p>

  <!-- Reimbursement Card 1 -->
  <div class="card shadow-sm mb-3">
    <div class="card-body">
      <h5 class="card-title"><i class="bi bi-file-earmark-text me-2"></i>Reimbursement #CLM-2025-04</h5>
      <p class="mb-1">PHP 3,500 <small class="text-muted">for Training Materials</small></p>
      <span class="badge bg-warning text-dark">
        <i class="bi bi-hourglass-split me-1"></i>Pending Approval
      </span>
      <?php if ($canEdit): ?>
        <div class="mt-2 text-end">
          <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square me-1"></i>Review</button>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <!-- Reimbursement Card 2 -->
  <div class="card shadow-sm mb-3">
    <div class="card-body">
      <h5 class="card-title"><i class="bi bi-file-earmark-text me-2"></i>Reimbursement #CLM-2025-05</h5>
      <p class="mb-1">PHP 1,200 <small class="text-muted">for Transportation</small></p>
      <span class="badge bg-success">
        <i class="bi bi-check-circle-fill me-1"></i>Approved
      </span>
    </div>
  </div>

  <!-- Add New Reimbursement -->
  <?php if ($canEdit): ?>
    <div class="text-end mt-3">
      <button class="btn btn-success">
        <i class="bi bi-plus-circle me-1"></i>Add New Reimbursement
      </button>
    </div>
  <?php endif; ?>
</div>





    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>