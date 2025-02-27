<?php
require_once 'database/connect.php';
session_start();

// Initialize variables
$email = $password = '';
$emailErr = $passwordErr = '';
$loginError = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validate inputs
    if (empty($email)) {
        $emailErr = 'Email is required.';
    }
    if (empty($password)) {
        $passwordErr = 'Password is required.';
    }

    if (empty($emailErr) && empty($passwordErr)) {
        // Use prepared statements to prevent SQL injection
        $stmt = $connections->prepare("SELECT * FROM user_tbl WHERE email = ? OR username = ?");
        $stmt->bind_param("ss", $email, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Verify password
            if (password_verify($password, $row['password'])) {
                // Start secure session
                session_regenerate_id(true);

                $_SESSION['user_id'] = $row['user_id'];
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

                // Redirect to the homepage
                header("Location: home/");
                exit();
            } else {
                $loginError = 'Invalid email or password.';
            }
        } else {
            $loginError = 'Invalid email or password.';
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link href="home/css/global.css" rel="stylesheet">
</head>
<style>
    body {
        height: 100vh;
        width: 100vw;
    }

    form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    h1 {
        font-size: 4rem;
        text-align: center;
    }

    input {
        height: 30px;
        width: 450px;
        margin: 30px;
        font-size: 1.5rem;
    }

    #eye {
        font-size: 2rem;
    }

    .btn,
    #login {
        height: 60px;
        width: 600px;
        margin: 20px;
        background-color: var(--blue);
        border-radius: 15px;
    }

    #login:hover {
        background-color: var(--blue);
    }
</style>

<body>

    <h1>Bestlink General Hospital</h1>

    <form method="POST" action="">
        <!-- General Error -->
        <?php if (!empty($loginError)): ?>
            <div class='error'><?php echo htmlspecialchars($loginError); ?></div>
        <?php endif; ?>
        <div>
            <!-- Email -->
            <label for="email">Email or Username</label>
            <div>
                <input type="text" id="email" name="email" placeholder="Enter email or username"
                    value="<?php echo htmlspecialchars($email); ?>" required>
                <small class='error'><?php echo htmlspecialchars($emailErr); ?></small>
            </div>
            <!-- Password -->
            <label for="password">Password</label>
            <div>
                <input type="password" id="password" name="password" placeholder="Enter Password">
                <button id='eye' type="button" onclick="togglePassword()">👁</button>
            </div>
            <small class='error'><?php echo htmlspecialchars($passwordErr); ?></small>
        </div>

        <!-- Submit -->
        <button id='login' type="submit">Log In</button>
        <!-- <button onclick="windows.location.href=''" type='button'>I forgot my Password</button> -->
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
</body>

</html>