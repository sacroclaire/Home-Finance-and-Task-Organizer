<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Finance and Task Organiner</title>
   <link rel="stylesheet" href="userdashboard.css"/>
    <!--icon link-->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!--font style sidemenu_bar-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Nosifer&family=Playfair+Display&display=swap" rel="stylesheet">
</head>
<body>
<!--SideMenu-->
    <div class="container">
        <div class="navigation">
                <ul>
                  <li>
                    <a href="">
                        <span class="icon"><ion-icon name="briefcase-outline"></ion-icon>
                        <span class="title">Home Finance <br> and Task Organizer</span>
                    </a>
                  </li>

                  <li>
                    <a href="user_profile/profile.php">
                        <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                        <span class="title">Profile</span>
                    </a>
                  </li>


                  <li>
                    <a href="">
                        <span class="icon"><ion-icon name="menu-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                  </li>
                  <li>
                    <a href="user_tasks/list.php">
                        <span class="icon"><ion-icon name="grid-outline"></ion-icon></span>
                        <span class="title">Task Management</span>
                    </a>
                  </li>
                  
                  <li>
                    <a href="user_expenses/user.php">
                        <span class="icon"><ion-icon name="wallet-outline"></ion-icon></span>
                        <span class="title">Expense <br> Management</span>
                        
                    </a>
                  </li>
                  <li>
                    <a href="login.php">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title" >Sign-out</span>
                    </a>
                  </li>
                </ul>
        </div>
    </div>

<!--Main-->
    <div class="main">
        <div class="topbar">
           
<!--Search-->
            <div class="search">
                <label>
                    <input type="text" placeholder  ="Search" > 
                    <span class="las la-search"></span>
                </label>
            </div>
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
                

<!--icon link-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


</body>
</html>



