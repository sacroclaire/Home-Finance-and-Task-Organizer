<?php
$db = mysqli_connect("localhost","root","", "hf_db");
if(!$db){
    die('error in db'. mysqli_error($db));
}else{
    $id =$_GET['id'];
    
}


$qry = "DELETE FROM users WHERE id = $id";
if(mysqli_query($db,$qry)){
    header('location:user.php');
}else{
    echo mysqli_error($db);
}
?>