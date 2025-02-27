<?php
    require_once __DIR__ . '../../../database/connect.php';
    require_once __DIR__ . '../../components/session-start.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Manage Course"; require_once __DIR__ . '../../components/head.inc.php'; ?>
<?php require_once __DIR__ . '../../components/nav-bar.inc.php'; ?>

<div class='sort-bar'>
    <!-- Sorting Algorithm -->
    <form method="GET" action="">
        <label for="sort"></label>
        <select class='selectarea' name="sort" id="sort" onchange="this.form.submit()">
            <option value="newest" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'newest') echo 'selected'; ?>>Newest</option>
            <option value="oldest" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'oldest') echo 'selected'; ?>>Oldest</option>
            <option value="name_asc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'name_asc') echo 'selected'; ?>>Name (A-Z)</option>
            <option value="name_desc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'name_desc') echo 'selected'; ?>>Name (Z-A)</option>
        </select>
    </form>
</div>
    <?php
        require_once __DIR__ . '../../../database/connect.php';
        require_once __DIR__ . '../../../database/crud.php';

        $sortOption = isset($_GET['sort']) ? $_GET['sort'] : 'newest'; // Default to 'newest'

        $orderBy = '';
        switch ($sortOption) {
            case 'newest': $orderBy = 'created_at DESC'; break;
            case 'oldest': $orderBy = 'created_at ASC'; break;
            case 'name_asc': $orderBy = 'name ASC'; break;
            case 'name_desc': $orderBy = 'name DESC'; break;
            default: $orderBy = 'created_at DESC'; // Default sorting
        }
    ?>

<!-- Display Courses -->
<div class='display-window'>
    <?php if($role==='admin'):?>
        <div class='container-bubble'>
            <button class='bubble bubble-add' onclick="window.location.href='<?= BASE_URL ?>/home/courses/create-course.php'">
                <h1>&plus;</h1>
            </button>
        </div>
    <?php endif; ?>
    <?php
        require_once __DIR__ . '../../../database/connect.php';
        require_once __DIR__ . '../../../database/crud.php';

        // Handle Search
        $searchTerm = isset($_GET['search']) ? '%' . $_GET['search'] . '%' : null;

        $query = "SELECT * FROM subjects";
        $params = [];

        if ($searchTerm) {
            $query .= " WHERE name LIKE ? OR course_code LIKE ?";
            $params = [$searchTerm, $searchTerm];
        }
        $query .= " ORDER BY $orderBy";

        $result = executeQuery($query, $params);

        // $query = "SELECT * FROM subjects ORDER BY $orderBy";
        // $result = executeQuery($query);
        if(!empty($result)){
            foreach($result as $row){
                ?>
                    <form class='container-bubble' action="view-course.php" method="GET">
                        <button class='bubble' type='submit' name='view_course'>
                            <h1><strong><?php echo htmlspecialchars($row['course_code']); ?>: </strong><?php echo htmlspecialchars($row['name']); ?></h1>
                            <input type='hidden' name='id' value="<?php echo htmlspecialchars($row['id']); ?>">
                        </button>
                    </form>
                <?php
            }
        }else{
            echo "No Courses found.";
        }
    ?>
</div>
<?php require_once __DIR__ . '../../components/footer.inc.php'; ?>