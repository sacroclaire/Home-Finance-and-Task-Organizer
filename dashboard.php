
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
        include("../adminsidebar.php");
?>
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
                        <a href="../user/adminuser.php">
                            <div class="numbers">3</div>
                            <div class="cardName">Total Users</div>
                        </a>
                    </div>
                    <div class="card_icon">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <a href="../expense/user.php">
                            <div class="numbers"></div>
                                <div class="cardName">Finance</div>
                            </div>
                        <div class="card_icon">
                        <ion-icon name="wallet-outline"></ion-icon>
                       </div>
                       </a>
                </div>
                <div class="card">
                    <div>
                        <a href="../taskmanagement/list.php">
                            <div class="numbers">5</div>
                                <div class="cardName">Tasks</div>
                            </div>
                        <div class="card_icon">
                        <ion-icon name="grid-outline"></ion-icon>
                       </div>
                       </a>
                

</body>
</html>