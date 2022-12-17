<?php
session_start();
include("../conn.php");
$restaurant = $_SESSION['restaurant'];

echo $restaurant;
include('../conn.php');
$item = $_POST["item"];
$price = $_POST["price"];
        
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}           
        
$sql = "INSERT INTO $restaurant (item, price)
        VALUES (?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
 
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ss",
                       $item,
                       $price);

mysqli_stmt_execute($stmt);

header("location:menuRotation.php");
?>