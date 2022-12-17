<?php
include("../conn.php");
session_start();
$restaurant = $_SESSION['restaurant'];
if(isset($_POST['deleteItem']))
{
    $ID = $_POST['ID'];
    $query = "DELETE FROM $restaurant WHERE ID='$ID' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        header("location:menuRotation.php");
    }
}
?>