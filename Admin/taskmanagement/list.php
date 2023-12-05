<?php
include("../connection/config.php");
include("../adminsidebar.php"); 


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="list.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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

    .create{
    position: relative;
    top: 10px;
    left: 100px;
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
    margin-left: -12px;
}
.navigation{
    position: fixed;
    width: 300px;
    height: 100%;
    background: var(--orange);
    border-left: -10px solid var(--orange);
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
    position: relative;
    top: 100px;
    left: 100px;
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

  </style>

</head>

<body>



  <div class="container">
  
    <h2 style = "position:relative; top: 40px; left: 210px; font-size: 48px; letter-spacing: 3px; font-weight: bold;">Task Management List</h2>
    </div>

    <div class="header">
      <div class="nav">
        <div class="search" style = "position: relative; top: 90px; left: 1180px; height: 30px;">
          <input class="form-control me-2" name="search" id="live_search" type="search" placeholder="Search Date" aria-label="Search">

        </div>


        <div class="create" style = "position: relative; top: 90px; left: 150px;">
          <!-- bootstrap button connected sa modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
            Create
          </button>
        </div>



        <table class="table" style="width:80%; position: relative; top: 140px; left: 70px; width: 1000px;" id="data-table">
          <thead class="table-dark"  id="t">
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Assignee</th>
              <th scope="col">Date</th>
              <th scope="col">To-DO list</th>
              <th scope="col">Remaining Task</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php

            $sql = "SELECT * FROM lists ORDER BY Date DESC ";

            $result = mysqli_query($conn, $sql);

            $number = 1;

            while ($row = mysqli_fetch_assoc($result)) {

              //$id = $row['id'];

              echo "

                <tr>
                <td>$number</td>
                <td>{$row['Assignee']}</td>
                <td>{$row['Date']}</td>
                <td>{$row['To_Do_List']}</td>
                <td>{$row['Remaining_Task']}</td>
                <td>
                    <button class = 'btn btn-success' onclick = 'edit({$row['id']})' >EDIT</button>
                    <button class = 'btn btn-danger' onclick = 'Delete({$row['id']})'>REMOVE TASK</button>

                    
                </td>
              </tr>";

              $number++;
            }

            ?>

          </tbody>
        </table>

        <div class="searchresult" id="searchresult" style="position: relative; top: 0px; left: 50;  width: 100%; ">

        </div>


        <!-- Modal -->
        <form action="list.php" method="post">
          <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Add List</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                  <label>Assignee</label>
                  <input type="text" name="a" id="a" class="form-control" placeholder="Enter Name">

                  <label>Date</label>
                  <input type="date" name="b" id="b" class="form-control" placeholder="MM/DD/YY">

                  <label>To Do List</label>
                  <input type="text" name="c" id="c" class="form-control" placeholder="Enter to do list">

                  <label>Remaining Task</label>
                  <input type="text" name="d" id="d" class="form-control" placeholder="Enter Remaining Task">



                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-success" onclick="Add()">Add</button>



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

                  <label>Assignee</label>
                  <input type="text" name="a" id="Ea" class="form-control" placeholder="Enter Name">

                  <label>Date</label>
                  <input type="date" name="b" id="Eb" class="form-control" placeholder="MM/DD/YY">

                  <label>To Do List</label>
                  <input type="text" name="c" id="Ec" class="form-control" placeholder="Enter to do list">

                  <label>Remaining Task</label>
                  <input type="text" name="d" id="Ed" class="form-control" placeholder="Enter Remaining Task">




                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CLOSE</button>
                  <button name="add" class="btn btn-success" onclick="toEdit()">EDIT</button>
                  <input type="hidden" id="hiddenID">

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
              var admintask = $(this).val(); // Removed the space

              if (admintask != "") {
                $.ajax({
                  url: "../ajax/admin_ajax.php",
                  method: 'POST',
                  data: {
                    admintask: admintask
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
                DeleteId: id
              },
              success: function(data, status) {
                refreshIfClose();
              }
            });
          }

         

  function Delete(id) {
    // Display a confirmation dialog
    var isConfirmed = confirm("Are you sure you want to remove the task?");

    // If the user confirms, proceed with the delete action
    if (isConfirmed) {
      $.ajax({
        url: "../ajax/admin_ajax.php",
        type: 'post',
        data: {
          DeleteId: id
        },
        success: function(data, status) {
          refreshIfClose();
        }
      });
    } else {
      // Do nothing or handle cancellation
      alert("Task removal canceled.");
    }
  }

  // Existing code...






          function Add() {


            var assignee = $('#a').val();
            var date = $('#b').val();
            var Todo = $('#c').val();
            var remainingTask = $('#d').val();
            var click = true;


            $.ajax({
              url: "../ajax/admin_ajax.php",
              type: 'post',
              data: {

                a: assignee,
                b: date,
                c: Todo,
                d: remainingTask,
                click: click

              },
              success: function(data, status) {

                $('#create').modal('hide');
                refreshIfClose();
              }
            });


          }


          function toEdit() {

            var id = $('#hiddenID').val();
            var a = $('#Ea').val();
            var b = $('#Eb').val();
            var c = $('#Ec').val();
            var d = $('#Ed').val();


            $.ajax({
              url: "../ajax/admin_ajax.php",
              type: 'post',
              data: {


                editing: id,
                a: a,
                b: b,
                c: c,
                d: d

              },
              success: function(data, status) {

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