<?php
    require_once __DIR__ . '../../../database/connect.php';
    require_once __DIR__ . '../../components/session-start.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Manage Accounts"; require_once __DIR__ . '../../components/head.inc.php'; ?>
<?php require_once __DIR__ . '../../components/nav-bar.inc.php'; ?>

<div class='display-window'>
<?php

    // Add Create Account button, for admins only
    if($role==='admin'){
        ?>
            <div class='container-bubble'>
                <button class='bubble bubble-add' onclick="window.location.href='<?= BASE_URL ?>/home/users/create-account.php'">
                    <h1>&plus;</h1>
                </button>
            </div>
        <?php
    }
    require_once __DIR__ . '../../../database/connect.php';
    require_once __DIR__ . '../../../database/crud.php';

    $query = "SELECT * FROM user_tbl";
    $result = executeQuery($query);

    // Display All the Accounts
    if (!empty($result)) {
        foreach ($result as $row) {

            switch($row['gender']){
                case 'm': $imgpath = "../images/pfp-m.jpg"; break;
                case 'f': $imgpath = "../images/pfp-f.jpg"; break;
                case 'o': $imgpath = "../images/pfp-lgbtq.jpg"; break;
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