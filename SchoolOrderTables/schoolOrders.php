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



$menuItemsLength = count($list);

function addItemsFromDB($rows,$grade,$list,$gradeClass) {
    
    $arr = []; 
    $num = 0;
    $className = 'item0';
    getItemQuantity($rows, $list, $arr,$num,$grade,$className,$gradeClass);

   $num = 1;
   $className = 'item1';
   getItemQuantity($rows, $list, $arr,$num,$grade,$className,$gradeClass);

   $num = 2;
   $className = 'item2';
   getItemQuantity($rows, $list, $arr,$num,$grade,$className,$gradeClass);

   $num = 3;
   $className = 'item3';
   getItemQuantity($rows, $list, $arr,$num,$grade,$className,$gradeClass);

   $num = 4;
   $className = 'item4';
   getItemQuantity($rows, $list, $arr,$num,$grade,$className,$gradeClass);

   $num = 5;
   $className = 'item5';
   getItemQuantity($rows, $list, $arr,$num,$grade,$className,$gradeClass);

   $num = 6;
   $className = 'item6';
   getItemQuantity($rows, $list, $arr,$num,$grade,$className,$gradeClass);

   $num = 7;
   $className = 'item7';
   getItemQuantity($rows, $list, $arr,$num,$grade,$className,$gradeClass); 

}

    ?>
<?php

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
	
      

        <br>

        <?php 
   
        while($rows = $result->fetch_assoc())
		{
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

    <?php 
        require('moneySumByClass.php'); 
    ?>

<script>
    function foodQuantity(itemClass, gradeClass) {
        /* var quantity = document.getElementsByClassName(itemClass); */
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
            console.log(itemCount);
            let cell = gradeRow.insertCell(i + 1);
            cell.innerHTML = itemCount;  
        }  
    }

    addOrdersToRow('first', 'firstGrade');
    addOrdersToRow('second', 'secondGrade');

    addOrdersToRow('third', 'thirdGrade');
    addOrdersToRow('fourth', 'fourthGrade');
    addOrdersToRow('fifth', 'fifthGrade');

    addOrdersToRow('sixth', 'sixthGrade');
    addOrdersToRow('seventh', 'seventhGrade');
    addOrdersToRow('eighth', 'eighthGrade');

</script>