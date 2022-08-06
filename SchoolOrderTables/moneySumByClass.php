<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
</head>

<body>
<table id="moneySumTable" align="center">
    <tr> 
		<th id="moneySumTitle" colspan="2"><h2>Class Totals</h2></th> 
    </tr>
    <tr>
        <td>Class</td> 
        <td>Cash</td> 
    </tr>

    <tr id="officeMoneySum">
        <td>Office Staff</td>
    </tr>

    <tr id="twoDayMoneySum">
        <td>2 Day Preschool</td>
    </tr>

    <tr id="threeDayMoneySum">
        <td>3 Day Preschool</td>
    </tr>
   
    <tr id="firstMoneySum">
        <td>1st Grade</td>
    </tr>

    <tr id="secondMoneySum">
        <td>2nd Grade</td>
    </tr>

    <tr id="thirdMoneySum" >
        <td>3rd Grade</td>
    </tr>

    <tr id="fourthMoneySum" >
        <td>4th Grade</td>
    </tr>

    <tr id="fifthMoneySum">
        <td>5th Grade</td>
    </tr>

    <tr id="sixthMoneySum">
        <td>6th Grade</td>
    </tr>

    <tr id="seventhMoneySum">
        <td>7th Grade</td>
    </tr>

    <tr id="eighthMoneySum">
        <td>8th Grade</td>
    </tr>

    <tr id="totalMoneySum">
        <td>Total</td>
    </tr>
    <table>
</body>

</html>

<?php 
include("../conn.php");
$date = date("Y-m-d"); 
$result = $conn->query("SELECT grade, item, quantity, price FROM allorders WHERE dates = '$date' ORDER BY grade, item ASC "); 

$finalTotal = 0;
$officeTotal = 0;
$twoDayTotal = 0;
$threeDayTotal = 0;
$firstTotal = 0;
$secondTotal = 0;
$thirdTotal = 0;
$fourthTotal = 0;
$fifthTotal = 0;
$sixthTotal = 0;
$seventhTotal = 0;
$eighthTotal = 0;


while($rows = $result->fetch_assoc()) {

    if ($rows['grade'] == 'Office Staff'):
        $officeTotal = $officeTotal + floatval($rows["price"]);

    elseif ($rows['grade'] == '02 Day Preschool'):
        $twoDayTotal = $twoDayTotal + floatval($rows["price"]);

    elseif ($rows['grade'] == '03 Day Preschool'):
        $threeDayTotal = $threeDayTotal + floatval($rows["price"]);

    elseif ($rows['grade'] == '1st Grade'):
        $firstTotal = $firstTotal + floatval($rows["price"]);
   
    elseif ($rows['grade'] == '2nd Grade'):
        $secondTotal = $secondTotal + floatval($rows["price"]);
  
    elseif($rows['grade'] == '3rd Grade'):
        $thirdTotal = $thirdTotal + floatval($rows["price"]);
 
    elseif($rows['grade'] == '4th Grade') :
        $fourthTotal = $fourthTotal + floatval($rows["price"]);

    elseif($rows['grade'] == '5th Grade') :
        $fifthTotal = $fifthTotal + floatval($rows["price"]);
  
    elseif($rows['grade'] == '6th Grade') :
        $sixthTotal = $sixthTotal + floatval($rows["price"]);
   
    elseif($rows['grade'] == '7th Grade') :
        $seventhTotal = $seventhTotal + floatval($rows["price"]);
    
    elseif($rows['grade'] == '8th Grade') :
        $eighthTotal = $eighthTotal + floatval($rows["price"]);

    endif;

    $finalTotal = $eighthTotal + $seventhTotal + $sixthTotal + $fifthTotal + $fourthTotal + $thirdTotal
    + $secondTotal + $firstTotal +  $threeDayTotal + $twoDayTotal + $officeTotal;
}
?>

<script>
    function addMoneySummary(gradeMoneySum,cashTotal) {
        let moneySum = document.getElementById(gradeMoneySum);
        let classTotal = moneySum.insertCell(1);
        let classTotalVal =  cashTotal;

        let classTotalValDecimal = classTotalVal.toFixed(2);
        classTotal.innerText = '$'+classTotalValDecimal;
    }

    let officeStaff =  <?php echo number_format((float)$officeTotal, 2, '.', ''); ?>;
    addMoneySummary('officeMoneySum', officeStaff);

    let twoDay =  <?php echo number_format((float)$twoDayTotal, 2, '.', ''); ?>;
    addMoneySummary('twoDayMoneySum', twoDay);

    let threeDay =  <?php echo number_format((float)$threeDayTotal, 2, '.', ''); ?>;
    addMoneySummary('threeDayMoneySum', threeDay);

    let first =  <?php echo number_format((float)$firstTotal, 2, '.', ''); ?>;
    addMoneySummary('firstMoneySum', first);

    let second =  <?php echo number_format((float)$secondTotal, 2, '.', ''); ?>;
    addMoneySummary('secondMoneySum', second);

    let third =  <?php echo number_format((float)$thirdTotal, 2, '.', ''); ?>;
    addMoneySummary('thirdMoneySum', third);

    let fourth =  <?php echo number_format((float)$fourthTotal, 2, '.', ''); ?>;
    addMoneySummary('fourthMoneySum', fourth);

    let fifth =  <?php echo number_format((float)$fifthTotal, 2, '.', ''); ?>;
    addMoneySummary('fifthMoneySum', fifth);

    let sixth =  <?php echo number_format((float)$sixthTotal, 2, '.', ''); ?>;
    addMoneySummary('sixthMoneySum', sixth);

    let seventh =  <?php echo number_format((float)$seventhTotal, 2, '.', ''); ?>;
    addMoneySummary('seventhMoneySum', seventh);

    let eighth =  <?php echo number_format((float)$eighthTotal, 2, '.', ''); ?>;
    addMoneySummary('eighthMoneySum', eighth);

    let total =  <?php echo number_format((float)$finalTotal, 2, '.', ''); ?>;
    addMoneySummary('totalMoneySum', total);

</script>