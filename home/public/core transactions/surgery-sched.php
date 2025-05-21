<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Surgery Scheduler";
require_once __DIR__ . '../../../components/head.inc.php'; ?>
<body>
    <?php require_once __DIR__ . '../../../components/nav-bar.inc.php'; ?>

    <div class="container mt-5">
  <h2 class="mb-4 text-primary"><i class="bi bi-calendar2-plus me-2"></i>Surgery Scheduler</h2>

  <form>
    <div class="row mb-3">
      <div class="col">
        <input type="text" class="form-control" placeholder="Patient Name" required>
      </div>
      <div class="col">
        <input type="datetime-local" class="form-control" required>
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Procedure" required>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">
      <i class="bi bi-plus-circle me-1"></i>Schedule Surgery
    </button>
  </form>
</div>



    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>