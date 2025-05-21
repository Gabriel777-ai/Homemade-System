<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Patient Registration";
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
  <h2 class="mb-4 text-primary"><i class="bi bi-person-plus-fill me-2"></i>Patient Registration</h2>

  <form class="shadow p-4 rounded bg-light">
    <div class="mb-3">
      <label class="form-label">Full Name</label>
      <input type="text" class="form-control" placeholder="John Doe">
    </div>

    <div class="mb-3">
      <label class="form-label">Date of Birth</label>
      <input type="date" class="form-control">
    </div>

    <div class="mb-3">
      <label class="form-label">Gender</label>
      <select class="form-select">
        <option selected disabled>Select Gender</option>
        <option>Male</option>
        <option>Female</option>
        <option>Other</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Contact Number</label>
      <input type="tel" class="form-control" placeholder="+63 900 000 0000">
    </div>

    <div class="mb-3">
      <label class="form-label">Email Address</label>
      <input type="email" class="form-control" placeholder="johndoe@example.com">
    </div>

    <div class="mb-3">
      <label class="form-label">Initial Concern</label>
      <textarea class="form-control" rows="3" placeholder="Brief description of concern..."></textarea>
    </div>

    <button type="submit" class="btn btn-success w-100">
      <i class="bi bi-check-circle me-1"></i> Register Patient
    </button>
  </form>
</div>




    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>