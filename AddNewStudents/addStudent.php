<?php
include('../conn.php');
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$grade = $_POST["grade"];
        
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}           
        
$sql = "INSERT INTO names (firstName, lastName, grade)
        VALUES (?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
 
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "sss",
                       $firstName,
                       $lastName,
                       $grade);

mysqli_stmt_execute($stmt);

header("location:addNew.php");
echo "Record saved.";
?>