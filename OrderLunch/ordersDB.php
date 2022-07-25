
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
    

    
 /*    $gradesVal = $_POST['grades']; */
    $namesVal = $_POST['names'];
    $itemsVal = $_POST['items'];
    $quantities = $_POST['quantities'];
    $allNamesVal = $_POST['allNames'];

    $items = explode("-",$itemsVal);
    $item = array_values($items)[0];
    $price = array_values($items)[1];

    if (empty($_POST['names'])) {
        $allNames = explode("-",$allNamesVal);
        $name = array_values($allNames)[0];
        $grade = array_values($allNames)[1];
    }
    else if(empty($_POST['allNames'])) {
        $names = explode("-",$namesVal);
        $name = array_values($names)[0];
        $grade = array_values($names)[1];
    }
/*     else if (!empty($_POST['allNames']) && ($_POST['names']))  { */
        $qry = "INSERT INTO `allorders`(`grade`,`name`,`item`,`quantity`,`price`) VALUES ('$grade', '$name','$item', '$quantities', '$price')";
        $insert = mysqli_query($conn, $qry);
 /*    } */


?>