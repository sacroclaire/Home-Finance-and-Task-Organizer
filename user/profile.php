<?php
include('../connection/config.php');

// Check if the form is submitted for updating user details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $newUsername = $_POST['username'];
    $newEmail = $_POST['email'];
    $newEmail = $_POST['profile_pic'];

    // Update user details in the database
    $sql = "UPDATE users SET username='$newUsername', email='$newEmail', profile_pic='$newProfile_pic' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "User details updated successfully";
    } else {
        echo "Error updating user details: " . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Fetch user details
    $sql = "SELECT * FROM users WHERE id = $userId";
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>

<h2>User Profile</h2>

<p>Profile_pic: <?php echo $user['profile_pic']; ?></p>
<p>ID: <?php echo $user['id']; ?></p>
<p>Username: <?php echo $user['username']; ?></p>
<p>Password: <?php echo $user['password']; ?></p>

<!-- Edit button to modify user details -->
<a href="#" onclick="toggleForm()">Edit</a>

<!-- Form for editing user details (initially hidden) -->
<form id="editForm" style="display: none;" method="post" action="">
    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
    <label for="username">New Username:</label>
    <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>"><br><br>
    
    <input type="submit" value="Update">
</form>

<!-- Back button that redirects to index.php -->
<p><a href="adminuser.php">Back</a></p>

<script>
    function toggleForm() {
        var form = document.getElementById("editForm");
        form.style.display = (form.style.display === "none") ? "block" : "none";
    }
</script>

</body>
</html>
