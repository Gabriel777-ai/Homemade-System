<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Document Tracking System(Approval)";
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
  <h2 class="text-primary mb-4"><i class="bi bi-file-earmark-text-fill me-2"></i>Pending Approvals</h2>

  <div class="list-group shadow-sm rounded">
    <div class="list-group-item d-flex justify-content-between align-items-center">
      <div>
        <h6 class="mb-1"><i class="bi bi-file-earmark-check-fill text-warning me-2"></i>PO#00123</h6>
        <small class="text-muted">Awaiting approval from <strong>Finance Department</strong></small>
      </div>
      <span class="badge bg-warning text-dark">Pending</span>
    </div>

    <div class="list-group-item d-flex justify-content-between align-items-center">
      <div>
        <h6 class="mb-1"><i class="bi bi-file-earmark-check-fill text-info me-2"></i>Memo#998</h6>
        <small class="text-muted">Awaiting approval from <strong>HR Department</strong></small>
      </div>
      <span class="badge bg-info text-dark">Pending</span>
    </div>

    <div class="list-group-item d-flex justify-content-between align-items-center">
      <div>
        <h6 class="mb-1"><i class="bi bi-file-earmark-check-fill text-secondary me-2"></i>DR#0420</h6>
        <small class="text-muted">Awaiting approval from <strong>Logistics Head</strong></small>
      </div>
      <span class="badge bg-secondary">In Review</span>
    </div>
  </div>
</div>





    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>