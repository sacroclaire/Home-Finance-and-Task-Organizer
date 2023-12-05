<?php
include('db.php');

// Check if the form is submitted for updating user details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $newUsername = $_POST['username'];
    $newEmail = $_POST['email'];

    // Update user details in the database
    $sql = "UPDATE users SET username='$newUsername', email='$newEmail' WHERE id=$id";
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
    <style>
       
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Comfortaa', sans-serif;
}
:root{
    --orange: #3083ff;
    --white:#ffffff;
    --grey:#f5f5f5;
    --black1:#222;
    --black2:#999
}
body{
    min-height: 100vh;
    overflow-x: hidden;
}
.container{
    position: relative;
    width: 100%;
}
.navigation{
    position: fixed;
    width: 300px;
    height: 100%;
    background: var(--orange);
    border-left: 10px solid var(--orange);
    transition: 1s;
    overflow:hidden
}
.navigation.active{
    width: 80px;
}
.navigation ul{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
}
.navigation ul li{
    position: relative;
    width: 200%;
    list-style: none;
    padding: 20px;
    font-size: 1.2em;
    border-top-left-radius: 30px;
    border-bottom-left-radius: 30px;
}
.navigation ul li:nth-child(1){
    margin-bottom: 40px;
    pointer-events: none;
    font-size: 25px;
}
.navigation ul li:hover{
    background: var(--white);
}
.navigation ul li a{
    position: relative;
    display: block;
    width: 100%;
    display: flex;
    text-decoration: none;
    color: var(--white);
}
.navigation ul li:hover a{
    color: var(--orange );
}
.navigation ul li a.icon{
    position: relative;
    display: block;
    min-width: 60px;
    height: 60px;
    line-height: 50px;  
    text-align: center;
}
.navigation ul li a .icon ion-icon{
    font-size: 1.75em;
    padding-right: 16px;
}
.navigation ul li a.title{
    position: relative;
    display: block;
    padding: 0 10px;
    height: 60px;
    line-height: 50px;
    text-align: start;
    white-space: nowrap;
}
    </style>

<h2>User Profile</h2>

<p>ID: <?php echo $user['id']; ?></p>
<p>Username: <?php echo $user['username']; ?></p>
<p>Email: <?php echo $user['email']; ?></p>

<!-- Edit button to modify user details -->
<a href="#" onclick="toggleForm()">Edit</a>

<!-- Form for editing user details (initially hidden) -->
<form id="editForm" style="display: none;" method="post" action="">
    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
    <label for="username">New Username:</label>
    <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>"><br><br>
    <label for="email">New Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>"><br><br>
    <label for="logo">Profile Logo:</label>
    <input type="file" id="logo" name="logo"><br><br> <!-- Add the input field for the logo -->
    <input type="submit" value="Update">
</form>

<!-- Back button that redirects to index.php -->
<p><a href="user.php">Back</a></p>

<script>
    function toggleForm() {
        var form = document.getElementById("editForm");
        form.style.display = (form.style.display === "none") ? "block" : "none";
    }
</script>

</body>
</html>
