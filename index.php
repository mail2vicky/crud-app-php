<?php 
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css" type="text/css">
    <title>PHP CRUD</title>
</head>
<body>
    <div class="main">
<!-- FORM AREA STARTS HERE -->
    <div class="form">
      <?php  
      if(isset($_GET['update'])){
        $id=$_GET['update'];
        $selectQuery ="SELECT * FROM record WHERE id=$id";
        $runQuery = mysqli_query($db,$selectQuery);
        $data = mysqli_fetch_array($runQuery);
         
        ?>
          <form method="post" action="update.php">
          <input type="hidden" name="id" value="<?=$data['id']?>">
          <input type="text" name="firstname" value="<?=$data['first_name']?>" class="input" placeholder="First name...">
          <input type="text" name="lastname" value="<?=$data['last_name']?>" class="input" placeholder="Last name...">
          <input type="email" name="emailid" value="<?=$data['email_id']?>" class="input long-input" placeholder="Email id...">
          <input type="submit" name="update"class="long-input add-button" value="UPDATE RECORD">
          </form>
        
        <?php

      }
      else {

        ?> 
        <form method="post" action="add.php">
    <input type="text" name="firstname" class="input" placeholder="First name...">
    <input type="text" name="lastname" class="input" placeholder="Last name...">
    <input type="email" name="emailid" class="input long-input" placeholder="Email id...">
    <input type="submit" name="add" class="long-input add-button" value="ADD TO DATABASE">
    </form>
        <?php
      }
      
      ?>

    

    </div>
<!-- FORM AREA ENDS HERE -->
  
<!-- DATABASE RECORDS AREA STARTS HERE -->
<div class="record">

<!-- <p class="warn">No Data Available</p> -->
<?php 
$readQuery = "SELECT * FROM record ORDER BY id DESC";
$readRun = mysqli_query($db,$readQuery);
// print_r($data = mysqli_fetch_array($readRun));
while($data = mysqli_fetch_array($readRun)){
  ?>
<div class="record-item">
    <h1> <?=$data['first_name']?> <?=$data['last_name']?></h1>
    <p><?=$data['email_id']?></p>

    <a href="index.php?update=<?=$data['id']?>"> <button class="menu-btn edit-btn">Edit</button></a>

  
    <a href="delete.php?delete=<?=$data['id']?>">   <button class="menu-btn delete-btn">Delete</button></a>
</div> 

    
  <?php   
}
?>

</div>
<!-- DATABASE RECORDS AREA ENDS HERE -->
   
</div>
</body>
</html>