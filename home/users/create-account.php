<?php
    require_once __DIR__ . '../../../database/connect.php';
    require_once __DIR__ . '../../components/session-start.inc.php';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        require_once __DIR__ . '/../database/connect.php';
        require_once __DIR__ . '/../database/crud.php';
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $dateofbirth = $_POST['dateofbirth'];
        $role = $_POST['role'];
        $email = $_POST['email'];
        $contact_no = $_POST['contact_no'];
        $notes = $_POST['notes'];
        
        $result = create('user_tbl', [
            'username' => $username,
            'password' => $password,
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
            echo $result['message']; // Record successfully inserted
            echo 'Insert ID: ' . $result['insert_id'];
        } else {
            echo $result['message']; // Error message
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Create New Account"; require '../components/head.inc.php'; ?>
<?php require '../components/nav-bar.inc.php'; ?>

    <h1 class='title'>Create New Account</h1>

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

        <sub>Role</sub>
        <div>
            <select name="role">
                <option>none</option>
                <?php
                    require_once __DIR__ . '../../../database/connect.php';
                    require_once __DIR__ . '../../../database/crud.php';
                
                    $roles = getEnumValues('user_tbl', 'role');
                    if ($roles === false) {
                        echo "<option value=''>Error fetching roles</option>";
                    } elseif (!empty($roles)) {
                        foreach ($roles as $role) {
                            if ($role !== '') {
                                echo "<option value='$role'>$role</option>";
                            }
                        }
                    } else {
                        echo "<option value=''>No roles found</option>";
                    }
                ?>
            </select>
        </div>

        <sub>Email</sub>
        <input type='text' name='email' placeholder='Enter Email...' require autocomplete='off'></input>

        <sub>Contact no.</sub>
        <input type='number' name='contact_no' maxlength='10' placeholder='Enter Contact Number...' require autocomplete='off'></input>

        <sub>Notes</sub>
        <textarea name='notes' col='25' row='5' placeholder='Enter Notes..' require autocomplete='off'></textarea>
        
        <div class='sort-bar'>
            <a class='delete cancel' href='<?= BASE_URL ?>/home/users/manage-account.php'>Cancel</a>
            <button class='create' type='submit'>Create</button>
        </div>
    </form>

<?php require_once __DIR__ . '../../components/footer.inc.php'; ?>