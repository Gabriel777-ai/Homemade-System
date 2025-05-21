<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Project Management";
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
  <h2 class="text-primary mb-3">Project Management</h2>
  <p class="text-muted">Track the progress and deadlines of ongoing logistics projects.</p>

  <table class="table table-hover table-striped align-middle shadow-sm">
    <thead class="table-light">
      <tr>
        <th>Project Name</th>
        <th>Status</th>
        <th>Deadline</th>
        <?php if ($role === 'admin'): ?>
          <th>Actions</th>
        <?php endif; ?>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Warehouse Expansion</td>
        <td><span class="badge bg-warning text-dark">In Progress</span></td>
        <td>June 15, 2025</td>
        <?php if ($role === 'admin'): ?>
          <td>
            <button class="btn btn-sm btn-outline-primary">Edit</button>
          </td>
        <?php endif; ?>
      </tr>
      <tr>
        <td>Inventory Revamp</td>
        <td><span class="badge bg-success">Completed</span></td>
        <td>March 30, 2025</td>
        <?php if ($role === 'admin'): ?>
          <td>
            <button class="btn btn-sm btn-outline-primary">Edit</button>
          </td>
        <?php endif; ?>
      </tr>
    </tbody>
  </table>

  <?php if ($role === 'admin'): ?>
    <div class="text-end">
      <button class="btn btn-success mt-3">Add Project</button>
    </div>
  <?php endif; ?>
</div>





    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>