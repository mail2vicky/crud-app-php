<?php 
include('db.php');
if(isset($_POST['add'])){
$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$email_id = $_POST['emailid'];
$createQuery = "INSERT INTO record (first_name,last_name,email_id) VALUES ('$first_name','$last_name','$email_id')";
$createRun = mysqli_query($db,$createQuery);
if($createRun){
    echo "<script>window.location.href ='index.php'</script>";
} 
else{
    echo "Database not added !";
}
}
?>