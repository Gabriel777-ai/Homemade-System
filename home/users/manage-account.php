<?php
    require_once __DIR__ . '../../../database/connect.php';
    require_once __DIR__ . '../../components/session-start.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Manage Accounts"; require_once __DIR__ . '../../components/head.inc.php'; ?>
<style>
    .display-accounts {
        display:flex; justify-content:center; align-items:center;
        flex-wrap:wrap;
        margin-top: 50px;
    }
    .account {
        display:flex; flex-direction:column; justify-content:center; align-items:center;
        margin:100px 10px;
        height:200px;
        width:200px;
        background-color: var(--bub-primary);
        border-radius: 50%;
    }
    .account button {
    }
    .account button img {
        border-radius: 50%;
        height: 100%;
        width: 100%;
    }
</style>
<body>
<?php require_once __DIR__ . '../../components/nav-bar.inc.php'; ?>

<div class='display-accounts'>
<?php

    // Create Account button visible to admins only
    if($role==='admin'){
        ?>
            <div class='account'>
                <button style="height:100%; width:100%;" onclick="window.location.href='<?= BASE_URL ?>/home/users/create-account.php'">
                    <h1>&plus;</h1>
                </button>
            </div>
        <?php
    }


    // Display All the Accounts

    require_once __DIR__ . '../../../database/connect.php';
    require_once __DIR__ . '../../../database/crud.php';

    $query = "SELECT * FROM user_tbl";
    $result = executeQuery($query);

    if (!empty($result)) {
        foreach ($result as $row) {

            switch($row['gender']){ // Picture of Account depends on their Gender
                case 'm': $imgpath = "../images/pfp-m.jpg"; break;
                case 'f': $imgpath = "../images/pfp-f.jpg"; break;
                case 'o': $imgpath = "../images/pfp-lgbtq.jpg"; break;
            }

            ?>
                <form class='account' action="view-account.php" method="POST">
                    <button type="submit" name="view_profile">
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
</body>
</html>