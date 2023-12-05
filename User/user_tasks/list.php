<?php
    include("../connection/config.php");
    include("../userdashboard.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel = "stylesheet" href = "list.css">     
    <title>Daily Task Management List</title>
    <style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

.container table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 150px;
    margin-left: 350px;
    border-radius: 10px;
    font-family: 'Poppins', sans-serif;
}
.container h2{
    text-align: center;
    margin-top: 50px;
    margin-right: -200px ;
}
.container tr th{
    text-align: center;
}
th, td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
}

th {
    background-color: #02050a;
    color: white;
}

a {
    text-decoration: none;
    color: #333;
}

a:hover {
    color: #ff21cf;
}
.create button{
     text-align: right;
}

#forSearch{
    display: none;
}

.create{
    position: relative;
    top: 100px;
    left: 100px;
    
}

.search{
    display: flex;
    position: relative;
    top: -160px;
    left: 880px;
    
}


.search input{
    display: flex;
    width: 250px;
    box-shadow:
    4px 0 10px lightskyblue,
    0 4px 10px lightskyblue,  
    4px 0 10px lightskyblue;
    position: relative;
    left: -20px;
    top: 270px;
}

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
    margin-left: -15px;
    margin-top: -50px;
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

</head>
<body>


  
    <div class="container">
        <h2>Task Management List</h2>

        <div class="header">
      <div class="nav">
        <div class="search">
          <input class="form-control me-2" name="search" id="live_search" type="search" placeholder="Search Date" aria-label="Search">

        </div>

        <div class="create">
                <!-- bootstrap button connected sa modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                Create
                </button>
                </div>



                      <table class="table" style="width:80%" id="data-table">
                      <thead class="table-dark"  id="t">
                      <tr>
                        
                        <th scope="col">Date</th>
                        <th scope="col">To-DO list</th>
                        <th scope="col">Remaining Task</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
         <?php

            $sql = "SELECT * FROM lists ORDER BY Date DESC ";

            $result = mysqli_query($conn,$sql);

            $number = 1;

            while($row = mysqli_fetch_assoc($result)){

                $id = $row['id'];

                echo'

                <tr>
                <td>'.$row['Date'].'</td>
                <td>'.$row['To_Do_List'].'</td>
                <td>'.$row['Remaining_Task'].'</td>
               
                <td>
                    <button class = "btn btn-success" onclick = "edit('.$id.')" >EDIT</button>
                   
                </td>
              </tr>';

                $number++;


            }


        ?>

        </tbody>
        </table>

        <div class="searchresult" id="searchresult" style="position: relative; top: 0px; left: 50;  width: 100%; ">

        </div>



    <!-- Modal -->
    <form  action = "list.php" method = "post">
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add List</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    
      
     
        <label>Date</label>
        <input type="date" name="b" id = "b" class = "form-control" placeholder="MM/DD/YY">
        
        <label>To Do List</label>
        <input type="text" name="c" id = "c" class = "form-control" placeholder="Enter to do list">
    
        <label>Remaining Task</label>
        <input type="text" name="d" id = "d"  class = "form-control" placeholder="Enter Remaining Task">
        
   

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" onclick = "Add()">Add</button>
        
      
       
      </div>
    </div>
  </div>
</div>









<div class="modal fade" id="EDITmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">EDIT INFORMATION</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    
     
        <label>Date</label>
        <input type="date" name="b" id = "Eb" class = "form-control" placeholder="MM/DD/YY">
        
        <label>To Do List</label>
        <input type="text" name="c" id = "Ec" class = "form-control" placeholder="Enter to do list">
    
        <label>Remaining Task</label>
        <input type="text" name="d" id = "Ed"  class = "form-control" placeholder="Enter Remaining Task">
        
   
   

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button  name="add" class="btn btn-primary" onclick = "toEdit()">EDIT</button>
        <input type = "hidden" id = "hiddenID">
       
      </div>
    </div>
  </div>
</div>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>




    <script>

          $(document).ready(function() {
            $("#live_search").keyup(function() {
              var usertask = $(this).val(); // Removed the space

              if (usertask != "") {
                $.ajax({
                  url: "../ajax/admin_ajax.php",
                  method: 'POST',
                  data: {
                    usertask: usertask
                  }, // Added a space after the colon

                  success: function(data) {
                    $("#searchresult").html(data);
                    $("#data-table").hide();
                    $("#searchresult").show();
                  }
                });
              } else {
                $("#searchresult").hide();
                $("#data-table").show();
              }
            });
          });
            function edit(id) {
                $('#hiddenID').val(id);
                $('#EDITmodal').modal('show'); // Corrected the ID here
            }

function Delete(id) {

$.ajax({
    url: "../ajax/admin_ajax.php",
    type: 'post',
    data: {
        DeleteId:id
    },
    success: function (data, status) {
        refreshIfClose();
    }
});
}



    
    function Add(){
       

        var assignee = $('#a').val();
        var date = $('#b').val();
        var Todo = $('#c').val();
        var remainingTask = $('#d').val();
        var click = true;
       

        $.ajax({
            url: "../ajax/admin_ajax.php",
            type: 'post',
            data: {

                a:assignee,
                b:date,
                c:Todo,
                d:remainingTask,
                click:click
                
            },
            success: function (data, status) {
              
                $('#create').modal('hide');
                refreshIfClose();
            }
        });


    }


    function toEdit(){

        var id = $('#hiddenID').val();
        var a = $('#Ea').val();
        var b = $('#Eb').val();
        var c = $('#Ec').val();
        var d = $('#Ed').val();



$.ajax({
       url: "../ajax/admin_ajax.php",
       type: 'post',
       data: {


            editing:id,
           a:a,
           b:b,
           c:c,
           d:d
          


           

       },
       success: function (data, status) {
        alert("Information edited successfully!");
           refreshIfClose();
       }
   });
     

}




    function refreshIfClose() {
        location.reload();
    }
</script>

</body>
</html>



