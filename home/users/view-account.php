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
<?php require_once __DIR__ . '../../components/nav-bar.inc.php'; ?>

<?php
if ($user) {
    if ($user['gender'] === 'm') {
        $pfp = BASE_URL . "/home/images/pfp-m.jpg";
    } elseif ($user['gender'] === 'f') {
        $pfp = BASE_URL . "/home/images/pfp-f.jpg";
    } elseif ($user['gender'] === 'o') {
        $pfp = BASE_URL . "/home/images/pfp-lgbtq.jpg";
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

            <?php if ($user_id == $user['user_id']): ?>
                <a class='update' style='display:flex; justify-content:center; align-items:center;' href='edit-account.php'>Edit Profile</a>

            <?php elseif ($role === 'admin' && $user['role'] != 'admin'): ?>
                <form action="delete-account.php" method="POST" onsubmit="return confirm('Do you really want to delete <?php echo htmlspecialchars($user['firstname']) . ' ' . htmlspecialchars($user['lastname']); ?>\'s account forever?');">
                    <input type='hidden' name='user_id' value="<?php echo htmlspecialchars($user['user_id']); ?>">
                    <button class='delete' type='submit' name='delete_profile'>TERMINATE(DELETE)</button>
                </form>

            <?php endif; ?>
        </div>

        <?php if ($role != 'student' ||  $user_id == $user['user_id']): ?>
            <h2><?php echo htmlspecialchars($user['firstname']); ?>'s Scores summary</h2>
            <section class='scores'>
                <?php
                require_once __DIR__ . '/../../database/connect.php'; // Adjust path as necessary

                // Fetch quizzes from the database
                $query = "SELECT quizzes.title, subjects.course_code
                            FROM quizzes
                            JOIN subjects ON quizzes.subject_id = subjects.id
                            ORDER BY course_code";

                $result = $connections->query($query);

                if ($result && $result->num_rows > 0): ?>
                    <table class='scores'>
                        <thead>
                            <tr style='border:1px solid var(--darkgrey)'>
                                <th><h2>Course</h2></th>
                                <th><h2>Title</h2></th>
                                <th><h2>Score</h2></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            while ($quiz = $result->fetch_assoc()) {
                                // Temporary placeholder for scores
                                // $placeholderScore = rand(0, 100); // Random number between 0 and 100
                                $placeholderScore = "--"; // Random number between 0 and 100

                                echo "<tr>";
                                echo "<td>{$quiz['course_code']}</td>";
                                echo "<td>{$quiz['title']}</td>";
                                echo "<td>{$placeholderScore}%</td>";
                                echo "</tr>";
                            }
                            ?>

                        </tbody>
                    </table>
                <?php else: ?>
                    <p>No quizzes found in the database.</p>
                <?php endif; ?>
            </section>
        <?php endif; ?>
    </div>
<?php
} else {
    echo "<h1>Invalid or User Not Found</h1>";
}
?>

<?php require_once __DIR__ . '../../components/footer.inc.php'; ?>