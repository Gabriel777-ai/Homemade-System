<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Medical Record and Data Management";
require_once __DIR__ . '../../../components/head.inc.php'; ?>
<body>
    <?php require_once __DIR__ . '../../../components/nav-bar.inc.php'; ?>

    <div class="container mt-5">
  <h2 class="mb-4">
    <i class="bi bi-folder2-open me-2"></i>Medical Records
  </h2>
  <p class="text-muted">Overview of patient medical documents and latest updates.</p>
  
  <table class="table table-bordered table-hover">
    <thead class="table-light">
      <tr>
        <th><i class="bi bi-person-fill me-1"></i>Patient</th>
        <th><i class="bi bi-file-earmark-text me-1"></i>Record Type</th>
        <th><i class="bi bi-calendar-check me-1"></i>Last Updated</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Emily R.</td>
        <td>Lab Results</td>
        <td>2025-05-18</td>
      </tr>
      <tr>
        <td>Tom V.</td>
        <td>ECG</td>
        <td>2025-05-17</td>
      </tr>
    </tbody>
  </table>
</div>



    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>