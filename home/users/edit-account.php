<?php
require_once __DIR__ . '../../../database/connect.php';
require_once __DIR__ . '../../../database/crud.php';
require_once __DIR__ . '../../components/session-start.inc.php';

// Initialize variables
$username = $firstname = $lastname = $gender = $address = $dateofbirth = $contact_no = $notes = $role = $email = $created_at = "";
$errors = [];

// Fetch current user data
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $userId = $_SESSION['user_id']; // Assumes logged-in user ID is stored in session

    // Fetch user details
    $query = "SELECT * FROM user_tbl WHERE user_id = ?";
    $result = executeQuery($query, [$userId]);
    if (!empty($result)) {
        $user = $result[0];
        $username = htmlspecialchars($user['username']);
        $firstname = htmlspecialchars($user['firstname']);
        $lastname = htmlspecialchars($user['lastname']);
        $gender = htmlspecialchars($user['gender']);
        $address = htmlspecialchars($user['address']);
        $dateofbirth = htmlspecialchars($user['dateofbirth']);
        $contact_no = htmlspecialchars($user['contact_no']);
        $notes = htmlspecialchars($user['notes']);
        $role = htmlspecialchars($user['role']);
        $email = htmlspecialchars($user['email']);
        $created_at = htmlspecialchars($user['created_at']);
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
    $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $dateofbirth = $_POST['dateofbirth']; // Assuming client-side validation for date format
    $contact_no = filter_input(INPUT_POST, 'contact_no', FILTER_SANITIZE_NUMBER_INT);
    $notes = htmlspecialchars($_POST['notes']);

    // Validate required fields
    if (empty($username) || empty($firstname) || empty($lastname)) {
        $errors[] = "Username, First Name, and Last Name are required.";
    }

    if (empty($errors)) {
        // Update user data
        $updateQuery = "
            UPDATE user_tbl 
            SET username = ?, firstname = ?, lastname = ?, gender = ?, address = ?, dateofbirth = ?, contact_no = ?, notes = ?
            WHERE user_id = ?
        ";
        $params = [$username, $firstname, $lastname, $gender, $address, $dateofbirth, $contact_no, $notes, $_SESSION['user_id']];
        executeQuery($updateQuery, $params);

        $_SESSION['success'] = "Profile updated successfully!";
        header("Location: profile.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Edit Profile";
require '../components/head.inc.php'; ?>
<?php require '../components/nav-bar.inc.php'; ?>

<div class="container mt-4">
    <h1 class='title'>Edit Profile</h1>

    <!-- Error Messages -->
    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form class='mainform' action="" method="POST">

        <sub>Username</sub>
        <input type="text" id="username" name="username" value="<?= $username ?>" required>

        <sub>First Name</sub>
        <input type="text" id="firstname" name="firstname" value="<?= $firstname ?>" required>

        <sub>Last Name</sub>
        <input type="text" id="lastname" name="lastname" value="<?= $lastname ?>" required>

        <sub>Gender</sub>
        <section>
            <input type="radio" id="genderM" name="gender" value="m" <?= $gender === 'm' ? 'checked' : '' ?>> Male
            <input type="radio" id="genderF" name="gender" value="f" <?= $gender === 'f' ? 'checked' : '' ?>> Female
            <input type="radio" id="genderO" name="gender" value="o" <?= $gender === 'o' ? 'checked' : '' ?>> Other
        </section>

        <sub>Address</sub>
        <input type="text" id="address" name="address" value="<?= $address ?>" required>

        <sub>Date of Birth</sub>
        <input type="date" id="dateofbirth" name="dateofbirth" value="<?= $dateofbirth ?>" required>

        <sub>Contact Number</sub>
        <input type="number" id="contact_no" name="contact_no" value="<?= $contact_no ?>" required>

        <sub>Notes</sub>
        <textarea id="notes" name="notes" rows="3"><?= $notes ?></textarea>

        <sub>Email:</sub>
        <h3><?= $email ?> (cannot be changed)</h3>

        <sub>Joined:</sub>
        <h3><?= $created_at ?></h3>

        <div class="sort-bar">
            <a class='delete cancel' href="<?= BASE_URL ?>/home/">Cancel</a>
            <button type="submit" class="update">Save Changes</button>
        </div>
    </form>
</div>

<?php require_once __DIR__ . '../../components/footer.inc.php'; ?>