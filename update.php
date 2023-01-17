<?php 
include('db.php');

if(isset($_POST['update'])){
    // print_r($_POST);
    
    $id = $_POST['id'];
    
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email_id = $_POST['emailid'];
    $updateQuery = "UPDATE record SET first_name ='$first_name', last_name ='$last_name', email_id ='$email_id' WHERE id = $id ";
    $runQuery = mysqli_query($db,$updateQuery);
    if($runQuery){
        echo "<script>window.location.href ='index.php'</script>";
    } 
    else{
        echo "Database not updated !";
    }
}

?>