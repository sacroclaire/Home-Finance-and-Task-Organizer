<?php

include("../connection/config.php");


//delete ne para sa task management list
if(isset($_POST['DeleteId'])){

    $id = $_POST['DeleteId'];

    $sql = "DELETE FROM lists WHERE id = $id";

    mysqli_query($conn,$sql);

}



//para ma creatan 
if(isset($_POST['click'])){

    $assignee = $_POST['a'];
    $date = $_POST['b'];
    $Todo = $_POST['c'];
    $remainingTask= $_POST['d'];

    $sql ="INSERT INTO lists (Assignee,Date,To_Do_List,Remaining_Task) VALUES ('$assignee', '$date', '$Todo', '$remainingTask')";
    mysqli_query($conn,$sql);
}




//creeate para nis sa 

if(isset($_POST['create'])){
    $name =$_POST['name'];
    $date =$_POST['date'];
    $budget =$_POST['budget'];
    $expenses =$_POST['expenses'];
    $remaining=$_POST['remaining'];

    $sql ="INSERT INTO expense(Name,Date,Daily_Budget,Daily_Expenses,Remaining_Budget) VALUES ('$name', '$date', '$budget', '$expenses', '$remaining')";
    mysqli_query($conn,$sql);
}








//para ma delete natu and data adtoa sa user php filefor expenses

if(isset($_POST['toDelete'])){
    $id = $_POST['toDelete'];
    $sql = "DELETE FROM expense WHERE id = $id";
    mysqli_query($conn,$sql);
}


//para ma edit a and user sa expenses

if(isset($_POST['toEdit'])){

    $id = $_POST['toEdit'];
    $name =$_POST['name'];
    $date =$_POST['date'];
    $budget =$_POST['budget'];
    $expenses =$_POST['expenses'];
    $remaining=$_POST['remaining'];

    $sql = "UPDATE expense SET Name = '$name', Date = '$date', Daily_Budget = '$budget', Daily_Expenses = '$expenses', Remaining_Budget	
 = '$remaining' WHERE id = $id";

    mysqli_query($conn,$sql);

}






//para ma edit a and user sa expenses

if(isset($_POST['toEdit'])){

    $id = $_POST['toEdit'];
    $name =$_POST['name'];
    $date =$_POST['date'];
    $budget =$_POST['budget'];
    $expenses =$_POST['expenses'];
    $remaining=$_POST['remaining'];

    $sql = "UPDATE expense SET Name = '$name', Date = '$date', Daily_Budget = '$budget', Daily_Expenses = '$expenses', Remaining_Budget	
 = '$remaining' WHERE id = $id";

    mysqli_query($conn,$sql);

}




if(isset($_POST['editing'])){

    $id = $_POST['editing'];
    $assignee =$_POST['a'];
    $date =$_POST['b'];
    $todo =$_POST['c'];
    $reamaining =$_POST['d'];
    

    $sql = "UPDATE lists SET Assignee = '$assignee', Date = '$date', To_Do_List = '$todo', Remaining_Task = '$reamaining' WHERE id = $id";

    mysqli_query($conn,$sql);

}   
/* 
    Para maka search sa admin expense*/
    if (isset($_POST['input'])) {

        $input = $_POST['input'];
        $qry = "SELECT * FROM expense WHERE Date LIKE '%$input%' COLLATE utf8mb4_general_ci ORDER BY Date DESC";
    
        $result = mysqli_query($conn, $qry);
    
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $number = 1;
    
                echo '<table style="width:1040px" id="expensetable data-table">'; // Corrected the table id and class
                echo '<thead>';
                echo '<tr>';
                echo '<th>ID</th>';
                echo '<th>Name</th>';
                echo '<th>Date</th>';
                echo '<th>Daily Budget</th>';
                echo '<th>Daily Expenses</th>';
                echo '<th>Remaining Budget</th>';
                echo '<th>Options</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
    
                while ($row = mysqli_fetch_assoc($result)) { // Changed $test to $row
                    echo "<tr>";
                    echo "<td>" . $number . "</td>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td>" . $row['Date'] . "</td>";
                    echo "<td>" . $row['Daily_Budget'] . "</td>";
                    echo "<td>" . $row['Daily_Expenses'] . "</td>";
                    echo "<td>" . $row['Remaining_Budget'] . "</td>";
                    echo "<td>";
    
                    echo "<button type='button' class='btn btn-success'  onclick='editvalue(" . $row['id'] . ")'> EDIT </button>";
                    echo "<button class='btn btn-danger' onclick='toDelete(" . $row['id'] . ")'>DELETE</button>";
                    echo "</td>";
                    echo "</tr>";
    
                    $number++;
                }
    
                echo '</tbody>';
                echo '</table>';
            } else {
                echo "<h5> No data found!</h5>";
            }
        } else {
            echo "Query failed: " . $conn->error;
        }
    }


    //function para maka search sa user expense
    if (isset($_POST['userinput'])) {

        $userinput = $_POST['userinput'];
        $qry = "SELECT * FROM expense WHERE Date LIKE '%$userinput%' COLLATE utf8mb4_general_ci ORDER BY Date DESC";
    
        $result = mysqli_query($conn, $qry);
    
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $number = 1;
    
                echo '<table style ="width:1040px" id="data-table">';
                echo '<thead>';
                    echo '<tr class>';
                        
                     echo '<th>Date</th>';
                     echo '<th>Daily Budget</th>';
                     echo '<th>Daily Expenses</th>';
                     echo '<th>Remaining Budget</th>';
                     echo '<th>Options</th>';
                     echo '</tr>';
                     echo '</thead>';
                     echo '<tbody>';
    
                while ($row = mysqli_fetch_assoc($result)) { // Changed $test to $row
                    echo "<tr>";
                    echo "<td>" .$row['Date']. "</td>";
                    echo "<td>" .$row['Daily_Budget']. "</td>";
                    echo "<td>" .$row['Daily_Expenses']. "</td>";
                    echo "<td>" .$row['Remaining_Budget']. "</td>";
                    echo "<td>";
                   
                    echo "<button type='button' class='btn btn-success'  onclick = 'editvalue(". $row['id'].")'>EDIT</button>";
                    echo "</td>";
                    echo "</tr>";

                    $number++;
                }
    
                echo '</tbody>';
                echo '</table>';

            } else {
                echo "<h5> No data found!</h5>";
            }
        } else {
            echo "Query failed: " . $conn->error;
        }
    }



    
 
?>

