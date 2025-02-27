<?php
require_once __DIR__ . '../../../database/connect.php';
require_once __DIR__ . '../../../database/crud.php';
require_once __DIR__ . '../../components/session-start.inc.php';

// Initialize variables
$course_code = $name = $description = $course_id = "";
$errors = [];

// CSRF token generation
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Fetch current course data
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $course_id = filter_input(INPUT_GET, 'course_id', FILTER_SANITIZE_NUMBER_INT);

    if ($course_id) {
        // Fetch course details
        $query = "SELECT * FROM subjects WHERE id = ?";
        $result = executeQuery($query, [$course_id]);

        if (!empty($result)) {
            $course = $result[0];
            $course_code = htmlspecialchars($course['course_code']);
            $name = htmlspecialchars($course['name']);
            $description = htmlspecialchars($course['description']);
        } else {
            $errors[] = "Invalid course ID.";
        }
    } else {
        $errors[] = "Course ID is missing or invalid.";
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['csrf_token']) && hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        $course_id = filter_input(INPUT_POST, 'course_id', FILTER_SANITIZE_NUMBER_INT);
        $course_code = filter_input(INPUT_POST, 'course_code', FILTER_SANITIZE_STRING);
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);

        // Validate required fields
        if (empty($course_code) || empty($name) || empty($description)) {
            $errors[] = "Course Code, Title, and Description are required.";
        }

        if (empty($errors)) {
            // Update course data
            $updateQuery = "
                UPDATE subjects 
                SET course_code = ?, name = ?, description = ?
                WHERE id = ?
            ";
            $params = [$course_code, $name, $description, $course_id];
            executeQuery($updateQuery, $params);

            $_SESSION['success'] = "Course updated successfully!";
            header("Location: ./view-course.php?id=" . $course_id);
            exit();
        }
    } else {
        $errors[] = "Invalid CSRF token.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Update Course";
require_once __DIR__ . '../../components/head.inc.php'; ?>
<?php require_once __DIR__ . '../../components/nav-bar.inc.php'; ?>


<h1 class='title'><?= $course_code . ": " . $name ?></h1>

<!-- Error Messages -->
<?php if (!empty($errors)) : ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form class='mainform' action="" method="POST">
    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
    <input type="hidden" name="course_id" value="<?= htmlspecialchars($course_id) ?>">

    <sub>Course Code</sub>
    <input type="text" id="course_code" name="course_code" value="<?= $course_code ?>" placeholder="Enter Course Code" required>


    <sub>Title</sub>
    <input type="text" id="name" name="name" value="<?= $name ?>" placeholder="Enter Title" required>


    <sub>Description</sub>
    <textarea id="description" name="description" rows="4" placeholder="Enter Description" required><?= $description ?></textarea>

    <div style='display:flex; justify-content:space-between;'>
    <a class='delete cancel' href='<?= BASE_URL ?>/home/courses/view-course.php?id=<?php echo $course_id; ?>'>Cancel</a>
        <button type="submit" class="update">Save Changes</button>
    </div>
</form>

<?php require_once __DIR__ . '../../components/footer.inc.php'; ?>