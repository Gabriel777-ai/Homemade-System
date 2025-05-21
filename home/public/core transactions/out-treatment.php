<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Out Patient Treatment";
require_once __DIR__ . '../../../components/head.inc.php'; ?>
<body>
    <?php require_once __DIR__ . '../../../components/nav-bar.inc.php'; ?>

    <?php
$canView = in_array($role, ['admin', 'employee', 'doctor', 'patient']);

if (!$canView) {
    require_once __DIR__ . '../../../components/restricted.inc.php';
    exit;
}
?>

<div class="container mt-5">
  <h2 class="mb-4 text-primary">
    <i class="bi bi-clipboard-pulse me-2"></i>Out Patient Treatment Records
  </h2>

  <table class="table table-hover table-bordered align-middle shadow-sm bg-white">
    <thead class="table-light">
      <tr>
        <th>Patient</th>
        <th>Date</th>
        <th>Diagnosis</th>
        <th>Prescribed Treatment</th>
        <th>Attending Doctor</th>
        <th>Status</th>
        <?php if (in_array($role, ['admin', 'doctor'])): ?>
          <th>Actions</th>
        <?php endif; ?>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John Doe</td>
        <td>2025-05-19</td>
        <td>Hypertension</td>
        <td>Medication & Lifestyle Changes</td>
        <td>Dr. Smith</td>
        <td><span class="badge bg-success">Treated</span></td>
        <?php if ($role === 'doctor' || $role === 'admin'): ?>
          <td>
            <button class="btn btn-outline-primary btn-sm">
              <i class="bi bi-pencil-square"></i> Edit
            </button>
          </td>
        <?php endif; ?>
      </tr>

      <tr>
        <td>Jerick Dellosa</td>
        <td>2025-06-12</td>
        <td>Chicken Pox</td>
        <td>Amoxycilin</td>
        <td>Dr. Ho Lee</td>
        <td><span class="badge bg-warning text-dark">Pending</span></td>
        <?php if ($role === 'doctor' || $role === 'admin'): ?>
          <td>
            <button class="btn btn-outline-primary btn-sm">
              <i class="bi bi-pencil-square"></i> Edit
            </button>
          </td>
        <?php endif; ?>
      </tr>

      <tr>
        <td>Gabriel Longkino</td>
        <td>2025-05-19</td>
        <td>FLU</td>
        <td>Medication & Lifestyle Changes</td>
        <td>Dr. Lord</td>
        <td><span class="badge bg-success">Treated</span></td>
        <?php if ($role === 'doctor' || $role === 'admin'): ?>
          <td>
            <button class="btn btn-outline-primary btn-sm">
              <i class="bi bi-pencil-square"></i> Edit
            </button>
          </td>
        <?php endif; ?>
      </tr>

      <tr>
        <td>Jane Cruz</td>
        <td>2025-05-20</td>
        <td>Skin Allergy</td>
        <td>Antihistamines</td>
        <td>Dr. Lord</td>
        <td><span class="badge bg-warning text-dark">Pending</span></td>
        <?php if ($role === 'doctor' || $role === 'admin'): ?>
          <td>
            <button class="btn btn-outline-primary btn-sm">
              <i class="bi bi-pencil-square"></i> Edit
            </button>
          </td>
        <?php endif; ?>
      </tr>

      <tr>
        <td>Linbil Celestre</td>
        <td>2025-05-20</td>
        <td>Heartbreak</td>
        <td>Lulu</td>
        <td>Dr. Lord</td>
        <td><span class="badge bg-warning text-dark">Pending</span></td>
        <?php if ($role === 'doctor' || $role === 'admin'): ?>
          <td>
            <button class="btn btn-outline-primary btn-sm">
              <i class="bi bi-pencil-square"></i> Edit
            </button>
          </td>
        <?php endif; ?>
      </tr>
    </tbody>
  </table>

  <?php if ($role === 'patient'): ?>
    <div class="alert alert-info mt-4">
      <i class="bi bi-info-circle-fill me-2"></i> You can view your treatment status here.
    </div>
  <?php endif; ?>
</div>




    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>