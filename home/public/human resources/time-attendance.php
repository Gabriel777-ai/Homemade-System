<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Time and Attendance(Timesheet Management, Shift and Scheduling)";
require_once __DIR__ . '../../../components/head.inc.php'; ?>
<body>
    <?php require_once __DIR__ . '../../../components/nav-bar.inc.php'; ?>

    <?php
    
$canView = in_array($role, ['admin', 'employee', 'doctor']);
$canEdit = in_array($role, ['admin']);
$canSubmit = in_array($role, ['admin', 'doctor']); // if doctor submits shifts etc.

if (!$canView) {
    require_once __DIR__ . '../../../components/restricted.inc.php';
    exit;
}
?>

<div class="container mt-5">
  <h2 class="text-primary mb-2">Time and Attendance</h2>
  <p class="text-muted mb-4">Monitor timesheets, shift schedules, and attendance logs.</p>

  <div class="list-group shadow-sm">
    <!-- Timesheet -->
    <div class="list-group-item d-flex justify-content-between align-items-center">
      <div>
        <strong>Timesheet Submitted</strong><br>
        John Cruz — <span class="text-muted">May 19, 2025</span>
      </div>
      <span class="badge bg-success">Submitted</span>
    </div>

    <!-- Shift -->
    <div class="list-group-item d-flex justify-content-between align-items-center">
      <div>
        <strong>Night Shift</strong><br>
        Maria Lopez — <span class="text-muted">10:00 PM - 6:00 AM</span>
      </div>
      <span class="badge bg-info text-dark">Scheduled</span>
    </div>

    <!-- Overtime -->
    <div class="list-group-item d-flex justify-content-between align-items-center">
      <div>
        <strong>Overtime Request</strong><br>
        Paul Ong — <span class="text-muted">Pending Manager Approval</span>
      </div>
      <span class="badge bg-warning text-dark">Pending</span>
    </div>
  </div>

  <?php if ($canEdit): ?>
    <div class="mt-4">
        <button class="btn btn-primary">Edit Schedule</button>
        <button class="btn btn-secondary">Generate Report</button>
    </div>
  <?php endif; ?>
</div>



    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>