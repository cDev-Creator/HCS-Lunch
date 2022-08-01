<?php
include("../conn.php");

if(isset($_POST['delete']))
{
    $ID = $_POST['ID'];
    $query = "DELETE FROM allorders WHERE ID='$ID' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("location:orderLunch.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}
?>