<?php
    $host = "localhost";
    $dbname = "orders";
    $username = "root";
    $password = "";
            
    $conn = mysqli_connect(hostname: $host,
                        username: $username,
                        password: $password,
                        database: $dbname);
     

    if (mysqli_connect_errno()) {
        die("Connection error: " . mysqli_connect_error());
    }    
    
    $item = $_POST['menuItem1'];
            
    $qry = "INSERT INTO `allorders`(`item`) VALUES ('$item')";

    $insert = mysqli_query($conn, $qry);
    if(!$insert) {
        echo "Error";
    }
    else {
        echo "Succsss";
    }

$classTotal = $_POST['classTotal'];
echo "Total Cash: ".$classTotal;
echo "</br>";


echo "menuItem1: ".$item;


/* $menuItem2 = $_POST['menuItem2'];
$menuItem3 = $_POST['menuItem3'];
$menuItem4 = $_POST['menuItem4'];
$menuItem5 = $_POST['menuItem5'];
$menuItem6 = $_POST['menuItem6'];
$menuItem7 = $_POST['menuItem7'];
$menuItem8 = $_POST['menuItem8']; */





?>






