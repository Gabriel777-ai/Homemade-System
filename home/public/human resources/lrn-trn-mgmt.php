<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Learning Management and Training Management";
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
    <i class="bi bi-journal-code me-2"></i>Training Courses
  </h2>

  <?php if ($role === 'admin'): ?>
    <div class="mb-4">
      <button class="btn btn-primary">
        <i class="bi bi-plus-circle me-1"></i> Add New Course
      </button>
    </div>
  <?php endif; ?>

  <div class="row row-cols-1 row-cols-md-3 g-4">
    <!-- Card 1 -->
    <div class="col">
      <div class="card shadow-sm h-100 border-0">
        <div class="card-body">
          <h5 class="card-title mb-2">
            <i class="bi bi-person-video3 me-2 text-primary"></i>Leadership 101
          </h5>
          <p class="card-text mb-1 text-muted">Completed by 75 employees</p>
          <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Completed</span>
        </div>

        <?php if ($role === 'admin'): ?>
          <div class="card-footer bg-white border-0 d-flex justify-content-end gap-2">
            <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil-square"></i></button>
            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="col">
      <div class="card shadow-sm h-100 border-0">
        <div class="card-body">
          <h5 class="card-title mb-2">
            <i class="bi bi-shield-lock me-2 text-warning"></i>Cybersecurity Basics
          </h5>
          <p class="card-text mb-1 text-muted">30 employees enrolled</p>
          <span class="badge bg-warning text-dark"><i class="bi bi-hourglass-split me-1"></i>Ongoing</span>
        </div>

        <?php if ($role === 'admin'): ?>
          <div class="card-footer bg-white border-0 d-flex justify-content-end gap-2">
            <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil-square"></i></button>
            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>





    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>