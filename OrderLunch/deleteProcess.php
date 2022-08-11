<?php
include("../conn.php");
session_start();

if(isset($_SESSION['p'])){
    $p = $_SESSION['p'];
}


if(isset($_GET['p'])){
    $p = $_GET['p'];
} else {
    echo 'error';
}



if(isset($_POST['delete']))
{
    $ID = $_POST['ID'];
    $query = "DELETE FROM allorders WHERE ID='$ID' ";

    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        header("location:orderLunch.php?p=".$p);
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}
?>