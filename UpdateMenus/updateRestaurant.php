<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Menu Items</title>
    <link rel="stylesheet" href="../css/officeTables.css">
</head>
<body>
    <?php
    session_start();
    include("../conn.php");
    $activeTabValue = $_SESSION['activeTabValue'] ?? '';
    $ID = $_SESSION['restaurantID'] ?? '';

    echo "Active Tab: " . htmlspecialchars($activeTabValue) . "<br>";

    if ($ID) {
        echo "Restaurant ID: " . htmlspecialchars($ID);
    } else {
        echo "No restaurant ID received.";
    }
    ?>
</body>
</html>
