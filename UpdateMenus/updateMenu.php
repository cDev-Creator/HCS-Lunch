<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Update Menu Items</title>
    <link rel="stylesheet" href="../css/officeTables.css">

</head>
<body>
    <?php
    session_start();
    include("../conn.php");
    $restaurant = $_SESSION['restaurant'];

    $_SESSION['test'] = $restaurant;

    $ID = $_POST['ID'];
    $query = "SELECT * FROM $restaurant WHERE ID='$ID' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        while($row = mysqli_fetch_array($query_run))
        {
            ?>   
            <form id="updateMenu" action="" method="post">
            <input type="hidden" name="ID" value="<?php echo $row['ID'] ?>">
            <div class="form-group">
         
            <input type="text" name="item" placeholder="Menu Item" value="<?php echo $row['item'] ?>" required>
            <input type="number" name="price" step="0.01" placeholder="Price" value="<?php echo $row['price'] ?>"  required>
                  
            <button id="updateMenuData" type="submit" name="updated"> Update</button>
            <button id="cancelUpdateBtn"><a href="displayMenus.php">Cancel</a></button>
            </form>

            <?php
                if(isset($_POST['updated']))
                {
                    $item = $_POST['item'];
                    $price = $_POST['price'];

                    $query = "UPDATE $restaurant SET item='$item', price='$price' WHERE ID='$ID'";
                    $query_run = mysqli_query($conn, $query);
                    if($query_run)
                    {

                        header("location:displayMenus.php");
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
    else
    {
        echo '<script> alert("No Record Found"); </script>';
    }