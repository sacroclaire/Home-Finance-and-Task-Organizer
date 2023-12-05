<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete User</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap-theme.min.css">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Function to confirm user deletion
        function confirmDelete() {
            return confirm("Are you sure you want to delete this user?");
        }
    </script>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <?php
                include('../connection/config.php');

                if (isset($_GET['id']) && !empty($_GET['id'])) {
                    $userId = $_GET['id'];

                    // Prepare a delete statement
                    $sql = "DELETE FROM users WHERE id = ?";
                    
                    // Using prepared statements to prevent SQL injection
                    if ($stmt = $conn->prepare($sql)) {
                        // Bind variables to the prepared statement as parameters
                        $stmt->bind_param("i", $userId);

                        // Alert action before deleting
                        echo '<script>
                                if (confirmDelete()) {
                                    // Attempt to execute the prepared statement
                                    if ('.$stmt->execute().') {
                                        // Redirect back to user dashboard after successful deletion
                                        window.location.href = "../user/adminuser.php";
                                    } else {
                                        alert("Error deleting user.");
                                    }
                                } else {
                                    // Redirect back to user dashboard without deletion
                                    window.location.href = "../user/adminuser.php";
                                }
                            </script>';
                        
                        // Close statement
                        $stmt->close();
                    }

                    // Close connection
                    $conn->close();
                } else {
                    echo '<div class="alert alert-warning" role="alert">Invalid user ID.</div>';
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
