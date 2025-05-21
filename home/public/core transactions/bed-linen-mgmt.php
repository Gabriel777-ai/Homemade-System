<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Bed and Linen Management";
require_once __DIR__ . '../../../components/head.inc.php'; ?>
<body>
    <?php require_once __DIR__ . '../../../components/nav-bar.inc.php'; ?>

    <?php
$canView = in_array($role, ['admin', 'employee', 'doctor']);

if (!$canView) {
    require_once __DIR__ . '../../../components/restricted.inc.php';
    exit;
}
?>

<div class="container mt-5">
  <h2 class="mb-4 text-primary"><i class="bi bi-hospital me-2"></i>Bed and Linen Management</h2>

  <table class="table table-bordered table-hover shadow-sm bg-white align-middle">
    <thead class="table-light">
      <tr>
        <th>Ward</th>
        <th>Bed No.</th>
        <th>Occupancy</th>
        <th>Linen Condition</th>
        <?php if (in_array($role, ['admin', 'employee'])): ?>
          <th>Actions</th>
        <?php endif; ?>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>ICU</td>
        <td>01</td>
        <td><span class="badge bg-danger">Occupied</span></td>
        <td><span class="badge bg-warning text-dark">Needs Change</span></td>
        <?php if (in_array($role, ['admin', 'employee'])): ?>
          <td>
            <?php if ($role === 'admin'): ?>
              <button class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-pencil"></i> Edit
              </button>
            <?php endif; ?>
            <button class="btn btn-outline-success btn-sm">
              <i class="bi bi-check-circle"></i> Mark Fresh
            </button>
          </td>
        <?php endif; ?>
      </tr>

      <tr>
        <td>General</td>
        <td>12</td>
        <td><span class="badge bg-success">Vacant</span></td>
        <td><span class="badge bg-success">Fresh</span></td>
        <?php if (in_array($role, ['admin', 'employee'])): ?>
          <td>
            <?php if ($role === 'admin'): ?>
              <button class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-pencil"></i> Edit
              </button>
            <?php endif; ?>
            <button class="btn btn-outline-warning btn-sm">
              <i class="bi bi-exclamation-triangle"></i> Mark Needs Change
            </button>
          </td>
        <?php endif; ?>
      </tr>
    </tbody>
  </table>

  <?php if ($role === 'doctor'): ?>
    <div class="alert alert-info mt-4">
      <i class="bi bi-info-circle-fill me-2"></i> Here are your current patient's bed statuses.
    </div>
  <?php endif; ?>
</div>





    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>