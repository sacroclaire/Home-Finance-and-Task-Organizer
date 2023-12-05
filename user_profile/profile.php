<?php
session_start();
include("../connection/config.php");

//Update Profile Code
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file is selected
    if (!empty($_FILES['changePicValue']['username'])) {
        $uploadDir = '../profile_images/'. basename($_FILES['changePicValue']['name']);

        $image =  $_FILES['changePicValue']['image'];
        $tmp_location = $_FILES['changePicValue']['tmp_name'];

        if (move_uploaded_file($temp_location, $propicPath)) {
            $userId = $_SESSION['id'];
            $updatePropicQuery = "UPDATE registrations SET profile = '$propicName' WHERE id = $userId";
            mysqli_query($conn,$updatePropicQuery);
        } else {
            $error = 'Error uploading file.';
            echo "<script>alert($error)</script>";
        }
    }

    $userId = $_SESSION['id'];
    $newUsername = $_POST['username'];
    $newEmail = $_POST['email'];
    $newContact = $_POST['contact_number'];
    $newPic = $_POST['changeprofile'];

    $updateUserQuery = "UPDATE users SET username = '$newUsername', email = '$newEmail', contact_number = '$newContact' WHERE id = $userId";
mysqli_query($conn, $updateUserQuery);
header('Location: profile.php');
exit();

}
?>
<?php
// Fetch user info including profile image
$id = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($conn, $sql);
$check = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel = "stylesheet" href = "../css/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <scrip src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></scrip>
</head>
<body>

    <div class = "containerB">
           <div class = "profile">
           <img src="../profile_images/<?php echo $check['profile_image'];?>" style="border: 3px solid black;" id="preview-image" alt="Profile Picture">

        <form action="profile.php" method="post" enctype="multipart/form-data">
            <div class = "changeProfileButton">
                    <label for="changeProfile">
                        <svg xmlns="http://www.w3.org/2000/svg"  width="30" height="30" fill="green" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                    </label>
        
                    

            </div>

            </div>

            <div class = "input1">
                <label for = "username">Username</label>
                <input type = "text" name = "username" id = "username" class = "form-control" value="<?php echo $check['username'];?>" required>                   
            </div>
           
            <div class = "input2">
                    <label for = "email"></label>Email
                    <input type = "text" name = "email" id = "email" class = "form-control" value="<?php echo $check['email'];?>" required>                   
            </div>
            <div class = "input3">
                    <label for = "contact_number">Contact Number</label>
                    <input type = "text" name = "contact_number" id = "contact_number" class = "form-control" value="<?php echo $check['contact_number'];?>" required>                   
            </div>

            <button class = "btn btn-primary" id = "editBtn" value = "click" onclick="editprofile()">CONFIRM EDIT</button>
            </form>
            <a href="../userdashboard.php"><button class = "btn btn-primary" id = "editBtn"   >Home</button></a> 
     
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>   
    
    <script>
    // Function to Preview Image
    function previewImage(event) {
        var preview = document.getElementById('preview-image');
        preview.src = URL.createObjectURL(event.target.files[0]);
        preview.style.display = 'block';
    }

    </script>
</body>
</html>