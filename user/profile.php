<?php
include('../connection/config.php');

// Check if the form is submitted for updating user details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $newUsername = $_POST['username'];
    $newEmail = $_POST['email'];
    $newContact = $_POST['contact_number'];
    $newProfile_pic = $_POST['profile_image'];

    // Update user details in the database
    $sql = "UPDATE users SET username='$newUsername', email='$newEmail', contact_number = '$newContact', profile_image='$newProfile_pic' WHERE id=$id";
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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>User Profile</h2>
        <div class="row">
            <div class="col-md-6">
                <!-- Circular area for profile image -->
                <div class="profile-image mx-auto">
                    <img src="../profile_images/<?php echo $user['profile_image']; ?>" style="border: 3px solid black;" id="preview-image" alt="Profile Picture">
                </div>
                
            </div>
            <div class="col-md-6">
                <!-- User information -->
                <p>ID: <?php echo $user['id']; ?></p>
                <p>Username: <?php echo $user['username']; ?></p>
                <p>Email: <?php echo $user['email']; ?></p>
                <p>Password: <?php echo $user['password']; ?></p>
                <p>Contact Number: <?php echo $user['contact_number']; ?></p>
                <!-- Back button that redirects to adminuser.php -->
                <p><a href="adminuser.php" class="btn btn-secondary">Back</a></p>
            </div>
        </div>
    </div>
    <style>
    /* Additional styles specific to the profile image */
    .profile-image {
        max-width: 200px;
        max-height: 200px;
        border-radius: 50%; /* Creates a circular shape */
        overflow: hidden; /* Hides the overflow content */
        margin-bottom: 20px;
        border: 2px solid #ccc; /* Border for the circular container */
    }

    .profile-image img {
        width: 100%;
        height: auto;
    }
</style>


    <!-- Bootstrap JS and your custom script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Function to trigger file input when clicking on "Change Profile Picture" button
        function chooseFile() {
            document.getElementById("changeProfile").click();
        }

        // Preview the selected image
        function previewImage(event) {
            var input = event.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById("preview-image").src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>
