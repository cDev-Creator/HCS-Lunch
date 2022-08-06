<?php
session_start();
include("../conn.php");
define('TIMEZONE', 'America/Chicago');
date_default_timezone_set(TIMEZONE);
$mydate=getdate(date("U"));
$ordersDate = "Orders for $mydate[month] $mydate[mday], $mydate[year]";
$weekday = "$mydate[weekday]";
/* $weekday = "Thursday"; */
$date = date("Y-m-d"); 
$result = $conn->query("SELECT grade, item, quantity, price FROM allorders WHERE dates = '$date' ORDER BY grade, item ASC "); 
error_reporting(0);
if(isset($_GET['p'])){
    $p = $_GET['p'];
    echo $p;
}
if(!isset($_SESSION['user'])){
    header("Location:../index.php");
}
?>

<img src="hcslogo.jpg" alt="HCS Logo" width="200" height="70">
<br>
<br>

    <?php 
     ////////////////////////// GO BACK AND MAKE ARRAY DYNAMICALLY CREATED INSTEAD OF HARD CODED/////////////////////////////////////////
     $restaurants = array("54pizza", "chickfila", "ritzys", "arbys",  "greatharvest");

    if($weekday == 'Monday' ){
        $restaurant = $restaurants[0];
    }
    else if($weekday == 'Tuesday' ){
        $restaurant = $restaurants[1];
    }
    else if($weekday == 'Wednesday' ){
        $restaurant = $restaurants[2];
    }
    else if($weekday == 'Thursday' ){
        $restaurant = $restaurants[3];
    }
    else if($weekday == 'Friday' ){
        $restaurant = $restaurants[4];
    }
    else {
        echo 'School is not in session!';
    }

    $resultSet = $conn->query("SELECT item, price FROM $restaurant order by item ASC");
    $fetch1 = $conn->query("SELECT item FROM $restaurant order by item ASC");
    $list = array();

    while($row = mysqli_fetch_assoc($fetch1)){
        $rows = implode(" ",$row);
        array_push($list, $rows);
    }

$menuItemsLength = count($list);

function addItemsFromDB($rows,$grade,$list,$gradeClass) {
    $arr = []; 

    global $menuItemsLength;
    for ($x = -1; $x < $menuItemsLength-1; $x++)  {
        $num = $x+1;
        $className = 'item'.$num;
        echo $className;
        getItemQuantity($rows, $list, $arr,$num,$grade,$className,$gradeClass);
    }
}
    ?>
<?php

?>

<!DOCTYPE html> 
<html> 
    <head>
        <link rel="stylesheet" href="../css/officeTables.css">
    </head>
	<body> 
    <div class="allTables">
	<table id='mainTable'align="center"> 
	<tr> 
		<th colspan="20"><h1 id="mainTableTitle"><?php echo $ordersDate?></h1></th> 
    <tr>
    <td></td>  

    <?php
    while($row = $resultSet->fetch_assoc())
    {
        echo "<td id='menuTblHeader'>" . $row["item"] . "</td>";
    }?>
    </tr>
    
    <tr id="officeStaff">
        <td class="gradeTd">Office Staff</td>
    </tr>

    <tr id="twoDayPk">
        <td class="gradeTd">2 Day Preschool</td>
    </tr>

    <tr id="threeDayPk">
        <td class="gradeTd">3 Day Preschool</td>
    </tr>

    <tr id="first">
        <td class="gradeTd">1st Grade</td>
    </tr>

    <tr id="second">
        <td class="gradeTd">2nd Grade</td>
    </tr>

    <tr id="third" >
        <td class="gradeTd">3rd Grade</td>
    </tr>

    <tr id="fourth">
        <td class="gradeTd">4th Grade</td>
    </tr>

    <tr id="fifth">
        <td class="gradeTd">5th Grade</td>
    </tr>

    <tr id="firstShiftTotal">
        <td class="gradeTd">1st Shift Total</td>
    </tr>

    <tr>
        <td align="center" colspan="20">2nd Shift</td>
    </tr>

    <tr id="sixth">
        <td class="gradeTd">6th Grade</td>
    </tr>

    <tr id="seventh">
        <td class="gradeTd">7th Grade</td>
    </tr>

    <tr id="eighth">
        <td class="gradeTd">8th Grade</td>
    </tr>

    <tr id="secondShiftTotal">
        <td class="gradeTd">2nd Shift Total</td>
    </tr>
    
        <?php 
   
        while($rows = $result->fetch_assoc())
		{
            addItemsFromDB($rows, 'Office Staff', $list, 'office');
            addItemsFromDB($rows, '02 Day Preschool', $list, 'twoDay');
            addItemsFromDB($rows, '03 Day Preschool', $list,'threeDay');   
            addItemsFromDB($rows, '1st Grade', $list, 'firstGrade');
            addItemsFromDB($rows, '2nd Grade', $list,'secondGrade');   
            addItemsFromDB($rows, '3rd Grade', $list,'thirdGrade');
            addItemsFromDB($rows, '4th Grade', $list, 'fourthGrade');
            addItemsFromDB($rows, '5th Grade', $list,'fifthGrade');   
            addItemsFromDB($rows, '6th Grade', $list,'sixthGrade');
            addItemsFromDB($rows, '7th Grade', $list, 'seventhGrade');
            addItemsFromDB($rows, '8th Grade', $list,'eighthGrade');     
    ?>
 
	<?php 
        }
        function getItemQuantity($rows, $list, $arr, $num, $grade, $className,$gradeClass) {
            if($rows['item'] == $list[$num] && $rows['grade'] == $grade ) {
                $quantity = $rows['quantity'];
                echo "<div hidden class='{$className} {$gradeClass}'>";
                array_push($arr, $quantity);
                echo implode (" ",$arr); 
            };
        }
      
    ?> 
	</table> 

    <div class="secondaryTables">
    <?php 
        require('moneySumByClass.php'); 
        require('foodSummary.php'); 
    ?>
    </div>
</div>

<script>
    function foodQuantity(itemClass, gradeClass) {
        var quantity = document.querySelectorAll(`.${gradeClass}.${itemClass}`)

        let sum = 0;
        for (var i = 0; i < quantity.length; i++) {
            var total = quantity[i].innerText;
            sum += parseInt(total);
        }
        return sum;
    }

    let menuItemsLength = <?php echo $menuItemsLength ?>;
    function addOrdersToRow(grade, gradeClass){

        let gradeRow = document.getElementById(grade);
        for(let i = 0; i < menuItemsLength; i++) {
            let itemCount = foodQuantity('item' + i, `${gradeClass}`);
            let cell = gradeRow.insertCell(i + 1);
            cell.innerText = itemCount;  
        }  
    }

    addOrdersToRow('officeStaff', 'office');
    addOrdersToRow('twoDayPk', 'twoDay');
    addOrdersToRow('threeDayPk', 'threeDay');
    addOrdersToRow('first', 'firstGrade');
    addOrdersToRow('second', 'secondGrade');
    addOrdersToRow('third', 'thirdGrade');
    addOrdersToRow('fourth', 'fourthGrade');
    addOrdersToRow('fifth', 'fifthGrade');
    addOrdersToRow('sixth', 'sixthGrade');
    addOrdersToRow('seventh', 'seventhGrade');
    addOrdersToRow('eighth', 'eighthGrade');

    var table = document.getElementById("mainTable")
            
    function addFirstShiftTotals(r1,r2,r3,r4,r5,r6,r7,r8,cell1) {
        const total = Array();
        total.push(table.rows[r1].cells[cell1].innerText);
        total.push(table.rows[r2].cells[cell1].innerText);
        total.push(table.rows[r3].cells[cell1].innerText);
        total.push(table.rows[r4].cells[cell1].innerText);
        total.push(table.rows[r5].cells[cell1].innerText);
        total.push(table.rows[r6].cells[cell1].innerText);
        total.push(table.rows[r7].cells[cell1].innerText);
        total.push(table.rows[r8].cells[cell1].innerText);

        var arrayOfNumbers = total.map(Number);
        var sum = 0;
        for (var i = 0; i < arrayOfNumbers.length; i++) {
            sum += arrayOfNumbers[i]
        }
        const firstTotal = document.getElementById("firstShiftTotal");
        let cell = firstTotal.insertCell(1);
        cell.innerText = sum;   
    }

    function reverseOrderFirst() {
        for (var i = menuItemsLength-1; i>=0; i--) {
            let col = i + 1;
            addFirstShiftTotals(2,3,4,5,6,7,8,9,col);
        }
    }
    reverseOrderFirst();

    function addSecondShiftTotals(r1,r2,r3,cell2) {
        const total = Array();
        total.push(table.rows[r1].cells[cell2].innerText);
        total.push(table.rows[r2].cells[cell2].innerText);
        total.push(table.rows[r3].cells[cell2].innerText);

        var arrayOfNumbers = total.map(Number);
        var sum = 0;
        for (var i = 0; i < arrayOfNumbers.length; i++) {
            sum += arrayOfNumbers[i]
        }
        const secondTotal = document.getElementById("secondShiftTotal");
        let cell = secondTotal.insertCell(1);
        cell.innerText = sum;      
    }

    function reverseOrderSecond() {
        for (var i = menuItemsLength-1; i>=0; i--) {
            let col2 = i + 1;
            addSecondShiftTotals(12,13,14,col2);
        }
    }
    reverseOrderSecond();


////////////////////////////////*  FOR FOOD SUMMARY TABLE */////////////////////////
  
    let menuItemSchoolQuantitiesArr = Array();
    function menuItemSchoolQuantities() {
        for (var i=1; i <= menuItemsLength; i++) {
        let firstShiftTotals =table.rows[10].cells[i].innerText;
        let secondShiftTotals = table.rows[15].cells[i].innerText;
        let firstShiftTotalsInt = parseInt(firstShiftTotals);
        let secondShiftTotalsInt = parseInt(secondShiftTotals);

        let totals = firstShiftTotalsInt + secondShiftTotalsInt;
        menuItemSchoolQuantitiesArr.push(totals);
        }
    }
    menuItemSchoolQuantities()

var td2 = document.querySelectorAll('.td2');
for(var i=0; i<td2.length;i++){
  td2[i].textContent = menuItemSchoolQuantitiesArr[i];
}

/////////////////////////////////////* AMOUNT OF MONEY PER ITEM *//////////////////////////

function menuItemSchoolTotals(){
    quantityArr = Array();
    for(var i=0; i<td2.length;i++){
    let quantity = td2[i].textContent;
    let quantityInt = parseInt(quantity);
    quantityArr.push(quantityInt);
    }

    let priceArr = Array();
    var td3 = document.querySelectorAll('.td3');
    for(var i=0; i<td3.length;i++){
        let prices = td3[i].textContent;
        let pricesFloat = parseFloat(prices);
        priceArr.push(pricesFloat);
    }

    let totalCost = [];
    for(var i = 0; i < totalCost.length; i++) { 
        totalCost[i] = priceArr[i] * quantityArr[i]; 
    }

    let totalCostDecimalArr = [];
    for (let i = 0; i < Math.min(quantityArr.length, priceArr.length); i++) {
            totalCost[i] = quantityArr[i] * priceArr[i];

            var decimal = totalCost[i].toFixed(2)
            totalCostDecimalArr.push('$'+decimal)
        }

    let td4 = document.querySelectorAll('.td4');
        for(var i=0; i<td4.length;i++){
        td4[i].textContent = totalCostDecimalArr[i];
    }
}
menuItemSchoolTotals()
</script>