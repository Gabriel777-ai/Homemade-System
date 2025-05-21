<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "New Hire on Board and Employee Self Service";
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
  <h2 class="mb-4">
    <i class="bi bi-person-plus-fill me-2"></i>New Hire Onboarding & Employee Self Service
  </h2>

  <?php if ($role === 'admin'): ?>
    <!-- Admin tools -->
    <div class="mb-4 d-flex justify-content-between align-items-center">
      <button class="btn btn-primary">
        <i class="bi bi-person-plus me-1"></i> Onboard New Employee
      </button>
      <button class="btn btn-outline-secondary">
        <i class="bi bi-card-checklist me-1"></i> View All Onboarding Tasks
      </button>
    </div>
  <?php endif; ?>

  <?php if ($role === 'employee'): ?>
    <!-- Employee self service -->
    <div class="card shadow-sm border-0 mb-4">
      <div class="card-body">
        <h5 class="card-title">
          <i class="bi bi-person-lines-fill me-2 text-primary"></i>Your Onboarding Checklist
        </h5>
        <ul class="list-group list-group-flush">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Submit Personal Documents
            <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Completed</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Attend Orientation
            <span class="badge bg-warning text-dark"><i class="bi bi-hourglass-split me-1"></i>Pending</span>
          </li>
        </ul>
      </div>
    </div>

    <div class="card shadow-sm border-0">
      <div class="card-body">
        <h5 class="card-title">
          <i class="bi bi-pencil-square me-2 text-secondary"></i>Update Personal Information
        </h5>
        <button class="btn btn-outline-primary">
          <i class="bi bi-pencil-fill me-1"></i>Edit Info
        </button>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($role === 'admin'): ?>
    <!-- Onboarding summary table -->
    <div class="card shadow-sm border-0 mt-4">
      <div class="card-body">
        <h5 class="card-title"><i class="bi bi-table me-2"></i>Onboarding Progress</h5>
        <table class="table table-hover">
          <thead class="table-light">
            <tr>
              <th>Employee</th>
              <th>Checklist Completion</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Ana Cruz</td>
              <td>80%</td>
              <td><span class="badge bg-warning text-dark">In Progress</span></td>
            </tr>
            <tr>
              <td>Marco Villanueva</td>
              <td>100%</td>
              <td><span class="badge bg-success">Completed</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  <?php endif; ?>
</div>




    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>