<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
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
/*Charts*/
.graphBox1{
    position: relative;
    width: 100%;
    padding: 30px;
    display: grid;
    grid-template-columns: 1fr 2fr;
    grid-gap: 50px;
    min-height: 200px;
}
.graphBox1 .box1{
    position: relative;
    background: #ffffff;
    padding: 20px;
    width:100%;
    box-shadow: 0 2px 5px rgba(0,0,0,0.5);
    border-radius: 20px;
}
.graphBox .box p{
    padding: 20px;
    position: relative;
    width: 100%;
    padding-left: 5px;
    font-size: 2em;
    color: var(--orange);
}
/*dashoard*/
.details{
    position: relative;
    width: 100%;
    padding: 20px;
    display: grid;
    grid-template-columns: 2fr 1fr;
    grid-gap: 30px;
    /*margin-top: 5px;*/
}
.details .recentActivity{
    position: relative;
    display: grid;
    min-height: 200px;
    background: var(--white);
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.5);
    border-radius: 20px;
}
.details table{
    width: 100%;
}
.details table thead td{
    font-weight: 600;
}
.details .recentActivity table tr{
    color: var(--black1);
    border-bottom: 1px solid rgba(0, 0, 0, 0.8);
}
.details .recentActivity table tr:last-child{
    border-bottom: none;
}
.details .recentActivity table tr td{
    padding: 10px;
}
.details .recentActivity table tr td:last-child{
    text-align: end;
}
.details .recentActivity table td:nth-child(2){
    text-align: center;
}
.cardHeader{
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}
.cardHeader h2{
    font-weight: 600px;
    color: var(--orange);
}
.btn{
    position: relative;
    padding: 10px 10px;
    background: var(--orange);
    text-decoration: none;
    color: var(--white);
    border-radius: 6px;
}
/*User Table*/
.detailss{
    position: relative;
    width: 100%;
    padding: 20px;
    display: grid;
    /*margin-top: 5px;*/
}
.detailss .recentActivityss{
    position: relative;
    display: grid;
    min-height: 200px;
    background: var(--white);
    margin-top: 20px;
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.5);
    border-radius: 20px;
}
.detailss table{
    width: 100%;
}
.detailss table thead td{
    padding: 5px;
    font-size: 25px;
    font-weight: 600;
}
.detailss .recentActivityss table tr{
    color: var(--orange);
    border-bottom: 1px solid rgba(0, 0, 0, 0.8);
}
.detailss .recentActivityss table tr:last-child{
    border-bottom: none;
}
.detailss .recentActivityss table tr td{
    padding: 20px;
}
.detailss .recentActivityss table td:first-child{
    text-align: center;
}
.detailss .recentActivityss table tr td:last-child{
    text-align: center;
}
.detailss .recentActivityss table td:nth-child(2){
    text-align: center;
}

/*Mailbox*/
.mailbox{
    position: relative;
    width: 100%;
    padding: 20px;
    display: grid;
    
    grid-gap: 30px;
    /*margin-top: 5px;*/
}
.mailbox .message{

    position: relative;
    display: grid;
    min-height: 200px;
    background: var(--white);
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.5);
    border-radius: 20px;
}
.mailbox table{
    width: 100%;
}
.mailbox table thead td{
    padding: 5px;
    font-size: 25px;
    font-weight: 600;
    color: var(--orange);
}
.mailbox .message table tr{
    color: var(--black1);
    border-bottom: 1px solid rgba(0, 0, 0, 0.8);
}
.mailbox .message table tr:last-child{
    border-bottom: none;
}
.mailbox .message table tr td{
    padding: 10px;
}
.mailbox .message table tr td:last-child{
    text-align: center;
}
.mailbox .message table td:first-child{
    text-align: center;
}

/*Mailbox*/
.Pdetail{
    position: relative;
    width: 100%;
    padding: 20px;
    display: grid;
    /*margin-top: 5px;*/
}
.Pdetail .PrecentActivity{
    position: relative;
    display: grid;
    min-height: 200px;
    background: var(--white);
    margin-top: 20px;
    padding: 50px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.5);
    border-radius: 20px;
}
.Pdetail table{
    width: 100%;
}
.Pdetail table thead td{
    padding: 5px;
    font-size: 30px;
    font-weight: 600;
}
.Pdetail .PrecentActivity table tr{
    color: var(--black1);
    border-bottom: 1px solid rgba(0, 0, 0, 0.8);
}
.Pdetail .PrecentActivitytable tr:last-child{
    border-bottom: none;
}
.Pdetail .PrecentActivity table tr td{
    padding: 10px;
}
.Pdetail .PrecentActivitytable tr td:last-child{
    text-align: end;
}
.Pdetail .PrecentActivity table td:nth-child(2){
    text-align: center;
}

/*recent upload*/
.recentUploaded{
    position: relative;
    display: grid;
    min-height: 200px;
    background: var(--white);
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.5);
    border-radius: 20px;
}
.cardHeader h2{
    font-weight: 600px;
    color: var(--orange);
}
.recentUploaded table tr td{
        padding: 12px 10px;
}

/*to make it responsive dashboard*/
@media (max-width: 991px){
    .graphBox{
         grid-template-columns: 1fr;
         height: auto;
    }
    .navigation{
        left: -300px;
    }
    .navigation.active{
        width: 300px;
        left: 0;
    }
    .main{
        width: 100%;
        left: 0;
    }
    .main.active{
        left: 300px;
    }
    .cardBox{
        grid-template-columns: repeat(1, 1fr);
    }
}
@media (max-width: 768px){
    .mailbox .message{
        overflow-x: auto;
    }
    .detailss .recentActivityss{
        font-size: .5rem;
        overflow-x: scroll;
    }
    .details{
        grid-template-columns: repeat(1, 1fr);
    }
    .recentActivity{
        overflow-x: auto;
    }
    .status.inprogress{
        white-space: nowrap;
    }
}
@media (max-width: 480px){
    .cardBox{
        grid-template-columns: repeat(1, 1fr);
    }
    .cardHeader h2{
        font-size: 20px;
    }
    .search label input{
        width: 100%;
    }
    .user{
        min-width: 40px;
    }
    .navigation{
        width: 100%;
        left: -100%;
        z-index: 1000;
    }
    .navigation.active{
        width: 100%;
        left: 0;
    }
    .toggle{
        z-index: 10001;
    }
    .main.active .toggle{
        position: fixed;
        right: 0;
        left: initial;
        color: var(--white);
    }
}
        </style>


    <div class = "containerB">
           <div class = "profile">
            <img src = "<?php 

            

            ?>">

            <div class = "changeProfileButton">
                    <label for="changeProfile">
                                <svg xmlns="http://www.w3.org/2000/svg"  width="30" height="30" fill="green" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                    </label>


                    <input type = "file" id = "changeProfile" name = "changePicValue" value = "profilePic">

            </div>

            </div>

            <div class = "input1">
                    <label for = "fname">Fullname</label>
                    <input type = "text" name = "fname" id = "fname" class = "form-control">                   
            </div>
            <div class = "input2">
                    <label for = "age">Email</label>
                    <input type = "text" name = "age" id = "age" class = "form-control">                   
            </div>
            <div class = "input3">
                    <label for = "gmail">Password</label>
                    <input type = "text" name = "gmail" id = "gmail" class = "form-control">                   
            </div>

            <button class = "btn btn-success" id = "editBtn" value = "click" >CONFIRM EDIT</button>
    </div>
    
    
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>

        function editprofile(){

            //     var fullname = $('#fname').val();
            //     var age = $('#age').val();
            //     var gmail = $('#gmail').val();
                
          
            //      // Get the file input value
            //         var profilePath = $('#changeProfile').val();

            //     // Replace "C:\\fakepath\\" with an empty string
            //     var profilePic = profilePath.replace(/C:\\fakepath\\/i, '');


                
            //     console.log(profilePic); //check rani if me replace ba
                            

            // $.ajax({

            //         url: "../ajax/user_ajax.php",
            //         type: 'post',
            //         data: {
            //             fullname:fullname,
            //             age:age,
            //             gmail:gmail,
            //             profilePic:profilePic
                       
            //         },
            //         success: function (data, status) {
            //             refreshIfClose();
            //         }

            //         });

        }


    </script>





            <!-- function pra inig click sa close mo reload sija -->
             <script>
                    // function refreshIfClose(){
                    //     location.reload();
                    // }
             </script>
   
</body>
</html>