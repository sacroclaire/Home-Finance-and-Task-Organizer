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