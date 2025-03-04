<?php
    require_once __DIR__ . '../../database/connect.php';
    require_once __DIR__ . '../components/session-start.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Home"; require_once __DIR__ . '../components/head.inc.php'; ?>
<body>
<?php require_once __DIR__ . '../components/nav-bar.inc.php'; ?>

    <header style='display:flex; flex-direction:column; justify-content:center; align-items:center; margin:60px 0 100px 0;'>
        <h1 style='font-size:3.9rem;'>Bestlink General Hospital</h1>
        <h2 style='font-size:3rem;'>Welcome, <?php echo htmlspecialchars($role . " - " . $username); ?></h2>
        <p style='font-size:1.5rem;'>Care through virtual devices.</p>
    </header>

<?php require_once __DIR__ . '../components/footer.inc.php'; ?>
</body>
</html>