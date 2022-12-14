<?php
include("../conn.php");
if(isset($_POST['deleteItem']))
{
    $ID = $_POST['ID'];
    $query = "DELETE FROM 54pizza WHERE ID='$ID' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        header("location:displayMenus.php");
    }
}
?>