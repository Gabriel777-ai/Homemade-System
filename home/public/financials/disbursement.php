<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Disbursement";
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
  <h2 class="mb-4 text-success"><i class="bi bi-cash-coin me-2"></i>Disbursement Overview</h2>

  <div class="card shadow-sm border-0">
    <div class="card-body">
      <table class="table table-striped table-hover align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th>Date</th>
            <th>Amount</th>
            <th>Purpose</th>
            <th>Status</th>
            <?php if ($role === 'admin'): ?>
              <th>Actions</th>
            <?php endif; ?>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>2025-05-10</td>
            <td><strong class="text-success">₱100,000</strong></td>
            <td>Equipment Purchase</td>
            <td><span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Approved</span></td>
            <?php if ($role === 'admin'): ?>
              <td><button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil-square"></i> Edit</button></td>
            <?php endif; ?>
          </tr>
          <tr>
            <td>2025-05-15</td>
            <td><strong class="text-warning">₱25,000</strong></td>
            <td>Maintenance</td>
            <td><span class="badge bg-warning text-dark"><i class="bi bi-hourglass-split me-1"></i>Pending</span></td>
            <?php if ($role === 'admin'): ?>
              <td><button class="btn btn-sm btn-outline-success"><i class="bi bi-check2-circle"></i> Approve</button></td>
            <?php endif; ?>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>




    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>