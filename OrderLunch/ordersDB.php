<?php
    include("../conn.php");
    if(isset($_GET['p'])){
        $p = $_GET['p'];
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
        $inserted = 1;
    }
    else if(empty($_POST['allNames'])) {
        $names = explode("-",$namesVal);
        $name = array_values($names)[0];
        $grade = array_values($names)[1];
        $inserted = 0;
    }

    if(!empty($_POST['names']) || !empty($_POST['allNames']))  {
        header("location:orderLunch.php?p=".$p);
        $qry = "INSERT INTO `allorders`(`grade`,`name`,`item`,`quantity`,`price`,`inserted`) VALUES ('$grade', '$name','$item', '$quantities', '$mealCost', '$inserted')";
         $insert = mysqli_query($conn, $qry);

    
        if(!empty($_POST['allNames']) && empty($_POST['names'])) {
            $messages = urlencode("$name's order added to the $grade table.");
            header("Location:orderLunch.php?messages=".$messages .'&p='.$p);

        }
        else if(!empty($_POST['names']) && !empty($_POST['allNames'])){
            $message = urlencode("*Please only select one person.");
            header("Location:orderLunch.php?message=".$message .'&p='.$p);
        }
    }
    else{
        $message = urlencode("*Please select a student.");
        header("Location:orderLunch.php?message=".$message .'&p='.$p);
    }
?>