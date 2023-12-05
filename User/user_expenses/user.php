<?php
   include("../connection/config.php");
   include("../usersidebar.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <title>Daily Expense Management</title>

    <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');


.container table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 80px;
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
    top: 65px;
    left: 100px;
    
}

.search{
    display: flex;
    position: relative;
    top: -200px;
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
 <?php
        include("../sidebar.php");
 ?>

    <div class="container">
        <h2>Expense Logs</h2>

        <div class="header">
            <div class="nav">
                <div class="search">
            <input class="form-control me-2" name="search" id= "live_search" type="search" placeholder="Search Date" aria-label="Search">
           
        </div>

        <div class="create">
<!-- bootstrap button connected sa modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
  Create
</button>
</div>
        <table style ="width:80%" id="data-table">
        <thead>
            <tr class>
                
              
                <th>Date</th>
                <th>Daily Budget</th>
                <th>Daily Expenses</th>
                <th>Remaining Budget</th>
                <th>Options</th>
            </tr>
            </thead>
  <tbody>
   

    <?php

        $sql = "SELECT * FROM expense ORDER BY DATE DESC";

        $result = mysqli_query($conn,$sql);

        $number = 1;

        while($row = mysqli_fetch_assoc($result)){
                echo "
                
                <tr>

                <td>{$row['Date']}</td>
                <td>{$row['Daily_Budget']}</td>
                <td>{$row['Daily_Expenses']}</td>
                <td>{$row['Remaining_Budget']}</td>
                <td>
                   
                    <button type='button' class='btn btn-success'  onclick = 'editvalue({$row['id']})'>
                      EDIT
                    </button>

                    
                </td>
            </tr>
                
                ";

            $number++;
        }



?>


    </tbody>     
    </table>

    <div class= "searchresult" id = "searchresult" style = "position: relative; top: 0px; left: -1px;">
    </div>

    
    

    <!-- Modal -->
    <form  action = "user.php" method = "post">
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add List</h1>
        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    
        
     
        <label>Date</label>
        <input type="date" name="DAte" id = "DAte"class = "form-control" placeholder="MM/DD/YY">
    
        <label>Daily Budget</label>
        <input type="text" name="budget" id = "budget" class = "form-control" placeholder="Enter Daily Budget">
        
        <label>Daily Expenses</label>
        <input type="text" name="expenses"  id = "expenses" class = "form-control" placeholder="Enter Daily Expenses">
    
        <label>Remaining Budget</label>
        <input type="text" name="remaining" id = "remaining" class = "form-control" placeholder="Enter Remaining Budget">
        
   

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CLOSE</button>
        <button type="button" class="btn btn-success" onclick = "toCreate()">CONFIRM</button>
        
       
      </div>
    </div>
  </div>
</div>





<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">EDIT INFORMATION</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    
        
     
        <label>Date</label>
        <input type="date" name="EDAte" id = "EdAte" class = "form-control" placeholder="MM/DD/YY">
    
        <label>Daily Budget</label>
        <input type="text" name="Ebudget" id = "Ebudget" class = "form-control" placeholder="Enter Daily Budget">
        
        <label>Daily Expenses</label>
        <input type="text" name="Eexpenses" id = "Eexpenses" class = "form-control" placeholder="Enter Daily Expenses">
    
        <label>Remaining Budget</label>
        <input type="text" name="Eremaining" id = "Eremaining" class = "form-control" placeholder="Enter Remaining Budget">
        
   

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CLOSE</button>
        <button  name="add" class="btn btn-success" onclick = "toEdit()">EDIT</button>
        <input type = "hidden" id = "hiddenID">
       
      </div>
    </div>
  </div>
</div>








</form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



    <script>

$(document).ready(function () {
    $("#live_search").keyup(function () {
        var userinput = $(this).val(); // Removed the space

        if (userinput != "") {
            $.ajax({
                url: "../ajax/admin_ajax.php",
                method: 'POST',
                data: { userinput : userinput }, // Added a space after the colon

                success: function (data) {
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







        //para naa ay value na ma edit

         
         function editvalue(id) {
                        
        $('#hiddenID').val(id);
    // Fetch data for the specified ID
    $.ajax({
        url: "../ajax/admin_ajax.php",
        method: 'POST',
        data: {
            editid: id
        },
        success: function(data) {
            // Populate the modal fields with the fetched data
            var rowData = JSON.parse(data); // Assuming the data is returned as JSON
            $('#EdAte').val(rowData.Date);
            $('#Ebudget').val(rowData.Daily_Budget);
            $('#Eexpenses').val(rowData.Daily_Expenses);
            $('#Eremaining').val(rowData.Remaining_Budget);

            // Show the edit modal
            $('#edit').modal('show');
        }
    });
}







            //toCreate a information about the userphp sa expenses
            function toCreate(){

                    var name = $('#name').val();
                    var date = $('#DAte').val();
                    var budget = $('#budget').val();
                    var expenses = $('#expenses').val();
                    var remaining = $('#remaining').val();
                    var create = true;
                   
                
                   $.ajax({
                           url: "../ajax/admin_ajax.php",
                           type: 'post',
                           data: {
                            name:name,
                            date:date,
                            budget:budget,
                            expenses:expenses,
                            remaining:remaining,
                            create:create

                           },
                           success: function (data, status) {
                               refreshIfClose();
                           }
                       });
                         
   
               }

            function toDelete(id){
                   
                
                $.ajax({
                        url: "../ajax/admin_ajax.php",
                        type: 'post',
                        data: {
                            toDelete:id
                        },
                        success: function (data, status) {
                            refreshIfClose();
                        }
                    });
            }

            


            //para nis edit button sa expenses

            function toEdit(){

                    var id = $('#hiddenID').val();
                    var name = $('#Ename').val();
                    var date = $('#EdAte').val();
                    var budget = $('#Ebudget').val();
                    var expenses = $('#Eexpenses').val();
                    var remaining = $('#Eremaining').val();
                  
                   
                
                   $.ajax({
                           url: "../ajax/admin_ajax.php",
                           type: 'post',
                           data: {


                               toEdit:id,
                               name:name,
                               date:date,
                               budget:budget,
                               expenses:expenses,
                               remaining:remaining


                               

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
