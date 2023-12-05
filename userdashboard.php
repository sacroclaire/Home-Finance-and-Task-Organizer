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
    <style>

        /* main*/
.main{
    position: absolute;
    width: calc(100% - 300px);
    left: 300px;
    min-height: 100vh;
    background: var(--white);
    transition: 0.5s;
}
.main.active{
    width: calc(100% - 80px);
    left: 80px;
}
.topbar{
    width: 100%;
    height: 60px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 10px;
}
.toggle{
    position: relative;
    height: 60px;
    width: 60px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 2.5em;
    cursor:pointer;
}
.search{
    position: relative;
    width: 200px;
    margin: 0 25px;
}
.search label {
    position: relative;
    width: 100%;
}
.search label input{
    width: 140%;
    height: 40px;
    border-radius: 40px;
    padding: 5px 20px;
    padding-left: 50px;
    font-size: 15px;
    outline:none;
    border: 1px solid var(--orange);
}
.search label span{
    position: absolute;
    top: 0;
    left: 20px;
    font-size: 1.2em;
}
.user{
    position: relative;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    overflow: hidden;
    cursor: pointer;
}
.user img{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    padding-right: 5px;
    object-fit: cover;
}
.cardBox{
    position: relative;
    width: 100%;
    padding: 20px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 30px;    
}
.cardBox .card{
    position: relative;
    background: var(--white);
    padding: 30px;
    border-radius: 20px;
    display: flex;
    justify-content: space-between;
    cursor: pointer;
    box-shadow: 0 2px 5px rgba(0,0,0,0.5);
}
.cardBox .card .numbers{
    position: relative;
    font-weight: 500;
    font-size: 2.5em;
    color: var(--orange);
}
.cardBox .card .cardName{
    color: var(--black1);
    font-size:1.1em;
    margin-top: 5px;
}
.cardBox .card .card_icon{
    font-size: 3.5em;
    color: var(--black2);
}
.cardBox .card:hover{
    background-color: var(--orange);
}
.cardBox .card:hover .numbers,
.cardBox .card:hover .cardName,
.cardBox .card:hover .card_icon{
   color: var(--white);
}
.cardBox a{
    text-decoration: none;
}
/*Category*/
.h2{
    position: relative;
    font-size: 20px;
   padding-left: 20px;
    color: var(--orange);
}
.mini-title h2{
    font-size: 2em;
    margin-left: 20px;
    color: var(--orange);
}
.cardBox input{
    font-size: 20px;
    font-weight: 300px;
}
/*Charts Dashboard*/
.graphBox{
    position: relative;
    width: 100%;
    padding: 20px;
    display: grid;
    grid-template-columns: 1fr 2fr;
    grid-gap: 30px;
    min-height: 200px;
}
.graphBox .box{
    position: relative;
    background: #ffffff;
    padding: 20px;
    width:100%;
    box-shadow: 0 2px 5px rgba(0,0,0,0.5);
    border-radius: 20px;
}
    </style>
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


                

<!--icon link-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


</body>
</html>



