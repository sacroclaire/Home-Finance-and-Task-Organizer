<?php
    include("../connection/config.php");

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

    .search {
      width: 250px;
      box-shadow:
        4px 0 10px lightskyblue,
        0 4px 10px lightskyblue,
        4px 0 10px lightskyblue;
      position: relative;
      left: 850px;
      top: 10px;
    }
  </style>

</head>
<body>


    <hr>
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



                      <table class="table" id="data-table">
                      <thead class="table-dark" style="background-color: blue;" id="t">
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
                <td>'.$row['Actions'].'</td>

                <td>
                    <button class = "btn btn-outline-success" onclick = "edit('.$id.')" >EDIT</button>
                   
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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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



