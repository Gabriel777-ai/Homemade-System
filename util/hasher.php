<?php
require_once __DIR__.'/../database/connect.php';

// Hash all Passwords

$query = "SELECT user_id, password FROM user_tbl";
$result = $connections->query($query);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $user_id = $row['user_id'];
        $plainPassword = $row['password'];

        // Hash the plain-text password
        $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

        // Update the database with the hashed password
        $updateQuery = $connections->prepare("UPDATE user_tbl SET password = ? WHERE user_id = ?");
        $updateQuery->bind_param("si", $hashedPassword, $user_id);
        $updateQuery->execute();
    }
    echo "Passwords have been hashed successfully!";
} else {
    echo "No users found or error in query.";
}
?>
