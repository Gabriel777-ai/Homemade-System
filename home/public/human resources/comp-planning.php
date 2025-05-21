<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Compensation Planning and Administration";
require_once __DIR__ . '../../../components/head.inc.php'; ?>
<body>
    <?php require_once __DIR__ . '../../../components/nav-bar.inc.php'; ?>

    <?php
// Define RBAC
$canView = ($role === 'admin'); // Only admin can access this page

if (!$canView) {
  require_once __DIR__ . '../../../components/restricted.inc.php';
  exit;
}
?>

<div class="container mt-5">
  <h2 class="mb-3"><i class="bi bi-cash-stack me-2"></i>Compensation Planning and Administration</h2>
  <p class="text-muted">Overview of proposed annual salary adjustments and bonuses.</p>

  <div class="table-responsive">
    <table class="table table-striped table-hover shadow-sm mt-3">
      <thead class="table-light">
        <tr>
          <th><i class="bi bi-person-circle me-1"></i>Employee</th>
          <th><i class="bi bi-currency-peso me-1"></i>Current Salary</th>
          <th><i class="bi bi-graph-up-arrow me-1"></i>Proposed Increase</th>
          <th><i class="bi bi-pencil-square me-1"></i>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Liza Mendoza</td>
          <td>₱45,000</td>
          <td class="text-success fw-semibold">₱3,000</td>
          <td>
            <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil me-1"></i>Edit</button>
          </td>
        </tr>
        <tr>
          <td>Eric Tan</td>
          <td>₱55,000</td>
          <td class="text-success fw-semibold">₱4,000</td>
          <td>
            <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil me-1"></i>Edit</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="text-end mt-3">
    <button class="btn btn-success">
      <i class="bi bi-plus-circle me-1"></i>Add Adjustment
    </button>
  </div>
</div>





    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>