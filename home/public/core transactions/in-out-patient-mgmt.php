<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "In-Patient Management/Out Patient Management";
require_once __DIR__ . '../../../components/head.inc.php'; ?>
<body>
    <?php require_once __DIR__ . '../../../components/nav-bar.inc.php'; ?>

    <div class="container mt-5">
  <h2 class="mb-4">
    <i class="bi bi-hospital me-2"></i>In-Patient & Out-Patient Management
  </h2>

  <div class="row row-cols-1 row-cols-md-2 g-4">
    <!-- In-Patient Card -->
    <div class="col">
      <div class="card border-start border-4 border-primary shadow-sm">
        <div class="card-body">
          <h5 class="card-title"><i class="bi bi-person-fill-inpatient me-2"></i>In-Patients</h5>
          <p class="card-text">12 patients currently admitted</p>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Room 201 - Ana Dela Cruz</li>
            <li class="list-group-item">Room 203 - Jason Tan</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Out-Patient Card -->
    <div class="col">
      <div class="card border-start border-4 border-success shadow-sm">
        <div class="card-body">
          <h5 class="card-title"><i class="bi bi-person-lines-fill me-2"></i>Out-Patients</h5>
          <p class="card-text">24 out-patient visits scheduled</p>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Maria Lopez - 10:00 AM</li>
            <li class="list-group-item">Carlos Rivera - 11:30 AM</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>



    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>