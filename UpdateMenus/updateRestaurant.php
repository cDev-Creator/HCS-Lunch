<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Menu Items</title>
    <link rel="stylesheet" href="../css/officeTables.css">
</head>
<body>
    <?php
    session_start();
    include("../conn.php");

    $ID = $_SESSION['restaurantID'] ?? '';
    $query = "SELECT restaurantName FROM restaurants WHERE ID='$ID' ";

    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        while($row = mysqli_fetch_array($query_run))
        {
            ?>   
            <form id="updateRestaurants" action="" method="post">
        
            <div class="form-group">
         
            <input type="text" name="restaurantName" placeholder="Menu Item" value="<?php echo htmlspecialchars($row['restaurantName'], ENT_QUOTES, 'UTF-8'); ?>" required>
           
                  
            <button id="updateMenuData" type="submit" name="updated">Update</button>
            <button id="cancelUpdateBtn"><a href="menuRotation.php">Cancel</a></button>
            </form>
        
        <?php
         if(isset($_POST['updated']))
         {
             $restaurantName = mysqli_real_escape_string($conn, $_POST['restaurantName']);
          
             $query = "UPDATE restaurants SET restaurantName='$restaurantName' WHERE ID='$ID'";
             $query_run = mysqli_query($conn, $query);
             if($query_run)
             {
                header("location:menuRotation.php");
                echo '<script> alert("Data Updated"); </script>';
             }
             else
             {
                echo '<script> alert("Data Not Updated"); </script>';
             }
         }
         ?>
     <?php
    }
 }
 ?>


</body>
</html>
