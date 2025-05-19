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
        $emailErr = "<p class='text-danger'>Email is required.</p>";
    }
    if (empty($password)) {
        $passwordErr = "<p class='text-danger'>Password is required.</p>";
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
    <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">
    <link href="home/css/global.css" rel="stylesheet">
    <link href="home/images/bpm_logo_hospital.jpg" type="image/png" rel="icon">
</head>
<body style='margin: 0;'>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script src="main.js"></script>

<section class="h-100 gradient-form">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="home/images/bpm_logo_hospital.jpg"
                    style="width: 185px; background-color: white;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">Bestlink General Hospital</h4>
                </div>

                <form method="POST" action="">
                  <p><?php if (!empty($loginError)){ echo htmlspecialchars($loginError); } ?></p>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form2Example11">Email</label>
                    <p><?= $emailErr ?></p>
                    <input type="text" id="form2Example11" name="email" class="form-control" placeholder="Enter Username or Email Address"/>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form2Example22">Password</label>
                    <button type="button" style="border:0;" onclick="seeCharacters('form2Example22')">👁</button>
                    <p><?= $passwordErr ?></p>
                    <input type="password" id="form2Example22" name="password" class="form-control" placeholder="Enter Password" />
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Log in</button>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <a class="text-muted" href="#!">Forgot password?</a>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Don't have an account?</p>
                    <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-success" onclick="window.location.href='register-account.php'">Create new</button>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">Care through virtual devices.</h4>
                <p class="small mb-0">2025 Bestlink General Hospital.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>