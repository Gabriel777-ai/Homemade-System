<?php
    require_once __DIR__ . '/database/connect.php';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        require_once __DIR__ . '/database/connect.php';
        require_once __DIR__ . '/database/crud.php';
        
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = $_POST['password']; // Passwords will not be filtered.
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
        $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
        $dateofbirth = filter_input(INPUT_POST, 'dateofbirth', FILTER_SANITIZE_STRING);
        $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $contact_no = filter_input(INPUT_POST, 'contact_no', FILTER_SANITIZE_NUMBER_INT);
        $notes = htmlspecialchars($_POST[ 'notes']); // Use htmlspecialchars() for text areas

        // Hash the Password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $result = create('user_tbl', [
            'username' => $username,
            'password' => $hashedPassword,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'gender' => $gender,
            'address' => $address,
            'dateofbirth' => $dateofbirth,
            'role' => $role,
            'email' => $email,
            'contact_no' => $contact_no,
            'notes' => $notes,
        ]);
        
        if ($result['success']) {
            echo "<script>alert('" . "Account Successfully Created!" . "');</script>";
            echo "<script>" . "window.location.href = 'index.php';" . "</script>";
        } else {
            echo "<script>alert('" . $result['message'] . "');</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Account</title>
    <link rel="stylesheet" href="home/css/global.css">
    <link rel="stylesheet" href="home/css/bubble.css">
    <link rel="stylesheet" href="home/css/forms.css">
    <link rel="stylesheet" href="home/css/questions.css">
    <link rel="stylesheet" href="home/css/scores.css">
    <link rel="icon" href="/home/images/logo2.png" type="image/png">
</head>
<body>
    <h1 class='title'>Register Account</h1>

    <form class='mainform' action="" method='POST'>
        <sub>Username</sub>
        <input type='text' name='username' placeholder='Enter Username...' require autocomplete='off'></input>
        
        <sub>Password</sub>
        <span>
            <input style='width:85%;' type='password' name='password' id='password' placeholder='Enter Password...' require autocomplete='off'></input>
            <button style='font-size:2rem;' type="button" onclick="togglePassword()">👁</button>
        </span>

        <sub>Name</sub>
        <input type='text' name='firstname' placeholder='Enter Firstname...' require autocomplete='off'></input>
        <input type='text' name='lastname' placeholder='Enter Lastname...' require autocomplete='off'></input>

        <sub>Gender</sub>
        <section>
            <input type='radio' name='gender' value='m'>Male  
            <input type='radio' name='gender' value='f'>Female  
            <input type='radio' name='gender' value='o'>Other
        </section>

        <sub>Address</sub>
        <input type='text' name='address' placeholder='Enter Address...' require autocomplete='off'></input>
        
        <sub>Date of Birth</sub>
        <input type='date' name='dateofbirth' require autocomplete='off'></input>

        <div>
            <select name="role">
                <option value='patient'>patient</option>
            </select>
        </div>

        <sub>Email</sub>
        <input type='text' name='email' placeholder='Enter Email...' require autocomplete='off'></input>

        <sub>Contact no.</sub>
        <input type='number' name='contact_no' maxlength='10' placeholder='Enter Contact Number...' require autocomplete='off'></input>

        <sub>Notes</sub>
        <textarea name='notes' col='25' row='5' placeholder='Enter Notes..' require autocomplete='off'></textarea>
        
        <div class='sort-bar'>
            <a class='delete cancel' href='index.php'>Cancel</a>
            <button class='create' type='submit'>Create</button>
        </div>
    </form>
    <script src='main.js'></script>
</body>
</html>