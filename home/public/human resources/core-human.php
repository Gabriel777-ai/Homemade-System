<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Core Human Capital Management";
require_once __DIR__ . '../../../components/head.inc.php'; ?>
<body>
    <?php require_once __DIR__ . '../../../components/nav-bar.inc.php'; ?>

    <?php

// Define access
$canView = in_array($role, ['admin', 'employee']);
$canEdit = ($role === 'admin');

// Restrict access
if (!$canView) {
    require_once __DIR__ . '../../../components/restricted.inc.php';
    exit;
}
?>

<div class="container mt-5">
  <h2 class="text-primary mb-2">Core Human Capital Management</h2>
  <p class="text-muted mb-4">Manage the employee lifecycle and access workforce planning tools.</p>

  <div class="table-responsive">
    <table class="table table-hover table-striped align-middle shadow-sm rounded">
      <thead class="table-dark">
        <tr>
          <th scope="col">Employee ID</th>
          <th scope="col">Name</th>
          <th scope="col">Role</th>
          <th scope="col">Status</th>
          <?php if ($canEdit): ?>
            <th scope="col">Actions</th>
          <?php endif; ?>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>HR1001</td>
          <td><strong>Anna Santos</strong></td>
          <td>HR Officer</td>
          <td><span class="badge bg-success">Active</span></td>
          <?php if ($canEdit): ?>
            <td><button class="btn btn-sm btn-outline-primary">Edit</button></td>
          <?php endif; ?>
        </tr>
        <tr>
          <td>HR1002</td>
          <td><strong>Jayson Lim</strong></td>
          <td>Recruiter</td>
          <td><span class="badge bg-warning text-dark">Onboarding</span></td>
          <?php if ($canEdit): ?>
            <td><button class="btn btn-sm btn-outline-primary">Edit</button></td>
          <?php endif; ?>
        </tr>
        <tr>
          <td>HR1003</td>
          <td><strong>Patricia Uy</strong></td>
          <td>HR Specialist</td>
          <td><span class="badge bg-secondary">Resigned</span></td>
          <?php if ($canEdit): ?>
            <td><button class="btn btn-sm btn-outline-primary">Edit</button></td>
          <?php endif; ?>
        </tr>
        <tr>
          <td>HR1004</td>
          <td><strong>Leo Chan</strong></td>
          <td>Compensation Analyst</td>
          <td><span class="badge bg-danger">Terminated</span></td>
          <?php if ($canEdit): ?>
            <td><button class="btn btn-sm btn-outline-primary">Edit</button></td>
          <?php endif; ?>
        </tr>
      </tbody>
    </table>
  </div>

  <?php if ($canEdit): ?>
    <div class="mt-3">
        <button class="btn btn-success">Add Employee</button>
        <button class="btn btn-secondary">Generate Report</button>
    </div>
  <?php endif; ?>
</div>


    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>