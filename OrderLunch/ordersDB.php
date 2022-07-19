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
    
    $grades = $_POST['grades'];
    $names = $_POST['names'];
    $items = $_POST['items'];
    $quantities = $_POST['quantities'];
    $prices = $_POST['prices'];

    $qry = "INSERT INTO `allorders`(`grade`,`name`,`item`,`quantity`,`price`) VALUES ('$grades', '$names','$items', '$quantities', '$prices')";

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
echo "menuItem1: ".$items;

?>