<?php
    require_once __DIR__ . '../../../database/connect.php';
    require_once __DIR__ . '../../../database/crud.php';
    require_once __DIR__ . '../../components/session-start.inc.php';

    if(ISSET($_GET['id']) && IS_NUMERIC($_GET['id'])){
        $course_id = intval($_GET['id']);
        $course = executeQuery("SELECT * FROM subjects WHERE id = ?", [$course_id]);

        if(!empty($course)){
            $course = $course[0];
            $quizzes = executeQuery("SELECT * FROM quizzes WHERE subject_id = ?", [$course_id]);
        }else{
            echo "<h1>Course not found.</h1>";
            exit;
        }
    }else{
        echo "<h1>Invalid course ID.</h1>";
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = $course['name']; require_once __DIR__ . '../../components/head.inc.php'; ?>
<?php require_once __DIR__ . '../../components/nav-bar.inc.php'; ?>
    
    <!-- Success Messages -->
    <?php if (!empty($_SESSION['success'])) : ?>
        <div class="alert alert-success">
            <?= htmlspecialchars($_SESSION['success']); ?>
            <?php unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>
    
<div>
    <h1 class='title'><?php echo htmlspecialchars($course['course_code'].": ".$course['name']); ?></h1>
    <div class='titleSection'>
        <h4><?php echo htmlspecialchars($course['description']); ?></h4>
    </div>
    <hr style='border-top:6px solid var(--blue); box-shadow: var(--shadow);'>
    <div class='display-window'>
        <?php if(!empty($quizzes)): 
            foreach ($quizzes as $quiz): ?>
                <div class='container-bubble'>
                    <button class='bubble' style='background: linear-gradient(90deg, var(--secondary) 0%, var(--blue) 100%); color:var(--primary);' type='submit' name='view_quiz'>    
                        <h4><?php echo htmlspecialchars("Module for " .$quiz['title']); ?></h4>
                        <input type='hidden' name='id' value="">
                        <input type="hidden" name="course_id" value="">
                    </button>
                </div>
                <form class='container-bubble' action='quiz/questions.php' method='GET' 
                <?php if($role == 'student'):?>
                onsubmit="return confirm('Are you sure you want to start answering <?php echo htmlspecialchars($quiz['title']); ?>?')"
                <?php endif; ?>>
                    <button class='bubble' type='submit' name='view_quiz'>    
                        <h4><?php echo htmlspecialchars($course['course_code']." ".$course['name']. ": " .$quiz['title']); ?></h4>
                        <input type='hidden' name='id' value="<?php echo htmlspecialchars($quiz['id']); ?>">
                        <input type="hidden" name="course_id" value="<?php echo htmlspecialchars($course_id); ?>">
                    </button>
                </form>
                <hr style='width:100%; border-top:6px solid var(--blue); box-shadow: var(--shadow);'>
            <?php endforeach; ?>
        <?php else: ?>
            <h3>No quizzes available for this course.</h3>
        <?php endif; ?>
    </div>

    <?php if($role === 'admin' || $role == 'teacher'): ?>

    <form class='sort-bar' action="edit-course.php" method="GET">
    <a class='delete cancel' href='<?= BASE_URL ?>/home/courses/manage-course.php'>Cancel</a>
        <input type='hidden' name='course_id' value="<?php echo htmlspecialchars($course_id); ?>">
        <button class='update' type='submit' name='edit_course'>Edit Course</button>
    </form>

    <?php endif; ?>
</div>

<?php require_once __DIR__ . '../../components/footer.inc.php'; ?>