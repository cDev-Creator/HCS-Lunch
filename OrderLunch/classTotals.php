<?php
include("../conn.php");
session_start();

$date = date("Y-m-d"); 
$classTotal1 = 0;
$classTotal2 = 0;

    $inClass = $conn->query("SELECT price, inserted FROM allorders WHERE inserted=0 AND grade='$grades' AND dates = '$date'");
    while($rows = $inClass->fetch_assoc())
    {
        $classTotal1 = $classTotal1 + floatval($rows['price']);
    }
    
    $outsideClass = $conn->query("SELECT price, inserted FROM allorders WHERE inserted=1 AND grade='$grades' AND dates = '$date'");
    while($rows = $outsideClass->fetch_assoc())
    {
        $classTotal2 = $classTotal2 + floatval($rows['price']);
    }
    ?>
<div id ='allOrderTotals'>
    <?php

    echo '<div> Your Orders $',number_format((float)$classTotal1, 2, '.', ''),'</div>';
    echo '<div> Special Orders $',number_format((float)$classTotal2, 2, '.', ''),'</div>';
    ?>
</div>
<script> 
    let grades = "<?php $grades; ?>"
</script>