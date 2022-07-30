
<?php

    $host = "localhost";
    $dbname = "menus";
    $username = "root";
    $password = ""; 
    $conn = mysqli_connect(hostname: $host,
                        username: $username,
                        password: $password,
                        database: $dbname);
     
    if (mysqli_connect_errno()) {
        die("Connection error: " . mysqli_connect_error());
    }    
    
    $namesVal = $_POST['names'];
    $itemsVal = $_POST['items'];
    $quantities = $_POST['quantities'];
    $allNamesVal = $_POST['allNames'];

    $items = explode("-",$itemsVal);
    $item = array_values($items)[0];
    $price = array_values($items)[1];

    $prices = $price;
    $priceFloat = (float)$prices;
    $quantity = $quantities;
    $quantitiesFloat = (float)$quantity;
    echo $mealCost =  number_format($priceFloat * $quantitiesFloat, 2);

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
    
    if(empty($_POST['names']) || empty($_POST['allNames']))  {
        header("location:orderLunch.php");
        $qry = "INSERT INTO `allorders`(`grade`,`name`,`item`,`quantity`,`price`) VALUES ('$grade', '$name','$item', '$quantities', '$mealCost')";
        $insert = mysqli_query($conn, $qry);

        if(!empty($_POST['allNames'])) {
            $messages = urlencode("*$name's order added to the $grade table.");
            header("Location:orderLunch.php?messages=".$messages);
        }
    }
    else {
        $message = urlencode("*Please only select one person.");
        header("Location:orderLunch.php?message=".$message);
    }

?>