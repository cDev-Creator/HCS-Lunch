<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
</head>

<body>
<table width="200px" border="1" cellspacing="1" cellpadding="1">
    <tr> 
		<th colspan="10"><h2>Money Summary by Class</h2></th> 
    </tr>
    <tr>
        <td>Class</td> 
        <td>Cash</td> 
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
    <table>
</body>

</html>

<?php 
$mysqli = new mysqli('localhost','root','','orders');
$result = $mysqli->query("SELECT grade, item, quantity, price FROM allorders WHERE DATE(dates) = DATE(NOW()) ORDER BY grade, item ASC "); 

$total = 0;
$firstTotal = 0;
$secondTotal = 0;
$thirdTotal = 0;
$fourthTotal = 0;
$fifthTotal = 0;
$sixthTotal = 0;
$seventhTotal = 0;
$eighthTotal = 0;


while($rows = $result->fetch_assoc()) {
    if ($rows['grade'] == '1st Grade'):
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

}
?>

<script>
    function addMoneySummary(gradeMoneySum,cashTotal) {
        let moneySum = document.getElementById(gradeMoneySum);
        let classTotal = moneySum.insertCell(1);
        let classTotalVal =  cashTotal;
        classTotal.innerHTML = classTotalVal;
    }

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

</script>