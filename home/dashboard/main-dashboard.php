<?php
    require_once __DIR__ . '../../../database/connect.php';
    require_once __DIR__ . '../../components/session-start.inc.php';
    require_once __DIR__ . '/../../config-helper.php';
    require_once __DIR__ . '../../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Dashboard"; require_once __DIR__ . '../../components/head.inc.php'; ?>
<body>
<?php require_once __DIR__ . '../../components/nav-bar.inc.php'; ?>

    <h3 style='color: var(--highlight-font)'><?= $role . " " . $pageTitle ?></h3>
    <!-- This is where everything starts aka Anchor -->
    <h6>this is where everything starts aka Anchor</h6>

    <?php
        if($role == 'admin'){
            ?>
                <h4>If you see this, you are an Admin</h4>
            <?php
        }
    ?>

<?php require_once __DIR__ . '../../components/footer.inc.php'; ?> <!-- Load Footer-->
</body>
</html>