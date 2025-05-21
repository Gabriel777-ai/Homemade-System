<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Recruitment and Applicant Management";
require_once __DIR__ . '../../../components/head.inc.php'; ?>
<body>
    <?php require_once __DIR__ . '../../../components/nav-bar.inc.php'; ?>

    <?php

// Access Control Logic
$canView = in_array($role, ['admin', 'employee']);
$canEdit = ($role === 'admin');

if (!$canView) {
    require_once __DIR__ . '../../../components/restricted.inc.php';
    exit;
}
?>

<div class="container mt-5">
    <h2 class="mb-4 text-primary">Applicants Overview</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <!-- Applicant 1 -->
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-0 fw-bold">Maria Lopez</h6>
                        <small class="text-muted">UI/UX Designer</small>
                    </div>
                    <span class="badge bg-success" title="Interview completed">Interviewed</span>
                    <?php if ($canEdit): ?>
                        <button class="btn btn-sm btn-outline-primary ms-3">Update</button>
                    <?php endif; ?>
                </li>

                <!-- Applicant 2 -->
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-0 fw-bold">Daniel Kim</h6>
                        <small class="text-muted">Software Engineer</small>
                    </div>
                    <span class="badge bg-warning text-dark" title="Waiting for initial screening">Pending</span>
                    <?php if ($canEdit): ?>
                        <button class="btn btn-sm btn-outline-primary ms-3">Update</button>
                    <?php endif; ?>
                </li>

                <!-- Applicant 3 -->
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-0 fw-bold">Lena Cruz</h6>
                        <small class="text-muted">Marketing Analyst</small>
                    </div>
                    <span class="badge bg-secondary" title="Resume under review">Under Review</span>
                    <?php if ($canEdit): ?>
                        <button class="btn btn-sm btn-outline-primary ms-3">Update</button>
                    <?php endif; ?>
                </li>

                <!-- Applicant 4 -->
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-0 fw-bold">Kevin Tran</h6>
                        <small class="text-muted">Backend Developer</small>
                    </div>
                    <span class="badge bg-danger" title="Application rejected">Rejected</span>
                    <?php if ($canEdit): ?>
                        <button class="btn btn-sm btn-outline-primary ms-3">Update</button>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>

    <?php if ($canEdit): ?>
        <div class="mt-4">
            <button class="btn btn-success">Add Applicant</button>
            <button class="btn btn-secondary">Generate Report</button>
        </div>
    <?php endif; ?>
</div>



    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>