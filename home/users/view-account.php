<?php
require_once __DIR__ . '../../../database/connect.php';
require_once __DIR__ . '../../../database/crud.php';
require_once __DIR__ . '../../components/session-start.inc.php';

$user = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $view_user_id = intval($_POST['user_id']); // Ensure it's an integer

    if ($view_user_id > 0) {
        $query = "SELECT * FROM user_tbl WHERE user_id = ?";
        $params = [$view_user_id];

        $result = executeQuery($query, $params);

        if (!empty($result)) {
            $user = $result[0]; // Get the first (and only) user
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
$pageTitle = $user ? htmlspecialchars($user['firstname']) . " " . htmlspecialchars($user['lastname']) : "User Not Found";
require_once __DIR__ . '../../components/head.inc.php';
?>
<body>
<?php require_once __DIR__ . '../../components/nav-bar.inc.php'; ?>

<?php
if ($user) {
    switch($user['gender']){
        case 'm': $pfp = BASE_URL . "/home/images/pfp-m.jpg"; break;
        case 'f': $pfp = BASE_URL . "/home/images/pfp-f.jpg"; break;
        case 'o': $pfp = BASE_URL . "/home/images/pfp-lgbtq.jpg"; break;
    }
?>
    <div style='display:flex; justify-content:center; align-items:center; margin:50px 0;'>
        <img src="<?= $pfp ?>" alt="Profile Picture" style='height:30% width:30%; border-radius:50%;'>
    </div>
    <div class='mainform'>
        <h1><?php echo htmlspecialchars($user['firstname']) . " " . htmlspecialchars($user['lastname']); ?></h1>
        <sub>Username:</sub>
        <h3><?php echo htmlspecialchars($user['username']); ?></h3>
        <sub>Gender:</sub>
        <h3><?php echo htmlspecialchars($user['gender']); ?></h3>
        <sub>Address:</sub>
        <h3><?php echo htmlspecialchars($user['address']); ?></h3>
        <sub>Date of Birth:</sub>
        <h3><?php echo htmlspecialchars($user['dateofbirth']); ?></h3>
        <sub>Role:</sub>
        <h3><?php echo htmlspecialchars($user['role']); ?></h3>
        <sub>Email:</sub>
        <h3><?php echo htmlspecialchars($user['email']); ?></h3>
        <sub>Contact Number:</sub>
        <h3><?php echo htmlspecialchars($user['contact_no']); ?></h3>
        <sub>Notes:</sub>
        <h3><?php echo htmlspecialchars($user['notes']); ?></h3>
        <sub>Joined in:</sub>
        <h3><?php echo htmlspecialchars($user['created_at']); ?></h3>

        <div class='sort-bar'>
            <a class='delete cancel' href='<?= BASE_URL ?>/home/users/manage-account.php'>Cancel</a>

            <?php if ($role === 'admin' || $user_id === $view_user_id): ?>
                <a class='update' style='display:flex; justify-content:center; align-items:center;' href='edit-account.php'>Edit Profile</a>

            <?php elseif ($role === 'admin' && $user['role'] != 'admin'): ?>
                <form action="delete-account.php" method="POST" onsubmit="return confirm('Do you really want to delete <?php echo htmlspecialchars($user['firstname']) . ' ' . htmlspecialchars($user['lastname']); ?>\'s account forever?');">
                    <input type='hidden' name='user_id' value="<?php echo htmlspecialchars($user['user_id']); ?>">
                    <button class='delete' type='submit' name='delete_profile'>TERMINATE(DELETE)</button>
                </form>

            <?php endif; ?>
        </div>
    </div>
<?php
} else {
    echo "<h1>Invalid or User Not Found</h1>";
}
?>

<?php require_once __DIR__ . '../../components/footer.inc.php'; ?>
</body>
</html>