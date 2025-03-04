<?php
    require_once __DIR__ . '../../../database/connect.php'; // Connection File
    require_once __DIR__ . '../../components/session-start.inc.php'; // Load Session
    require_once __DIR__ . '/../../config-helper.php'; // Load the Naming configurations
    require_once __DIR__ . '../../../database/crud.php'; // Load the CRUD functions
?>
<!DOCTYPE html>
<html lang="en">
<?php
    $pageTitle = "Sample Title"; // Change Page Title Here
    require_once __DIR__ . '../../components/head.inc.php'; // Load CSS Links
    require_once __DIR__ . '../../components/nav-bar.inc.php'; //Load Navigation Bar and Side Bar
?>

<div class='display-window'>
    <h1>Sample Page</h1>
    <sub>Start Developing here</sub>

    <!-- You can start Developing here -->

    <?php
        // If you are an Admin, you will see a Create Button
        if($role == 'admin'){
            ?>
                <div class='container-bubble'>
                    <button class='bubble bubble-add' onclick="window.location.href=''">
                        <h1>Sample Button</h1>
                    </button>
                </div>
            <?php
        }

        // CALL IN THE CRUD FUNCTIONS

        // Create Function how to call
        // $createSample = create('sampletable', [
        //     'column1' => 'sample_data',
        //     'column2' => 'sample_data',
        //     'column3' => 'sample_data',
        // ]);

        // If you want a complex example, go to home/users/ and see the files
        
    ?>

</div>


<?php require_once __DIR__ . '../../components/footer.inc.php'; ?> <!-- Load Footer-->