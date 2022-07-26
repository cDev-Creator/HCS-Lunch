<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'students');

if(isset($_POST['delete']))
{
    $id = $_POST['id'];
    $query = "DELETE FROM names WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        header("location:addNew.php");
    }

}
?>