<?php
include('../connection/config.php');

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Fetch user details
    $sql = "SELECT * FROM user WHERE id = $userId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "User not found";
        exit;
    }
} else {
    echo "User ID not specified";
    exit;
}

// Update password, username, and email if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['new_password'])) {
        $newPassword = $_POST['new_password'];

        // Update password in the database
        $updateSql = "UPDATE user SET password = '$newPassword' WHERE id = $userId";
        if ($conn->query($updateSql) === TRUE) {
            echo "Password updated successfully";
        } else {
            echo "Error updating password: " . $conn->error;
        }
    }
    // Add code to update username and email if needed
}

// Delete user if delete button is clicked
if (isset($_POST['delete_user'])) {
    $deleteSql = "DELETE FROM users WHERE id = $userId";
    if ($conn->query($deleteSql) === TRUE) {
        echo "User deleted successfully";
        exit; // Optionally, redirect or perform actions after deletion
    } else {
        echo "Error deleting user: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Settings</title>
</head>
<body>

<h2>User Settings</h2>

<form method="post" action="" enctype="multipart/form-data">
    <label for="new_password">New Password:</label>
    <input type="password" id="new_password" name="new_password" required>
    <input type="submit" value= "Update Password">
    
</form>

<form method="post" action="">
    <input type="submit" name="delete_user" value="Delete User">
</form>

<p><a href="adminuser.php">Back</a></p>
</body>
</html>
