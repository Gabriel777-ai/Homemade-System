<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Laboratory Management";
require_once __DIR__ . '../../../components/head.inc.php'; ?>
<body>
    <?php require_once __DIR__ . '../../../components/nav-bar.inc.php'; ?>

    <div class="container mt-5">
  <h2 class="mb-4 text-primary">
    <i class="bi bi-flask me-2"></i>Lab Tests
  </h2>

  <table class="table table-bordered table-hover align-middle shadow-sm bg-white">
    <thead class="table-light">
      <tr>
        <th>Test Name</th>
        <th>Patient</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Blood Panel</td>
        <td>Erik M.</td>
        <td><span class="badge bg-warning text-dark">Pending</span></td>
      </tr>
      <tr>
        <td>X-ray</td>
        <td>Karen G.</td>
        <td><span class="badge bg-success">Completed</span></td>
      </tr>
    </tbody>
  </table>
</div>



    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>