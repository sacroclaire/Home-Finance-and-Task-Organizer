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
    
?>