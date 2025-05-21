<?php
    require_once __DIR__ . '../../../../database/connect.php';
    require_once __DIR__ . '../../../components/session-start.inc.php';
    require_once __DIR__ . '/../../../config-helper.php';
    require_once __DIR__ . '../../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Document Tracking System(Approval)";
require_once __DIR__ . '../../../components/head.inc.php'; ?>
<body>
    <?php require_once __DIR__ . '../../../components/nav-bar.inc.php'; ?>

    <?php
    $canView = in_array($role, ['admin', 'employee']);

    if (!$canView) {
        require_once __DIR__ . '../../../components/restricted.inc.php';
        exit;
    }

    // Fetch pending approvals from the database
    $sql = "SELECT * FROM pending_approvals_view";
    $result = $conn->query($sql);
    $pendingApprovals = [];
    
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $pendingApprovals[] = $row;
        }
    }
    ?>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-primary"><i class="bi bi-file-earmark-text-fill me-2"></i>Pending Approvals</h2>
            <div>
                <a href="create-document.php" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-2"></i>New Document
                </a>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <form method="GET" action="" class="row g-3">
                    <div class="col-md-4">
                        <label for="document_type" class="form-label">Document Type</label>
                        <select class="form-select" id="document_type" name="document_type">
                            <option value="">All Types</option>
                            <?php
                            // Fetch document types from database
                            $typeSql = "SELECT document_type_id, type_name FROM document_types ORDER BY type_name";
                            $typeResult = $conn->query($typeSql);
                            
                            if ($typeResult && $typeResult->num_rows > 0) {
                                while ($type = $typeResult->fetch_assoc()) {
                                    $selected = (isset($_GET['document_type']) && $_GET['document_type'] == $type['document_type_id']) ? 'selected' : '';
                                    echo "<option value='{$type['document_type_id']}' $selected>{$type['type_name']}</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="department" class="form-label">Department</label>
                        <select class="form-select" id="department" name="department">
                            <option value="">All Departments</option>
                            <?php
                            // Fetch departments from database
                            $deptSql = "SELECT department_id, department_name FROM departments ORDER BY department_name";
                            $deptResult = $conn->query($deptSql);
                            
                            if ($deptResult && $deptResult->num_rows > 0) {
                                while ($dept = $deptResult->fetch_assoc()) {
                                    $selected = (isset($_GET['department']) && $_GET['department'] == $dept['department_id']) ? 'selected' : '';
                                    echo "<option value='{$dept['department_id']}' $selected>{$dept['department_name']}</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-search me-2"></i>Filter
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="list-group shadow-sm rounded">
            <?php if (count($pendingApprovals) > 0): ?>
                <?php foreach ($pendingApprovals as $approval): ?>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <?php 
                            $iconClass = 'text-warning';
                            if ($approval['type_code'] == 'MEMO') {
                                $iconClass = 'text-info';
                            } elseif ($approval['type_code'] == 'DR') {
                                $iconClass = 'text-secondary';
                            }
                            ?>
                            <h6 class="mb-1">
                                <i class="bi bi-file-earmark-check-fill <?php echo $iconClass; ?> me-2"></i>
                                <?php echo htmlspecialchars($approval['reference_number']); ?>
                            </h6>
                            <small class="text-muted">
                                Awaiting approval from <strong><?php echo htmlspecialchars($approval['awaiting_approval_from']); ?></strong>
                            </small>
                        </div>
                        <?php 
                        $badgeClass = 'bg-warning text-dark';
                        if ($approval['status'] == 'In Review') {
                            $badgeClass = 'bg-secondary';
                        }
                        ?>
                        <span class="badge <?php echo $badgeClass; ?>"><?php echo htmlspecialchars($approval['status']); ?></span>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="list-group-item text-center py-4">
                    <i class="bi bi-check-circle text-success" style="font-size: 2rem;"></i>
                    <p class="mt-3 mb-0">No pending approvals found.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>
