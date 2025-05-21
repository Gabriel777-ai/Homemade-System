<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "HMO and Insurance Management";
require_once __DIR__ . '../../../components/head.inc.php'; ?>
<body>
    <?php require_once __DIR__ . '../../../components/nav-bar.inc.php'; ?>

    <?php
$canView = in_array($role, ['admin', 'employee', 'patient']);

if (!$canView) {
    require_once __DIR__ . '../../../components/restricted.inc.php';
    exit;
}
?>

<div class="container mt-5">
  <h2 class="mb-4 text-primary"><i class="bi bi-shield-plus me-2"></i>Insurance Claims</h2>

  <table class="table table-bordered table-hover shadow-sm bg-white align-middle">
    <thead class="table-light">
      <tr>
        <th>Provider</th>
        <th>Claim Amount</th>
        <th>Status</th>
        <th>Last Updated</th>
        <?php if (in_array($role, ['admin', 'employee'])): ?>
          <th>Actions</th>
        <?php endif; ?>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>PhilHealth</td>
        <td>₱5,000</td>
        <td><span class="badge bg-success">Approved</span></td>
        <td>2025-05-15</td>
        <?php if ($role === 'admin'): ?>
          <td>
            <button class="btn btn-outline-secondary btn-sm">
              <i class="bi bi-pencil-square"></i> Modify
            </button>
          </td>
        <?php elseif ($role === 'employee'): ?>
          <td>
            <button class="btn btn-outline-primary btn-sm">
              <i class="bi bi-clipboard-check"></i> Review
            </button>
          </td>
        <?php endif; ?>
      </tr>

      <tr>
        <td>Maxicare</td>
        <td>₱12,000</td>
        <td><span class="badge bg-warning text-dark">Pending Review</span></td>
        <td>2025-05-19</td>
        <?php if ($role === 'admin'): ?>
          <td>
            <button class="btn btn-outline-success btn-sm">
              <i class="bi bi-check-circle"></i> Approve
            </button>
            <button class="btn btn-outline-danger btn-sm">
              <i class="bi bi-x-circle"></i> Deny
            </button>
          </td>
        <?php elseif ($role === 'employee'): ?>
          <td>
            <button class="btn btn-outline-primary btn-sm">
              <i class="bi bi-clipboard-check"></i> Process
            </button>
          </td>
        <?php endif; ?>
      </tr>

      <tr>
        <td>PhilHealth</td>
        <td>₱10,000</td>
        <td><span class="badge bg-warning text-dark">Pending Review</span></td>
        <td>2025-03-20</td>
        <?php if ($role === 'admin'): ?>
          <td>
            <button class="btn btn-outline-success btn-sm">
              <i class="bi bi-check-circle"></i> Approve
            </button>
            <button class="btn btn-outline-danger btn-sm">
              <i class="bi bi-x-circle"></i> Deny
            </button>
          </td>
        <?php elseif ($role === 'employee'): ?>
          <td>
            <button class="btn btn-outline-primary btn-sm">
              <i class="bi bi-clipboard-check"></i> Process
            </button>
          </td>
        <?php endif; ?>
      </tr>

      <tr>
        <td>PhilHealth</td>
        <td>₱50,000</td>
        <td><span class="badge bg-success">Approved</span></td>
        <td>2025-04-09</td>
        <?php if ($role === 'admin'): ?>
          <td>
            <button class="btn btn-outline-secondary btn-sm">
              <i class="bi bi-pencil-square"></i> Modify
            </button>
          </td>
        <?php elseif ($role === 'employee'): ?>
          <td>
            <button class="btn btn-outline-primary btn-sm">
              <i class="bi bi-clipboard-check"></i> Review
            </button>
          </td>
        <?php endif; ?>
      </tr>
    </tbody>
  </table>

  <?php if ($role === 'patient'): ?>
    <div class="alert alert-info mt-4">
      <i class="bi bi-info-circle-fill me-2"></i> You're viewing your submitted insurance claims.
    </div>
  <?php endif; ?>
</div>




    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>