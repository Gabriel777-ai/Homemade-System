<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Competency Management";
require_once __DIR__ . '../../../components/head.inc.php'; ?>
<body>
    <?php require_once __DIR__ . '../../../components/nav-bar.inc.php'; ?>

    <div class="container mt-5">
  <h2 class="mb-4"><i class="bi bi-kanban me-2"></i>Skill Matrix</h2>

  <table class="table table-striped table-hover align-middle">
    <thead class="table-light">
      <tr>
        <th><i class="bi bi-person-fill me-1"></i>Employee</th>
        <th><i class="bi bi-chat-dots-fill me-1"></i>Communication</th>
        <th><i class="bi bi-lightbulb-fill me-1"></i>Leadership</th>
        <th><i class="bi bi-cpu-fill me-1"></i>Technical</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Sophie Wong</td>
        <td><span class="badge bg-success">Excellent</span></td>
        <td><span class="badge bg-primary">Good</span></td>
        <td><span class="badge bg-info text-dark">Advanced</span></td>
      </tr>
      <tr>
        <td>Leo Martinez</td>
        <td><span class="badge bg-primary">Good</span></td>
        <td><span class="badge bg-success">Excellent</span></td>
        <td><span class="badge bg-warning text-dark">Intermediate</span></td>
      </tr>
    </tbody>
  </table>
</div>




    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>