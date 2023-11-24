<?php
$db = mysqli_connect("localhost","root","", "hf_db");
if(!$db){
    die('error in db'. mysqli_error($db));
}else   {
    $id = $_GET['id'];
    $qry = $qry = "SELECT * FROM list WHERE id = $id";
            $run = $db -> query($qry);
            if($run-> num_rows>0){
                while($row=$run-> fetch_assoc()){
                    $name =$row['Assignee'];
                    $date =$row ['Date'];
                    $budget =$row ['To_Do_List'];
                    $remaining =$row ['Remaining_Task'];
                }
            }
        }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT LIST</title>
</head>
<body>

    /*<form method ="post">
        <label>Assignee</label>
        <input type="text" name="Assignee" value="<?php echo $assignee; ?>">
        <br><br>
        <label>Date</label>
        <input type="text" name="Date" value="<?php echo $date; ?>">
        <br><br>
        <label>To Do List</label>
        <input type="text" name="To Do List" value="<?php echo $ToDo; ?>">
        <br><br>
        <label>Remaining Task</label>
        <input type="text" name="Remaining Task" value="<?php echo $remainingTask; ?>">
        <br><br>
        <input type ="submit" name="update" value="Update">
    </form>


           <!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method ="post">
        <label>Assignee</label>
        <input type="text" name="assignee" class = "form-control" placeholder="Enter Name">

        <label>Date</label>
        <input type="text" name="datetime" class = "form-control" placeholder="MM/DD/YY">
    
        <label>To_Do_List</label>
        <input type="text" name="ToDo" class = "form-control" placeholder="Enter To Do List">
    
        <label>Remaining_Task</label>
        <input type="text" name="remaining_Task" class = "form-control" placeholder="Enter Remaining Task">
       
    </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



    
</body>
</html>

<?php
    if (isset($_POST['update'])) {
    $assignee =$_POST['assignee'];
    $date =$_POST['date'];
    $ToDo =$_POST ['ToDo'];
    $remainingTask =$_POST['remainingTask'];

    $qry = "UPDATE list SET Assignee='$assignee', Date='$date', To_Do_List='$ToDo',  Remaining_Task='$remainingTask'
    WHERE id = $id";

    if(mysqli_query($db, $qry)){
        header('location:list.php');
    }else{
        echo mysqli_error($db);
    }
}
?>
