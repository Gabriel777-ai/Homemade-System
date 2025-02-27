<?php
require_once __DIR__ . '../../../../database/connect.php';
require_once __DIR__ . '../../../../database/crud.php';
require_once __DIR__ . '../../../components/session-start.inc.php';

if (ISSET($_GET['id']) && IS_NUMERIC($_GET['id'])) {
    $quiz_id = intval($_GET['id']);
    $course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : null; // Capture course_id

    $quiz = executeQuery("SELECT * FROM quizzes WHERE id = ?", [$quiz_id]);
    if (!empty($quiz)) {
        $quiz = $quiz[0];
        $questions = executeQuery("SELECT * FROM questions WHERE quiz_id = ?", [$quiz_id]);
    } else {
        echo "<h1>Quiz not found.</h1>";
        exit;
    }

    $result = executeQuery("SELECT * FROM subjects WHERE id = ?", [$course_id]);
    if (!empty($result)) {
        $course = $result[0];
        $course_code = $course['course_code'];
        $course_name = $course['name'];
        $course_description = $course['description'];
    } else {
        echo "<h1>Course not found.</h1>";
        exit;
    }
} else {
    echo "<h1>Invalid Course ID.</h1>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = $quiz['title']; require_once __DIR__ . '../../../components/head.inc.php'; ?>
<body>
<?php require_once __DIR__ . '../../../components/nav-bar.inc.php'; ?>

    <div class='titleSection'>
        <h1><?php echo htmlspecialchars($course_code. ": ".$quiz['title']); ?></h1>
        <?php if($role==='admin'): ?>
            <p>You are in editing mode! Select the correct option in the questions to designate them as correct.</p>
        <?php elseif($role==='student'): ?>
            <p>Choose the correct answer among the options given, break a leg!</p>
        <?php endif; ?>
    </div>
<?php if (!empty($questions)): ?>
    <form class='mainform' action="<?php if ($role === 'admin') echo 'edit-quiz.php'; elseif($role === 'student') echo 'submit-quiz.php'; ?>" method="POST">
        <?php foreach ($questions as $index => $question): ?>
            <div class='question'>
                <sub>Question <?php echo $index + 1; ?></sub>
                <?php if ($role === 'admin'): ?>
                    <textarea name='' col='25' row='5' placeholder='Enter Notes..' require autocomplete='off'><?php echo htmlspecialchars($question['question_text']); ?></textarea>
                <?php else: ?>
                    <h3><?php echo htmlspecialchars($question['question_text']); ?></h3>
                <?php endif; ?>

                <div class='options'>
                    <span><input type='radio' name='answers[<?php echo $question['id']; ?>]' value=''>a.</span>
                    <span><input type='radio' name='answers[<?php echo $question['id']; ?>]' value=''>b.</span>
                    <span><input type='radio' name='answers[<?php echo $question['id']; ?>]' value=''>c.</span>
                    <span><input type='radio' name='answers[<?php echo $question['id']; ?>]' value=''>d.</span>
                </div>
            </div>
        <?php endforeach; ?>
        <div class='sort-bar'>
            <input type="hidden" name="quiz_id" value="<?php echo $quiz_id; ?>">
            <a class='delete cancel' href='<?= BASE_URL ?>/home/courses/view-course.php?id=<?php echo $course_id; ?>'>Cancel</a>
            <?php if ($role != 'teacher'): ?>
                <button class='create' type="submit">Submit</button>
            <?php endif; ?>
        </div>
    </form>
<?php else: ?>
    <h4>No questions available for this quiz.</h4>
<?php endif; ?>

<?php require_once __DIR__ . '../../../components/footer.inc.php'; ?>
</body>
</html>