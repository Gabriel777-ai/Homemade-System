<?php
    require_once __DIR__ . '../../../database/connect.php'; // Connection File
    require_once __DIR__ . '../../components/session-start.inc.php'; // Load Session
    require_once __DIR__ . '/../../config-helper.php'; // Load the Naming configurations
    require_once __DIR__ . '../../../database/crud.php'; // Load the CRUD functions
?>
<!DOCTYPE html>
<html lang="en"><!-- Change Page Title Here -->
<?php $pageTitle = "Sample Title"; require_once __DIR__ . '../../components/head.inc.php'; // Load CSS Links ?>
<body>
<?php require_once __DIR__ . '../../components/nav-bar.inc.php'; // Load Navigation Bar and Side Bar ?>

<div class='display-window'>
    <h1>Dapatnapo, Chester Barry A.</h1>
    <sub>Scrum Master</sub>

    <!-- Echo simply -->
    <?= "The Root Folder is: " . config('route.root'); ?>

    <!-- You can start Developing here -->
    <h3 style='color: var(--highlight-font)'>You can start developing here</h3>

    <?php
        if($role == 'admin'){   // If you are an Admin, you will see a Create Button
            ?>
                <div class='container-bubble'>
                    <button class='bubble bubble-add' onclick="window.location.href=''">
                        <h1>Sample Button</h1>
                    </button>
                </div>
            <?php
        }

        // HOW TO CALL THE CRUD FUNCTIONS


        // Read Function how to call
        // $readSample = "SELECT * FROM sample_tbl";
        // $result = executeQuery($readSample);
        //
        // if (!empty($result)) {   // Display All
        //     foreach ($result as $row) {
        //         echo "COlumn 1: " . $row['column1'] . " Column 2: " . $row['column2'] . "<br>";
        //     }
        // } else {
        //     echo "No records found.";
        // }


        // Create Function how to call
        // $createSample = create('sampletable', [
        //     'column1' => 'sample_data',
        //     'column2' => 'sample_data',
        //     'column3' => 'sample_data',
        // ]);

        
        // Update Function how to call
        // $updateSample = "
        //     UPDATE user_tbl 
        //     SET column1 = ?, column2 - ?
        //     WHERE sample_id = ?
        // ";
        // $params = [$column1, $column2, $sample_id];
        // executeQuery($updateQuery, $params);


        // Delete Function how to call
    	// $deleteSample = delete('sample_tbl', ['sample_id' => 5]);
        

        // If you want a complex example, go to home/users/ and see the files
    ?>

</div>
<?php require_once __DIR__ . '../../components/footer.inc.php'; ?> <!-- Load Footer-->
</body>
</html>