<?php
require_once __DIR__ . '../../../database/connect.php';
require_once __DIR__ . '../../components/session-start.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once __DIR__ . '../../../database/crud.php';

    $course_code = $_POST['course_code'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    $connections->autocommit(FALSE); // Disable auto-commit
    try {
        // Insert new course
        $result = create('subjects', [
            'course_code' => $course_code,
            'name' => $name,
            'description' => $description,
        ]);

        if (!$result['success']) {
            throw new Exception("Failed to insert course.");
        }

        echo $result['message'];
        echo 'Insert ID: ' . $result['insert_id'];
        $subject_id = $result['insert_id'];


        
        // Insert quizzes for new course
        for ($i = 1; $i <= 18; $i++) {
            $quizTitle = "Quiz $i";
            $quizResult = executeQuery(
                "INSERT INTO quizzes (subject_id, title) VALUES (?, ?)",
                [$subject_id, $quizTitle]
            );

            if (!$quizResult) {
                throw new Exception("Failed to insert quizzes.");
            }

            $quiz_id = $connections->insert_id;

            // Insert 10 questions for each quiz
            for ($j = 1; $j <= 10; $j++) {
                $questionText = "Default Question $j for Quiz $quiz_id";
                $questionResult = executeQuery(
                    "INSERT INTO questions (quiz_id, question_text) VALUES (?, ?)",
                    [$quiz_id, $questionText]
                );

                if (!$questionResult) {
                    throw new Exception("Failed to insert questions.");
                }

                $question_id = $connections->insert_id;

                // Insert 4 options for each question
                for ($k = 1; $k <= 4; $k++) {
                    $optionText = "Default Option $k for Question $question_id";
                    $isCorrect = ($k === 1) ? 1 : 0;

                    $optionResult = executeQuery(
                        "INSERT INTO options (question_id, option_text, is_correct) VALUES (?, ?, ?)",
                        [$question_id, $optionText, $isCorrect]
                    );

                    if (!$optionResult) {
                        throw new Exception("Failed to insert options.");
                    }
                }
            }
        }

        // Commit
        $connections->commit();
        echo "Course, quizzes, questions, and options added successfully!";
    } catch (Exception $e) {
        // Rollback if any error occurs
        $connections->rollback();
        echo "Error: " . $e->getMessage();
    } finally {
        $connections->autocommit(TRUE); // Re-enable auto-commit
    }
}
?>


<!--
begin try
 begin transaction
 update employee set e_age = 30 where e_name = 'Chester';
 commit transaction

end try
begin catch
 rollback transaction
end catch
 -->

<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Create New Course";
require_once __DIR__ . '../../components/head.inc.php'; ?>
<?php require_once __DIR__ . '../../components/nav-bar.inc.php'; ?>

<h1 class='title'>Create New Course</h1>

<form class='mainform' action="" method='POST'>

    <sub>Course Code</sub>
    <input type='text' name='course_code' placeholder='Enter Course Code...' require autocomplete='off'></input>


    <sub>Name</sub>
    <input type='text' name='name' placeholder='Enter Title...' require autocomplete='off'></input>


    <sub>Description</sub>
    <textarea name='description' style='height:100px;' col='25' row='5' placeholder='Enter Description...' require autocomplete='off'></textarea>

    <sub></sub>
    <h3>Quizzes will be automatically created for this course along with four options, modify them respectively</h3>

    <div class='sort-bar'>
        <a class='delete cancel' href='<?= BASE_URL ?>/home/courses/manage-course.php'>Cancel</a>
        <button class='create' type='submit'>Submit</button>
    </div>
</form>

<?php require_once __DIR__ . '../../components/footer.inc.php'; ?>