<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Doctor Appointment";
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
  <h2 class="mb-4 text-primary"><i class="bi bi-calendar2-check-fill me-2"></i>Doctor Appointments</h2>

  <table class="table table-hover table-bordered align-middle shadow-sm bg-white">
    <thead class="table-light">
      <tr>
        <th>Doctor</th>
        <th>Specialization</th>
        <th>Date</th>
        <th>Time</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td>Dr. Susan Smith</td>
        <td>Cardiologist</td>
        <td>2025-06-01</td>
        <td>10:30 AM</td>
        <td><span class="badge bg-success">Confirmed</span></td>
        <td>
          <?php if ($role === 'admin'): ?>
            <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-pencil-square"></i> Reschedule</button>
            <button class="btn btn-outline-danger btn-sm"><i class="bi bi-x-circle"></i> Cancel</button>
          <?php elseif ($role === 'doctor'): ?>
            <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-pencil-square"></i> Update</button>
          <?php elseif ($role === 'patient'): ?>
            <button class="btn btn-outline-danger btn-sm"><i class="bi bi-x-circle"></i> Cancel</button>
          <?php else: ?>
            <span class="text-muted">Read-only</span>
          <?php endif; ?>
        </td>
      </tr>

      <tr>
        <td>Dr. Kevin Lee</td>
        <td>Dermatologist</td>
        <td>2025-06-02</td>
        <td>02:00 PM</td>
        <td><span class="badge bg-warning text-dark">Pending</span></td>
        <td>
          <?php if ($role === 'admin'): ?>
            <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-pencil-square"></i> Reschedule</button>
            <button class="btn btn-outline-danger btn-sm"><i class="bi bi-x-circle"></i> Cancel</button>
          <?php elseif ($role === 'doctor'): ?>
            <button class="btn btn-outline-success btn-sm"><i class="bi bi-check-circle"></i> Confirm</button>
          <?php elseif ($role === 'patient'): ?>
            <button class="btn btn-outline-danger btn-sm"><i class="bi bi-x-circle"></i> Cancel</button>
          <?php else: ?>
            <span class="text-muted">Read-only</span>
          <?php endif; ?>
        </td>
      </tr>

      <tr>
        <td>Dr. Ho Lee</td>
        <td>Dentist</td>
        <td>2025-07-01</td>
        <td>02:30 AM</td>
        <td><span class="badge bg-warning text-dark">Pending</span></td>
        <td>
          <?php if ($role === 'admin'): ?>
            <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-pencil-square"></i> Reschedule</button>
            <button class="btn btn-outline-danger btn-sm"><i class="bi bi-x-circle"></i> Cancel</button>
          <?php elseif ($role === 'doctor'): ?>
            <button class="btn btn-outline-success btn-sm"><i class="bi bi-check-circle"></i> Confirm</button>
          <?php elseif ($role === 'patient'): ?>
            <button class="btn btn-outline-danger btn-sm"><i class="bi bi-x-circle"></i> Cancel</button>
          <?php else: ?>
            <span class="text-muted">Read-only</span>
          <?php endif; ?>
        </td>
      </tr>

      <tr>
        <td>Dr. Keith Tan</td>
        <td>Pediatrician</td>
        <td>2025-07-21</td>
        <td>06:00 PM</td>
        <td><span class="badge bg-success text-white">Confirmed</span></td>
        <td>
          <?php if ($role === 'admin'): ?>
            <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-pencil-square"></i> Reschedule</button>
            <button class="btn btn-outline-danger btn-sm"><i class="bi bi-x-circle"></i> Cancel</button>
          <?php elseif ($role === 'doctor'): ?>
            <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-check-circle"></i> Update</button>
          <?php elseif ($role === 'patient'): ?>
            <button class="btn btn-outline-danger btn-sm"><i class="bi bi-x-circle"></i> Cancel</button>
          <?php else: ?>
            <span class="text-muted">Read-only</span>
          <?php endif; ?>
        </td>
      </tr>

    </tbody>
  </table>

  <?php if ($role === 'patient'): ?>
    <div class="alert alert-info mt-4">
      <i class="bi bi-info-circle-fill me-2"></i> You have booked an Appointment!
    </div>
    <div class="mt-4 text-end">
      <button class="btn btn-primary"><i class="bi bi-calendar-plus"></i> Book New Appointment</button>
    </div>
  <?php endif; ?>
</div>




    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>