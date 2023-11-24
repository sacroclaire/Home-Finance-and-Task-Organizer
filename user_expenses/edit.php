<?php
$db = mysqli_connect("localhost","root","", "hf_db");
if(!$db){
    die('error in db'. mysqli_error($db));
}else   {
    $id = $_GET['id'];
    $qry = $qry = "SELECT * FROM users WHERE id = $id";
            $run = $db -> query($qry);
            if($run-> num_rows>0){
                while($row=$run-> fetch_assoc()){
                    $name =$row['Name'];
                    $date =$row ['Date'];
                    $budget =$row ['Daily_Budget'];
                    $expenses =$row ['Daily_Expenses'];
                    $remaining =$row ['Remaining_Budget'];
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
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $name; ?>">
        <br><br>
        <label>Date</label>
        <input type="text" name="date" value="<?php echo $date; ?>">
        <br><br>
        <label>Daily Budget</label>
        <input type="text" name="budget" value="<?php echo $budget; ?>">
        <br><br>
        <label>Daily Expenses</label>
        <input type="text" name="expenses" value="<?php echo $expenses; ?>">
        <br><br>
        <label>Remaining Budget</label>
        <input type="text" name="remaining" value="<?php echo $remaining; ?>">
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
        <label>Name</label>
        <input type="text" name="name" class = "form-control" placeholder="Enter Name">

        <label>Date</label>
        <input type="text" name="datetime" class = "form-control" placeholder="MM/DD/YY">
    
        <label>Daily Budget</label>
        <input type="text" name="budget" class = "form-control" placeholder="Enter Daily Budget">
        
        <label>Daily Expenses</label>
        <input type="text" name="expenses" class = "form-control" placeholder="Enter Daily Expenses">
    
        <label>Remaining Budget</label>
        <input type="text" name="remaining" class = "form-control" placeholder="Enter Remaining Budget">
       
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
    $name =$_POST['name'];
    $date =$_POST['date'];
    $budget =$_POST ['budget'];
    $expenses =$_POST['expenses'];
    $remaining =$_POST['remaining'];

    $qry = "UPDATE users SET Name='$name', Date='$date', Daily_Budget='$budget', Daily_Expenses='$expenses', Remaining_Budget='$remaining'
    WHERE id = $id";

    if(mysqli_query($db, $qry)){
        header('location:user.php');
    }else{
        echo mysqli_error($db);
    }
}
?>
