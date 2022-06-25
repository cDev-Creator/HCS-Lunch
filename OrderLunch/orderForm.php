<?php 
$classTotal = $_POST['classTotal'];
echo "Total Cash: ".$classTotal;
echo "</br>";

$menuItem1 = $_POST['menuItem1'];
$menuItem2 = $_POST['menuItem2'];
$menuItem3 = $_POST['menuItem3'];
$menuItem4 = $_POST['menuItem4'];
$menuItem5 = $_POST['menuItem5'];
$menuItem6 = $_POST['menuItem6'];
$menuItem7 = $_POST['menuItem7'];
$menuItem8 = $_POST['menuItem8'];


$mysqli = new mysqli('localhost','root','','menus');
$resultSet = $mysqli->query("SELECT item FROM greatharvest order by item ASC");

define('TIMEZONE', 'America/Chicago');
date_default_timezone_set(TIMEZONE);
$mydate=getdate(date("U"));
echo "Great Harvest Order";
echo "</br>";
echo "for ";
echo "$mydate[month] $mydate[mday], $mydate[year]";
echo "</br>";
echo "</br>";
echo "</br>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<style>

</style>

<table id="mainTable" width="900px" border="1" cellspacing="1" cellpadding="1">
    
    <tr>
    <td></td>  
    <?php
    while($row = $resultSet->fetch_assoc())
    {
        echo "<td>" . $row["item"] . "</td>";
    }?>
    </tr>

    <tr>
        <td align="center" colspan="20">1st Shift</td>
    </tr>

    <tr>
        <td>Office Staff</td>  
    </tr>

    <tr id="twoDay" >
        <td>2 Day Preschool</td>
    </tr>

    <tr id="threeDay">
        <td>3 Day Preschool</td>
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

    <tr>
        <td>2nd Shift Total</td>
    </tr>

    <tr>
        <td>Total Ordered</td>
    </tr>

    <tr>
        <td>Item Price</td>
    </tr>

    <tr>
        <td>Total Cost</td>
     
        <td id="totalCost"></td>
    </tr>

</table>

</body>
</html>

<script>
        var gradeVar = localStorage.getItem("gradeVar")
        console.log(gradeVar);
        
        switch(gradeVar) {

            case "02 Day Preschool": {
                let grade  = document.getElementById("twoDay");
                insertOrders(grade);
            }
            break;

            case "03 Day Preschool": {
                let grade  = document.getElementById("threeDay");
                insertOrders(grade);
            }
            break;

            case "1st Grade": {
                let grade  = document.getElementById("first");
                insertOrders(grade); 
            }
            break;

            case "2nd Grade": {
                let grade  = document.getElementById("second");
                insertOrders(grade); 
            }
            break;

            case "3rd Grade": {
                let grade  = document.getElementById("third");
                insertOrders(grade); 
            }
            break;

            case "4th Grade": {
                let grade  = document.getElementById("fourth");
                insertOrders(grade); 
            }
            break;

            case "5th Grade": {
                let grade  = document.getElementById("fifth");
                insertOrders(grade); 
            }
            break;

            case "6th Grade": {
                let grade  = document.getElementById("sixth");
                insertOrders(grade); 
            }
            break;

            case "7th Grade": {
                let grade  = document.getElementById("seventh");
                insertOrders(grade);
            }
            break;

            case "8th Grade": {
                let grade  = document.getElementById("eighth");
                insertOrders(grade);
            }
            break;
        }

        function insertOrders(grade) {
            let item1 = grade.insertCell(-1);
            let item2 = grade.insertCell(2);
            let item3 = grade.insertCell(3);
            let item4 = grade.insertCell(4);
            let item5 = grade.insertCell(5);
            let item6 = grade.insertCell(6);
            let item7 = grade.insertCell(7);
            let item8 = grade.insertCell(8);

            let item1Val =  <?php echo $menuItem1;?>;
            let item2Val =  <?php echo $menuItem2;?>;
            let item3Val =  <?php echo $menuItem3;?>;
            let item4Val =  <?php echo $menuItem4;?>;
            let item5Val =  <?php echo $menuItem5;?>;
            let item6Val =  <?php echo $menuItem6;?>;
            let item7Val =  <?php echo $menuItem7;?>;
            let item8Val =  <?php echo $menuItem8;?>;
                
            item1.innerHTML = item1Val;
            item2.innerHTML = item2Val;
            item3.innerHTML = item3Val;
            item4.innerHTML = item4Val;
            item5.innerHTML = item5Val;
            item6.innerHTML = item6Val;
            item7.innerHTML = item7Val;
            item8.innerHTML = item8Val;
        }
   
    </script>


<script>
    var classTotal = "<?php echo $classTotal; ?>";

    console.log(classTotal);
    document.getElementById("totalCost").innerHTML = classTotal;
</script>