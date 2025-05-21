<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Succession Planning";
require_once __DIR__ . '../../../components/head.inc.php'; ?>
<body>
    <?php require_once __DIR__ . '../../../components/nav-bar.inc.php'; ?>

    <?php
// Only admin and employee can view
$canView   = in_array($role, ['admin', 'employee']);
$canEdit   = ($role === 'admin');

if (!$canView) {
    require_once __DIR__ . '../../../components/restricted.inc.php';
    exit;
}
?>

<div class="container mt-5">
  <h2 class="mb-4"><i class="bi bi-person-arrows me-2"></i>Succession Candidates</h2>

  <div class="card shadow-sm border-0">
    <div class="card-body p-0">
      <table class="table table-striped mb-0">
        <thead class="table-light">
          <tr>
            <th><i class="bi bi-briefcase me-1"></i>Position</th>
            <th><i class="bi bi-person-badge me-1"></i>Current Holder</th>
            <th><i class="bi bi-person-plus me-1"></i>Successor</th>
            <th><i class="bi bi-hourglass-split me-1"></i>Readiness</th>
            <?php if ($canEdit): ?>
              <th>Actions</th>
            <?php endif; ?>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Team Lead</td>
            <td>Grace Lin</td>
            <td>Mark Yu</td>
            <td><span class="badge bg-warning text-dark">6 Months</span></td>
            <?php if ($canEdit): ?>
              <td>
                <button class="btn btn-sm btn-outline-primary">
                  <i class="bi bi-pencil-square"></i>
                </button>
              </td>
            <?php endif; ?>
          </tr>
          <tr>
            <td>Operations Manager</td>
            <td>Alex Santos</td>
            <td>Jenna Cruz</td>
            <td><span class="badge bg-success">Ready Now</span></td>
            <?php if ($canEdit): ?>
              <td>
                <button class="btn btn-sm btn-outline-primary">
                  <i class="bi bi-pencil-square"></i>
                </button>
              </td>
            <?php endif; ?>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <?php if ($canEdit): ?>
    <div class="mt-3 text-end">
      <button class="btn btn-success">
        <i class="bi bi-plus-circle me-1"></i>Add Candidate
      </button>
    </div>
  <?php endif; ?>
</div>




    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>