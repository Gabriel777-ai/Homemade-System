<?php
    require_once __DIR__ . '../../../database/connect.php';
    require_once __DIR__ . '../../components/session-start.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Manage Accounts"; require_once __DIR__ . '../../components/head.inc.php'; ?>
<?php require_once __DIR__ . '../../components/nav-bar.inc.php'; ?>

<div class='sort-bar'>
    <div>
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

    <!-- Filtering Algorithm -->
    <form method="GET" action="">
        <label for="filter"></label>
        <select class='selectarea' name="filter" id="filter" onchange="this.form.submit()">
            <option value="student" <?php if (isset($_GET['filter']) && $_GET['filter'] == 'student') echo 'selected'; ?>>Patient</option>
            <option value="teacher" <?php if (isset($_GET['filter']) && $_GET['filter'] == 'teacher') echo 'selected'; ?>>Teacher</option>
            <option value="admin" <?php if (isset($_GET['filter']) && $_GET['filter'] == 'admin') echo 'selected'; ?>>Admin</option>
            <option value="all" <?php if (isset($_GET['filter']) && $_GET['filter'] == 'all') echo 'selected'; ?>>All</option>
        </select>
    </form>
    </div>
</div>

<div class='display-window'>
    <?php if($role==='admin'):?>
        <div class='container-bubble'>
            <button class='bubble bubble-add' onclick="window.location.href='<?= BASE_URL ?>/home/users/create-account.php'">
                <h1>&plus;</h1>
            </button>
        </div>
    <?php endif; ?>
<?php
    require_once __DIR__ . '../../../database/connect.php';
    require_once __DIR__ . '../../../database/crud.php';

    // Sorting Logic
    $sortOption = isset($_GET['sort']) ? $_GET['sort'] : 'newest';
    $orderBy = '';
    switch ($sortOption) {
        case 'newest': $orderBy = 'created_at DESC'; break;
        case 'oldest': $orderBy = 'created_at ASC'; break;
        case 'name_asc': $orderBy = 'lastname ASC'; break;
        case 'name_desc': $orderBy = 'lastname DESC'; break;
        default: $orderBy = 'created_at DESC'; // Default sorting
    }

    // Filtering Logic
    $filterOption = isset($_GET['filter']) ? $_GET['filter'] : 'student';
    $condition = '';
    $params = [];
    if ($filterOption !== 'all') {
        $condition = "role = ?";
        $params[] = $filterOption;
    }

    // Search Logic
    $searchTerm = isset($_GET['search']) ? '%' . $_GET['search'] . '%' : null;
    if ($searchTerm) {
        if ($condition) {
            $condition .= " AND (firstname LIKE ? OR lastname LIKE ?)";
        } else {
            $condition = "(firstname LIKE ? OR lastname LIKE ?)";
        }
        $params[] = $searchTerm;
        $params[] = $searchTerm;
    }

    // Final Query
    $query = "SELECT * FROM user_tbl";
    if ($condition) {
        $query .= " WHERE $condition";
    }
    $query .= " ORDER BY $orderBy";

    // Execute the Query
    $result = executeQuery($query, $params);

    // Display Users
    if (!empty($result)) {
        foreach ($result as $row) {
            if($row['gender'] === 'm'){
                $imgpath = "../images/pfp-m.jpg";
            }elseif($row['gender'] === 'f'){
                $imgpath = "../images/pfp-f.jpg";
            }elseif($row['gender'] === 'o'){
                $imgpath = "../images/pfp-lgbtq.jpg";
            }
            ?>
                <form class='container-account-bubble' action="view-account.php" method="POST">
                    <button class='bubble account-bubble' type="submit" name="view_profile">
                        <img src='<?= $imgpath ?>' alt="Profile Picture">
                        <div>
                            <p><strong><?php echo htmlspecialchars($row['lastname'] . ", " . $row['firstname']); ?></strong></p>
                            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($row['user_id']); ?>">
                        </div>
                    </button>
                </form>
            <?php
        }
    } else {
        echo "No records found.";
    }
?>
</div>

<?php require_once __DIR__ . '../../components/footer.inc.php'; ?>