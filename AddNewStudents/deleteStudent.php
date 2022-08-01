<?php
include("../conn.php");
if(isset($_POST['delete']))
{
    $id = $_POST['id'];
    $query = "DELETE FROM names WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        header("location:addNew.php");
    }
}
?>