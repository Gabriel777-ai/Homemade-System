<?php
    require_once __DIR__ . '/../../database/connect.php';
    require_once __DIR__ . '/../../config-names.php';
    require_once __DIR__ . '/../../config-helper.php';

    define('BASE_URL', config('route.root'));

    ini_set('session.cookie_lifetime', 86400);
    session_start();

    if(!ISSET($_SESSION['username'])){
        ?>
            <head>
                <link rel="stylesheet" href="<?= BASE_URL ?>vendor/bootstrap/bootstrap.min.css">
                <style>
                    form {
                    background-color: #f8f9fa;
                    height: 100vh;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    }
                    .card {
                    padding: 2rem;
                    text-align: center;
                    max-width: 400px;
                    }
                </style>
            </head>
            <form method='POST' onsubmit="return logout('../')" action='<?= BASE_URL ?>/home/process_logout.php'>
                <div class='card shadow'>
                    <img src="<?= BASE_URL ?>home/images/session-expired.gif" alt="">
                    <h1 class='text-danger'>Session expired! Please Log in again!</h1>
                    <button type='submit' class="btn btn-danger">Back to Log in Page</button>
                </div>
            </form>
        <?php
        die();
    }

    $usertbl = config('database.user_tbl');
    $userid = config('database.user_id');
    $sql = "SELECT * FROM $usertbl WHERE $userid = {$_SESSION['user_id']}";
    $result = $connections->query($sql);
    if($result && $result instanceof mysqli_result && $result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $_SESSION['user_id'] = $row[$userid];
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['gender'] = $row['gender'];
            $_SESSION['address'] = $row['address'];
            $_SESSION['dateofbirth'] = $row['dateofbirth'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['contact_no'] = $row['contact_no'];
            $_SESSION['notes'] = $row['notes'];
            $_SESSION['created_at'] = $row['created_at'];
        }
    }
    // user_tbl
    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $firstname = $_SESSION['firstname'];
    $lastname = $_SESSION['lastname'];
    $gender = $_SESSION['gender'];
    $address = $_SESSION['address'];
    $dateofbirth = $_SESSION['dateofbirth'];
    $role = $_SESSION['role'];
    $email = $_SESSION['email'];
    $contact_no = $_SESSION['contact_no'];
    $notes = $_SESSION['notes'];
    $created_at = $_SESSION['created_at'];