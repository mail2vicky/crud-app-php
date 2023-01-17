<?php 
include('db.php');
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $deleteQuery = "DELETE FROM record WHERE id=$id";
    $runQuery = mysqli_query($db,$deleteQuery);
    if($runQuery){
        echo "<script>window.location.href ='index.php'</script>";
    } 
    else{
        echo "Database not deleted !";
    }
}

?>