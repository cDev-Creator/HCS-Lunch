<?php
$host = "localhost";
$dbname = "hcslunch_db";
$username = "admin";
$password = "hcslunchroom31";
        
$conn = mysqli_connect(hostname: $host,
                       username: $username,
                       password: $password,
                       database: $dbname);
        
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}         
?>