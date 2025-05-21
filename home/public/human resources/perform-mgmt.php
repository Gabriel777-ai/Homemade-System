<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Performance Management";
require_once __DIR__ . '../../../components/head.inc.php'; ?>
<body>
    <?php require_once __DIR__ . '../../../components/nav-bar.inc.php'; ?>


    <?php

$canView = in_array($role, ['admin', 'employee']);
$canEdit = ($role === 'admin');

if (!$canView) {
    require_once __DIR__ . '../../../components/restricted.inc.php';
    exit;
}
?>

<div class="container mt-5">
    <h2 class="mb-4 text-primary">Performance Dashboard</h2>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Employee</th>
                        <th scope="col">Goal</th>
                        <th scope="col">Status</th>
                        <th scope="col">Rating</th>
                        <?php if ($canEdit): ?>
                            <th scope="col">Actions</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Alice Garcia</strong></td>
                        <td>Improve Sales by 15%</td>
                        <td><span class="badge bg-warning text-dark">In Progress</span></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 me-2">
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 84%;" aria-valuenow="4.2" aria-valuemin="0" aria-valuemax="5"></div>
                                    </div>
                                </div>
                                <small class="text-muted">4.2</small>
                            </div>
                        </td>
                        <?php if ($canEdit): ?>
                            <td>
                                <button class="btn btn-sm btn-outline-primary">Edit</button>
                            </td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <td><strong>John Lee</strong></td>
                        <td>Complete Project X</td>
                        <td><span class="badge bg-success">Completed</span></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 me-2">
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="5.0" aria-valuemin="0" aria-valuemax="5"></div>
                                    </div>
                                </div>
                                <small class="text-muted">5.0</small>
                            </div>
                        </td>
                        <?php if ($canEdit): ?>
                            <td>
                                <button class="btn btn-sm btn-outline-primary">Edit</button>
                            </td>
                        <?php endif; ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <?php if ($canEdit): ?>
        <div class="text-end">
            <button class="btn btn-success">Add Goal</button>
            <button class="btn btn-secondary">Export Report</button>
        </div>
    <?php endif; ?>
</div>





    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>