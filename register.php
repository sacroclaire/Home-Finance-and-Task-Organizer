<?php
include("./connection/config.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpass = $_POST['confirmPassword'];
    $email = $_POST['email'];
    $contactNumber = $_POST['contactNumber'];

    // Check if a file is selected
    if (!empty($_FILES['profileImage']['name'])) {
        $profileImageName = $_FILES['profileImage']['name'];
        $profileImageTemp = $_FILES['profileImage']['tmp_name'];
        $profileImageType = $_FILES['profileImage']['type'];
        $profileImageSize = $_FILES['profileImage']['size'];

        // Check file type (you may want to add more file type checks)
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($profileImageType, $allowedTypes)) {

            // Move the uploaded file to a designated folder
            $uploadPath = 'profile_images/';
            $profileImagePath = $uploadPath . $profileImageName;
            move_uploaded_file($profileImageTemp, $profileImagePath);
        } else {
            echo "<script>alert('Invalid file type. Only JPG, PNG, and GIF are allowed.');</script>";
        }
    } else {
        // Default profile image if none is provided
        $profileImagePath = 'profile_images/default.png';
    }

    if ($password == $confirmpass) {

        // // Password hashing
        // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // SQL query using prepared statement
        $sql = "INSERT INTO users (username, password, confirmpass, email, contact_number, profile_image) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssssss", $username, $password, $confirmpass, $email, $contactNumber, $profileImagePath);
        mysqli_stmt_execute($stmt);
        
        // $sql = "INSERT INTO users (username,password,confirmpass,email,contactNumber,profile_image) VALUES ('$username','$password','$confirmpass','$email','$contactNumber','$profileImagePath)";
        // mysqli_query($conn,$sql);

        // Redirect after successful registration
        header("Location: login.php");
        exit();
    } else {
        echo "<script>alert('Password doesn\'t match');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="register.css">
</head>

<body>
    <div class="container">
        <div class="registration form">
            <header>Signup</header>
            <form action="register.php" method="post" enctype="multipart/form-data">
                

                <input type="text" placeholder="Enter your username" name="username" required>
                <input type="password" placeholder="Create a password" name="password" required>
                <input type="password" placeholder="Confirm your password" name="confirmPassword" required>
                <input type="email" placeholder="Enter your email" name="email" required>
                <input type="text" placeholder="Enter your contact number" name="contactNumber" required>
                <!-- Existing input fields -->
                <input type="file" name="profileImage" accept="image/jpeg, image/png, image/gif">
                <!-- Add an input field for profile image -->
                <input type="submit" class="button" value="Signup">
            </form>
            <div class="signup">
                <span class="signup">Already have an account?
                    <a href="login.php">Log in</a>
                </span>
            </div>
        </div>
    </div>
</body>

</html>
