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
                <div class="dept-tile text-dark" style='background-color: rgb(0, 174, 153);' onclick="visible('hrModal')">
                    <i class="bi bi-people-fill fs-1 mb-2"></i>
                    <h5>Human Resources</h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="dept-tile text-white" style='background-color: rgb(68, 0, 153);' onclick="visible('logModal')">
                    <i class="bi bi-truck fs-1 mb-2"></i>
                    <h5>Logistics</h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="dept-tile text-dark" style='background-color: yellow;' onclick="visible('coreModal')">
                    <i class="bi bi-clipboard-data-fill fs-1 mb-2"></i>
                    <h5>Core Transaction</h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="dept-tile text-white" style='background-color: red;' onclick="visible('financialModal')">
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
                <?php
                    require_once __DIR__ . '/../../config-helper.php';

                    $routes = config('route');
                    if (isset($routes['hr12'])) {
                        foreach ($routes['hr12'] as $buttonLabel => $fileLocation) {
                        ?>
                            <a href="<?= $fileLocation ?>" class="list-group-item list-group-item-action"><?= $buttonLabel ?></a>
                        <?php
                        }
                    }
                ?>
                <h4>HR Part 3-4</h4>
                <?php
                    if (isset($routes['hr34'])) {
                        foreach ($routes['hr34'] as $buttonLabel => $fileLocation) {
                        ?>
                          <a href="<?= $fileLocation ?>" class="list-group-item list-group-item-action"><?= $buttonLabel ?></a>
                        <?php
                        }
                    }
                ?>
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
                <?php
                    if (isset($routes['log1'])) {
                        foreach ($routes['log1'] as $buttonLabel => $fileLocation) {
                        ?>
                            <a href="<?= $fileLocation ?>" class="list-group-item list-group-item-action"><?= $buttonLabel ?></a>
                        <?php
                        }
                    }
                ?>
                <h4>Logistics 2</h4>
                <?php
                    if (isset($routes['log2'])) {
                        foreach ($routes['log2'] as $buttonLabel => $fileLocation) {
                        ?>
                            <a href="<?= $fileLocation ?>" class="list-group-item list-group-item-action"><?= $buttonLabel ?></a>
                        <?php
                        }
                    }
                ?>
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
                <?php
                    if (isset($routes['core1'])) {
                        foreach ($routes['core1'] as $buttonLabel => $fileLocation) {
                        ?>
                            <a href="<?= $fileLocation ?>" class="list-group-item list-group-item-action"><?= $buttonLabel ?></a>
                        <?php
                        }
                    }
                ?>
                <h4>Core Transaction 2</h4>
                <?php
                    if (isset($routes['core2'])) {
                        foreach ($routes['core2'] as $buttonLabel => $fileLocation) {
                        ?>
                            <a href="<?= $fileLocation ?>" class="list-group-item list-group-item-action"><?= $buttonLabel ?></a>
                        <?php
                        }
                    }
                ?>
                <h4>Core Transaction 3</h4>
                <?php
                    if (isset($routes['core3'])) {
                        foreach ($routes['core3'] as $buttonLabel => $fileLocation) {
                        ?>
                            <a href="<?= $fileLocation ?>" class="list-group-item list-group-item-action"><?= $buttonLabel ?></a>
                        <?php
                        }
                    }
                ?>
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
                <?php
                    if (isset($routes['fin'])) {
                        foreach ($routes['fin'] as $buttonLabel => $fileLocation) {
                        ?>
                            <a href="<?= $fileLocation ?>" class="list-group-item list-group-item-action"><?= $buttonLabel ?></a>
                        <?php
                        }
                    }
                ?>
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