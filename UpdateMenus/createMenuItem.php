<?php
session_start();
$restaurant = $_SESSION['restaurant'];
$restaurantText;

if($restaurant === "54pizza") {
    $restaurantText = "54 Pizza";
}
else if($restaurant === "chickfila") {
    $restaurantText = "Chick-fil-A";
}
else if($restaurant === "ritzys") {
    $restaurantText = "Ritzy's";
}
else if($restaurant === "arbys") {
    $restaurantText = "Arby's";
}
else if($restaurant === "greatharvest") {
    $restaurantText = "Great Harvest";
}
echo "<h2 id='addNewMsg'>Add a new menu item to {$restaurantText}</h2>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/officeTables.css">
</head>
<body>
    <form id="createMenuItem" action="insertMenuItem.php" method="POST">
    <input type="text" id="item" name="item" placeholder="Menu Item" required>
    <input type="number" name="price" step="0.01" placeholder="Price" placeholder="Price" required>

    <button id="submitNewItem" type="submit" name="submit">Submit</button>
    </form>
</body>
</html>