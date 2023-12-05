<?php
    include("userdashboard.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <!--Main-->
    <div class="main">
        <div class="topbar">
           
<!--Search-->
<!--User Image-->
            <div class="user">
                <img src="person-circle.png" alt="Error" width="50px" height="50px">
            </div>
        </div>
<!--cards-->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <a href="user/adminuser.php">
                            <div class="numbers"></div>
                            <div class="cardName">Profile</div>
                        </a>
                    </div>
                    <div class="card_icon">
                        <ion-icon name="person-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <a href="user_tasks/list.php">
                            <div class="numbers"></div>
                                <div class="cardName">Tasks</div>
                            </div>
                        <div class="card_icon">
                        <ion-icon name="grid-outline"></ion-icon>
                       </div>
                       </a>
                </div>
                <div class="card">
                    <div>
                        <a href="user_expenses/user.php">
                            <div class="numbers"></div>
                                <div class="cardName">Expense</div>
                            </div>
                        <div class="card_icon">
                        <ion-icon name="wallet-outline"></ion-icon>
                       </div>
                       </a>
</body>
</html>