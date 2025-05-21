<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "HOMIS Analytics";
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
  <h2 class="mb-4 text-primary"><i class="bi bi-bar-chart-fill me-2"></i>HOMIS Analytics</h2>
  
  <div class="row text-center g-4">
    <div class="col-md-4">
      <div class="card border-0 shadow-sm">
        <div class="card-body">
          <h6 class="card-subtitle mb-2 text-muted">Admissions</h6>
          <h2 class="card-title text-success">120</h2>
          <i class="bi bi-hospital fs-3 text-secondary"></i>
        </div>
      </div>
    </div>
    
    <div class="col-md-4">
      <div class="card border-0 shadow-sm">
        <div class="card-body">
          <h6 class="card-subtitle mb-2 text-muted">Outpatients</h6>
          <h2 class="card-title text-warning">345</h2>
          <i class="bi bi-person-check fs-3 text-secondary"></i>
        </div>
      </div>
    </div>
    
    <div class="col-md-4">
      <div class="card border-0 shadow-sm">
        <div class="card-body">
          <h6 class="card-subtitle mb-2 text-muted">Surgeries</h6>
          <h2 class="card-title text-danger">28</h2>
          <i class="bi bi-heart-pulse fs-3 text-secondary"></i>
        </div>
      </div>
    </div>
  </div>

  <?php if ($role === 'doctor'): ?>
    <div class="alert alert-info mt-4">
      <i class="bi bi-info-circle-fill me-2"></i>
      Doctors can only see summary metrics for reference. Contact admin for detailed reports.
    </div>
  <?php endif; ?>
</div>





    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>