<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Collection";
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
    <i class="bi bi-cash-stack me-2"></i>Collection
  </h2>

  <table class="table table-bordered table-hover shadow-sm bg-white">
    <thead class="table-light">
      <tr>
        <th>Patient</th>
        <th>Amount</th>
        <th>Method</th>
        <th>Date</th>
        <?php if ($role === 'admin'): ?>
          <th>Actions</th>
        <?php endif; ?>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Lucia Reyes</td>
        <td>₱1,500</td>
        <td>Cash</td>
        <td>2025-05-16</td>
        <?php if ($role === 'admin'): ?>
          <td><button class="btn btn-outline-secondary btn-sm"><i class="bi bi-receipt"></i> View Receipt</button></td>
        <?php endif; ?>
      </tr>
      <tr>
        <td>Jomar Dizon</td>
        <td>₱2,000</td>
        <td>Card</td>
        <td>2025-05-17</td>
        <?php if ($role === 'admin'): ?>
          <td><button class="btn btn-outline-secondary btn-sm"><i class="bi bi-receipt"></i> View Receipt</button></td>
        <?php endif; ?>
      </tr>
    </tbody>
  </table>
</div>




    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>