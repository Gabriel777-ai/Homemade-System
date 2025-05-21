<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "HR Analytics";
require_once __DIR__ . '../../../components/head.inc.php'; ?>
<body>
    <?php require_once __DIR__ . '../../../components/nav-bar.inc.php'; ?>

    <?php
$canView = ($role === 'admin'); // Only admin can access this page
if (!$canView) {
  require_once __DIR__ . '../../../components/restricted.inc.php';
  exit;
}
?>

<div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>
      <i class="bi bi-bar-chart-fill me-2 text-primary"></i>HR Analytics
    </h2>

    <?php if ($role === 'admin'): ?>
      <a href="#" class="btn btn-sm btn-outline-primary">
        <i class="bi bi-pencil-square me-1"></i>Manage Analytics
      </a>
    <?php endif; ?>
  </div>

  <p class="text-muted">Visual insights on key HR performance metrics.</p>

  <!-- Summary Card -->
  <div class="card border-0 shadow-sm mb-4">
    <div class="card-body d-flex align-items-center">
      <i class="bi bi-graph-up text-info display-6 me-3"></i>
      <div>
        <h5 class="mb-1">Training Completion</h5>
        <p class="mb-0 text-muted">70% of employees have completed training in Q2.</p>
      </div>
    </div>
  </div>

  <!-- Progress Bar -->
  <label class="fw-semibold mb-1">Q2 Training Completion</label>
  <div class="progress mb-4" style="height: 24px;">
    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success fw-semibold" style="width: 70%;">
      70%
    </div>
  </div>

  <!-- Placeholder Cards for Expansion -->
  <div class="row">
    <div class="col-md-6">
      <div class="card border-0 shadow-sm">
        <div class="card-body text-center">
          <i class="bi bi-people-fill display-6 text-secondary"></i>
          <h6 class="mt-2">Employee Engagement</h6>
          <p class="text-muted small mb-0">Data visualization coming soon...</p>
        </div>
      </div>
    </div>
    <div class="col-md-6 mt-3 mt-md-0">
      <div class="card border-0 shadow-sm">
        <div class="card-body text-center">
          <i class="bi bi-clipboard-data-fill display-6 text-secondary"></i>
          <h6 class="mt-2">Attrition Rate</h6>
          <p class="text-muted small mb-0">Data visualization coming soon...</p>
        </div>
      </div>
    </div>
  </div>
</div>






    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>