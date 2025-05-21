<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Vendor Portal";
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
  <h2 class="text-primary mb-4"><i class="bi bi-person-badge-fill me-2"></i>Vendor Portal</h2>

  <div class="table-responsive shadow-sm rounded">
    <table class="table table-bordered table-striped align-middle">
      <thead class="table-light">
        <tr>
          <th><i class="bi bi-building me-1"></i>Name</th>
          <th><i class="bi bi-tags me-1"></i>Category</th>
          <th><i class="bi bi-check2-circle me-1"></i>Status</th>
          <th><i class="bi bi-gear-fill me-1"></i>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Alpha Supplies</td>
          <td>Office Equipment</td>
          <td><span class="badge bg-success">Active</span></td>
          <td>
            <button class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i> View</button>
            <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i> Edit</button>
          </td>
        </tr>
        <tr>
          <td>Beta Logistics</td>
          <td>Transport</td>
          <td><span class="badge bg-secondary">Inactive</span></td>
          <td>
            <button class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i> View</button>
            <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i> Edit</button>
          </td>
        </tr>
        <tr>
          <td>Gamma Medical</td>
          <td>Pharmaceuticals</td>
          <td><span class="badge bg-warning text-dark">Pending</span></td>
          <td>
            <button class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i> View</button>
            <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i> Edit</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>





    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>