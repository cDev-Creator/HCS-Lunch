<?php


$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
/* $priority = filter_input(INPUT_POST, "priority", FILTER_VALIDATE_INT);
 */

$host = "localhost";
$dbname = "students";
$username = "root";
$password = "";
        
$conn = mysqli_connect(hostname: $host,
                       username: $username,
                       password: $password,
                       database: $dbname);
        
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}           
        
$sql = "INSERT INTO names (firstName, lastName)
        VALUES (?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
 
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ss",
                       $firstName,
                       $lastName);

mysqli_stmt_execute($stmt);

echo "Record saved.";
?>