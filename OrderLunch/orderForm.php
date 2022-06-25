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

            case "2 Day Preschool": {

            }
            break;

            case "2 Day Preschool": {
                
            }
            break;

            case "1st Grade": {
                
            }
            break;

            case "2nd Grade": {
                
            }
            break;

            case "3rd Grade": {
                
            }
            break;

            case "4th Grade": {
                
            }
            break;

            case "5th Grade": {
                
            }
            break;

            case "6th Grade": {
                
            }
            break;

            case "7th Grade": {
                let seventh  = document.getElementById("seventh");
                let item1 = seventh.insertCell(-1);
                let item2 = seventh.insertCell(2);
                let item3 = seventh.insertCell(3);
                let item4 = seventh.insertCell(4);
                let item5 = seventh.insertCell(5);
                let item6 = seventh.insertCell(6);
                let item7 = seventh.insertCell(7);
                let item8 = seventh.insertCell(8);

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
            break;

            case "8th Grade": {
                let eighth  = document.getElementById("eighth");
                let item1 = eighth.insertCell(-1);
                let item2 = eighth.insertCell(2);
                let item3 = eighth.insertCell(3);
                let item4 = eighth.insertCell(4);
                let item5 = eighth.insertCell(5);
                let item6 = eighth.insertCell(6);
                let item7 = eighth.insertCell(7);
                let item8 = eighth.insertCell(8);

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
            break;
         default:
        
        
        }
             
    </script>


<script>
    var classTotal = "<?php echo $classTotal; ?>";

    console.log(classTotal);
    document.getElementById("totalCost").innerHTML = classTotal;
</script>