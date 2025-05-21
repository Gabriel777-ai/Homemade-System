<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Vehicle Reservation System";
require_once __DIR__ . '../../../components/head.inc.php'; ?>
<body>
    <?php require_once __DIR__ . '../../../components/nav-bar.inc.php'; ?>

    <div class="container mt-5">
  <h2 class="mb-4"><i class="bi bi-car-front-fill me-2"></i>Vehicle Bookings</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Vehicle</th>
        <th>Date</th>
        <th>Booked By</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Van A</td>
        <td>2025-05-21</td>
        <td>Maria R.</td>
      </tr>
      <tr>
        <td>Truck B</td>
        <td>2025-05-23</td>
        <td>Kevin T.</td>
      </tr>
    </tbody>
  </table>
</div>




    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>