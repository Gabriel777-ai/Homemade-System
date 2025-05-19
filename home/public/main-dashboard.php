<?php
require_once __DIR__ . '../../../database/connect.php';
require_once __DIR__ . '../../components/session-start.inc.php';
require_once __DIR__ . '/../../config-helper.php';
require_once __DIR__ . '../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Dashboard";
require_once __DIR__ . '../../components/head.inc.php'; ?>

<head>
    <style>
        .custom-modal {
            display: none;
            position: fixed;
            z-index: 1050;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            overflow-y: scroll;
        }

        .custom-modal-content {
            background-color: #fff;
            padding: 2rem;
            border-radius: 10px;
            min-width: 300px;
            max-width: 90%;
        }

        .list-group a {
            margin: 2px 0;
            border: 2px solid #aaa;
            border-radius: 15px;
            box-shadow: 5px 10px 8px #888;
        }

        .list-group h4 {
            margin: 30px;
        }

        .dept-tile {
            border-radius: 1rem;
            padding: 3rem 1rem;
            text-align: center;
            cursor: pointer;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .dept-tile:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }

        .dept-tile h5 {
            margin-top: 0.5rem;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <?php require_once __DIR__ . '../../components/nav-bar.inc.php'; ?>


    <div class="container py-5">
        <h2 class="text-center mb-5">Where to, <?= $username ?>?</h2>
        <div class="row justify-content-center g-4">

            <div class="col-md-3">
                <div class="dept-tile bg-success text-white" onclick="visible('hrModal')">
                    <i class="bi bi-people-fill fs-1 mb-2"></i>
                    <h5>Human Resources</h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="dept-tile bg-warning text-dark" onclick="visible('logModal')">
                    <i class="bi bi-truck fs-1 mb-2"></i>
                    <h5>Logistics</h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="dept-tile bg-primary text-white" onclick="visible('coreModal')">
                    <i class="bi bi-clipboard-data-fill fs-1 mb-2"></i>
                    <h5>Core Transaction</h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="dept-tile bg-danger text-white" onclick="visible('financialModal')">
                    <i class="bi bi-currency-dollar fs-1 mb-2"></i>
                    <h5>Financials</h5>
                </div>
            </div>

        </div>
    </div>


    <!-- HR Modal -->
    <div id="hrModal" class="custom-modal">
        <div class="custom-modal-content">
            <div class="d-flex justify-content-between mb-3">
                <h1>Human Resources</h1>
                <button class="btn-close" onclick="visible('hrModal')"></button>
            </div>
            <div class="list-group">
                <h4>HR Part 1-2</h4>
                <a href="" class="list-group-item list-group-item-action">Performance Management</a>
                <a href="" class="list-group-item list-group-item-action">Recruitment and Applicant Management</a>
                <a href="" class="list-group-item list-group-item-action">Learning Management and Training Management</a>
                <a href="" class="list-group-item list-group-item-action">New Hire on Board and Employee Self Service</a>
                <a href="" class="list-group-item list-group-item-action">Succession Planning</a>
                <a href="" class="list-group-item list-group-item-action">Social Recognition</a>
                <a href="" class="list-group-item list-group-item-action">Competency Management</a>
                <h4>HR Part 3-4</h4>
                <a href="" class="list-group-item list-group-item-action">Core Human Capital Management</a>
                <a href="" class="list-group-item list-group-item-action">Time and Attendance(Timesheet Management, Shift and Scheduling)</a>
                <a href="" class="list-group-item list-group-item-action">Claims and Reimbursement</a>
                <a href="" class="list-group-item list-group-item-action">Compensation Planning and Administration</a>
                <a href="" class="list-group-item list-group-item-action">HR Analytics</a>
                <a href="" class="list-group-item list-group-item-action">Leave Management</a>
                <a href="" class="list-group-item list-group-item-action">Payroll</a>
            </div>
        </div>
    </div>

    <!-- Logistics Modal -->
    <div id="logModal" class="custom-modal">
        <div class="custom-modal-content">
            <div class="d-flex justify-content-between mb-3">
                <h1>Logistics</h1>
                <button class="btn-close" onclick="visible('logModal')"></button>
            </div>
            <div class="list-group">
                <h4>Logistic 1</h4>
                <a href="" class="list-group-item list-group-item-action">Project Management</a>
                <a href="" class="list-group-item list-group-item-action">Warehousing</a>
                <a href="" class="list-group-item list-group-item-action">Procurement</a>
                <a href="" class="list-group-item list-group-item-action">Asset Management</a>
                <h4>Logistics 2</h4>
                <a href="" class="list-group-item list-group-item-action">Vendor Portal</a>
                <a href="" class="list-group-item list-group-item-action">Document Tracking System(Approval)</a>
                <a href="" class="list-group-item list-group-item-action">Vehicle Reservation System</a>
                <a href="" class="list-group-item list-group-item-action">Fleet Management</a>
                <a href="" class="list-group-item list-group-item-action">Audit Management</a>
            </div>
        </div>
    </div>

    <!-- Core Transaction Modal -->
    <div id="coreModal" class="custom-modal">
        <div class="custom-modal-content">
            <div class="d-flex justify-content-between mb-3">
                <h1>Core Transaction</h1>
                <button class="btn-close" onclick="visible('coreModal')"></button>
            </div>
            <div class="list-group">
                <h4>Core Transaction 1</h4>
                <a href="" class="list-group-item list-group-item-action">Patient Registration</a>
                <a href="" class="list-group-item list-group-item-action">Doctor Appointment</a>
                <a href="" class="list-group-item list-group-item-action">In Patient Management/Out Patient Management</a>
                <a href="" class="list-group-item list-group-item-action">Medical Record and Data Management</a>
                <a href="" class="list-group-item list-group-item-action">Billing & Discharge Management</a>
                <h4>Core Transaction 2</h4>
                <a href="" class="list-group-item list-group-item-action">Out Patient Treatment</a>
                <a href="" class="list-group-item list-group-item-action">HMO and Insurance Management</a>
                <a href="" class="list-group-item list-group-item-action">Surgery Scheduler</a>
                <a href="" class="list-group-item list-group-item-action">Diet Management</a>
                <a href="" class="list-group-item list-group-item-action">Laboratory Management</a>
                <h4>Core Transaction 3</h4>
                <a href="" class="list-group-item list-group-item-action">Bed and Linen Management</a>
                <a href="" class="list-group-item list-group-item-action">HOMIS Analytics</a>
                <a href="" class="list-group-item list-group-item-action">Pharmacy</a>
                <a href="" class="list-group-item list-group-item-action">Medical Package Management</a>
            </div>
        </div>
    </div>

    <!-- Financials Modal -->
    <div id="financialModal" class="custom-modal">
        <div class="custom-modal-content">
            <div class="d-flex justify-content-between mb-3">
                <h1>Financials</h1>
                <button class="btn-close" onclick="visible('financialModal')"></button>
            </div>
            <div class="list-group">
                <h4>Financials</h4>
                <a href="" class="list-group-item list-group-item-action">Disbursement</a>
                <a href="" class="list-group-item list-group-item-action">Budget Management</a>
                <a href="" class="list-group-item list-group-item-action">Collection</a>
                <a href="" class="list-group-item list-group-item-action">General Ledger</a>
                <a href="" class="list-group-item list-group-item-action">Accounts Payable/Accounts Receivables</a>
            </div>
        </div>
    </div>




    <?php require_once __DIR__ . '../../components/footer.inc.php'; ?>

    <script>
        function showModal(id) {
            const el = document.getElementById(id);
            if (el.style.display === 'flex') {
                el.style.display = 'none';
            } else {
                el.style.display = 'flex';
            }
        }
    </script>
</body>

</html>