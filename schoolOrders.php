<?php
$mysqli = new mysqli('localhost','root','','orders');
$result = $mysqli->query("SELECT grade, item, quantity, price FROM allorders WHERE DATE(dates) = DATE(NOW()) ORDER BY grade, item ASC "); 
/* $result = $mysqli->query("SELECT grade, item, quantity, price FROM allorders ORDER BY grade, item ASC ");  */

?>

<!--------------------------------------- REPETIVE CODE FROM MENUS.PHP PUT INTO ONE FILE ---------------------------------------->
<?php
define('TIMEZONE', 'America/Chicago');
date_default_timezone_set(TIMEZONE);
$mydate=getdate(date("U"));
echo "Date: ";
echo "$mydate[month] $mydate[mday], $mydate[year]";
echo"</br>";
echo "Day of the week : ";
/* $weekday = "$mydate[weekday]"; */
$weekday = "Friday";

echo $weekday;
echo"</br>";
echo"</br>";
echo "Menu:";
?>
    <?php 
    $mysqli = new mysqli('localhost','root','','menus');
     ////////////////////////// GO BACK AND MAKE ARRAY DYNAMICALLY CREATED INSTEAD OF HARD CODED/////////////////////////////////////////
    $restaurants = array("54pizza", "arbys", "ritzys", "chickfila", "greatharvest");

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

    $resultSet = $mysqli->query("SELECT item, price FROM $restaurant order by item ASC");

    $fetch1 = $mysqli->query("SELECT item FROM $restaurant order by item ASC");
    $list = array();

    while($row = mysqli_fetch_assoc($fetch1)){
        $rows = implode(" ",$row);
        array_push($list, $rows);
    }

    foreach ($list as $value) {
        echo "$value <br>";
    }
    ?>

<!DOCTYPE html> 
<html> 
	<body> 
	<table align="center" border="1px" style="width:1000px; line-height:40px;"> 
	<tr> 
		<th colspan="10"><h2>Student Orders</h2></th> 
    <tr>
    <td></td>  

    <?php
    while($row = $resultSet->fetch_assoc())
    {
        echo "<td><div class='menuItemTblHeader'>" . $row["item"] . "</td>";
    }?>
    </tr>

    <tr id="first">
        <td>1st Grade</td>
        
    </tr>

    <tr id="second">
        <td>2nd Grade</td>
    </tr>

    <tr id="third" >
        <td>3rd Grade</td>
    </tr>

    <tr id="fourth">
        <td>5th Grade</td>
    </tr>

    <tr id="fifth">
        <td>1st Shift Total</td>
    </tr>

    <tr>
        <td align="center" colspan="20">2nd Shift</td>
    </tr>

    <tr id="sixth">
        <td>6th Grade</td>
    </tr>

    <tr id="seventh">
        <td>7th Grade</td>
    </tr>

    <tr id="eighth">
        <td>8th Grade</td>

    </tr>
	
        <?php $total = 0;?>
        <?php $firstTotal = 0;?>
        <?php $secondTotal = 0;?>
        <?php $thirdTotal = 0;?>
        <?php $fourthTotal = 0;?>
        <?php $fifthTotal = 0;?>
        <?php $sixthTotal = 0;?>
        <?php $seventhTotal = 0;?>
        <?php $eighthTotal = 0;?>

        <br>

		<?php while($rows = $result->fetch_assoc())
		{ 
	

        $arr = []; 
        $num = 0;
        $grade = '8th Grade';
        $className = 'item0';
        getItemQuantity($rows, $list, $arr,$num,$grade,$className);

       $num = 1;
       $className = 'item1';
       getItemQuantity($rows, $list, $arr,$num,$grade,$className);

       $num = 2;
       $className = 'item2';
       getItemQuantity($rows, $list, $arr,$num,$grade,$className);

       $num = 3;
       $className = 'item3';
       getItemQuantity($rows, $list, $arr,$num,$grade,$className);

       $num = 4;
       $className = 'item4';
       getItemQuantity($rows, $list, $arr,$num,$grade,$className);

       $num = 5;
       $className = 'item5';
       getItemQuantity($rows, $list, $arr,$num,$grade,$className);

       $num = 6;
       $className = 'item6';
       getItemQuantity($rows, $list, $arr,$num,$grade,$className);

       $num = 7;
       $className = 'item7';
       getItemQuantity($rows, $list, $arr,$num,$grade,$className);

    ?>

    <?php 
     



/*//////////////////////////////////////////// MONEY SUMMARY BY CLASS ////////////////////////////////*/
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
        ?>
         
	<?php 
        }
        function getItemQuantity($rows, $list, $arr, $num, $grade, $className) {
            if($rows['item'] == $list[$num] && $rows['grade'] == $grade ) {
                $quantity = $rows['quantity'];

                echo "<div hidden class='{$className}'>";
                array_push($arr, $quantity);
                echo implode (" ",$arr); 
            };
        }

    ?> 

	</table> 

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    




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

<script>

    let eighth = document.getElementById('eighthMoneySum');
    let classTotal1 = eighth.insertCell(1);
    let classTotal1Val =  <?php echo number_format((float)$eighthTotal, 2, '.', ''); ?>;
    classTotal1.innerHTML = classTotal1Val;

    let first = document.getElementById('firstMoneySum');
    let classTotal2 = first.insertCell(1);
    let classTotal2Val =  <?php echo number_format((float)$firstTotal, 2, '.', ''); ?>;
    classTotal2.innerHTML = classTotal2Val;






    function foodQuanity(itemClass) {
        var quantity = document.getElementsByClassName(itemClass);
        let sum = 0;
        for (var i = 0; i < quantity.length; i++) {
            var total = quantity[i].innerText;
            sum += parseInt(total);
        }
        console.log("Meal 8th:", sum);
        return sum;
    }

    let item0 = foodQuanity('item0');
    let eighthRow = document.getElementById('eighth')
    let cell0 = eighthRow.insertCell(1);
    cell0.innerHTML = item0;

    let item1 = foodQuanity('item1');
    let cell1 = eighthRow.insertCell(2);
    cell1.innerHTML = item1;

    let item2 = foodQuanity('item2');
    let cell2 = eighthRow.insertCell(3);
    cell2.innerHTML = item2;

    let item3 = foodQuanity('item3');
    let cell3 = eighthRow.insertCell(4);
    cell3.innerHTML = item3;

    let item4 = foodQuanity('item4');
    let cell4 = eighthRow.insertCell(5);
    cell4.innerHTML = item4;

    let item5 = foodQuanity('item5');
    let cell5 = eighthRow.insertCell(6);
    cell5.innerHTML = item5;

    let item6 = foodQuanity('item6');
    let cell6 = eighthRow.insertCell(7);
    cell6.innerHTML = item6;

    let item7 = foodQuanity('item7');
    let cell7 = eighthRow.insertCell(8);
    cell7.innerHTML = item7;

</script>