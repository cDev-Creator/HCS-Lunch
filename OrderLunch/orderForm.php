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
    <tr>
        <td>2 Day Preschool</td>
    </tr>

    <tr>
        <td>3 Day Preschool</td>
    </tr>


    <tr>
        <td>1st Grade</td>
    </tr>

    <tr>
        <td>2nd Grade</td>
    </tr>

    <tr>
        <td>3rd Grade</td>
    </tr>

    <tr>
        <td>5th Grade</td>
    </tr>

    <tr>
        <td>1st Shift Total</td>
    </tr>

    <tr>
        <td align="center" colspan="20">2nd Shift</td>
    </tr>

    <tr>
        <td>6th Grade</td>
    </tr>

    <tr>
        <td>7th Grade</td>
        <?php echo "<td>" . $menuItem1 . "</td>";?>
        <?php echo "<td>" . $menuItem2 . "</td>";?>
        <?php echo "<td>" . $menuItem3 . "</td>";?>
        <?php echo "<td>" . $menuItem4 . "</td>";?>
        <?php echo "<td>" . $menuItem5 . "</td>";?>
        <?php echo "<td>" . $menuItem6 . "</td>";?>
        <?php echo "<td>" . $menuItem7 . "</td>";?>
        <?php echo "<td>" . $menuItem8 . "</td>";?>
    </tr>

    <tr>
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
    var classTotal = "<?php echo $classTotal; ?>";

    console.log(classTotal);
    document.getElementById("totalCost").innerHTML = classTotal;

</script>


