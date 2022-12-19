<!DOCTYPE html>
<html lang="en">
<?php
session_start();
error_reporting(0);
include("../conn.php");
if(isset($_GET['message'])){
    $message = $_GET['message'];
}
if(isset($_GET['messages'])){
    $messages = $_GET['messages'];
}
if(isset($_GET['p'])){
    $p = $_GET['p'];
}

if(!isset($_SESSION['user'])){
    header("Location:../index.php");
}

$grades = $_SESSION["grade"] = $_POST['grade'] ?? $_SESSION["grade"];
$title = "Lunch Orders for ".$grades;
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/orderTable.css">
    <title>HCS Lunch Testing</title>
</head>
<body>
    
<!-- STUDENTS FROM OTHER CLASSES  -->
<?php
$result = $conn->query("SELECT * FROM names ORDER BY firstName ASC"); 
?>

<h1 id="orderLunchTitle"><?php echo $title?></h1>
<p id="oneStudentMsg"><p>
<p id="studentToDiffClassMsg"><p>


<form name="lunch-form" id="lunch-form" method="post" action="ordersDB.php?p=<?php echo $p?>"> 
<select name="allNames" id="allStudents" class="dropdown">
<option value='' selected='selected'>--All Students--</option>;
<?php
while($rows = $result->fetch_assoc())
{
    $first_name = $rows['firstName'];
    $last_name = $rows['lastName'];
    $grade = $rows['grade'];
    echo "<option value='$first_name $last_name-$grade'> $first_name $last_name - $grade</option>"; 
}
?>
</select>

<!-- STUDENTS FROM CHOSEN CLASS  -->
<?php
$resultSet = $conn->query("SELECT firstName, lastName, grade FROM names");
$result = $conn->query("SELECT * FROM names WHERE grade='$grades' order by firstName ASC ");
?>

<select name="names" id="students" class="dropdown">
<option value='' selected='selected'><?php echo'--'.$grades,' Students--'?></option>;
<?php
while($rows = $result->fetch_assoc())
{
    $first_name = $rows['firstName'];
    $last_name = $rows['lastName'];
    $grade = $rows['grade'];
    echo "<option value='$first_name $last_name-$grade'> $first_name $last_name</option>";
} 
?>
</select>

<?php 
define('TIMEZONE', 'America/Chicago');
date_default_timezone_set(TIMEZONE);
$mydate=getdate(date("U"));
/* $weekday = "$mydate[weekday]"; */
$weekday = "Monday";
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
    
    $results = $conn->query("SELECT item, price FROM $restaurant order by item ASC");

    ?>

    <select name="items" id="menuItems" class="dropdown" required>
    <option value='' selected='selected'>--Menu Items--</option>;

  <?php
    while($rows = $results->fetch_assoc())
    {
      $item = $rows['item'];
      $price = $rows['price'];

      echo "<option id='menuSelection' class='menuSelection' name='items' value='$item-$price'>$item - $price</option>";   
    }
  ?>   

<input type="number" name="quantities" id="quantities" placeholder="Qty" value=1 min=1 max=20 required/>
<button type="submit" name="submit" id="submitOrderBtn">Order</button>


</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    window.onload = function() {
    let allStudentsItem = sessionStorage.getItem("allStudentsItem");  
    $('#allStudents').val(allStudentsItem);

    let studentsItem= sessionStorage.getItem("studentsItem");  
    $('#students').val(studentsItem);


    }
    
    $('#allStudents').change(function() { 
        let allStudentsVal = $(this).val();
        sessionStorage.setItem("allStudentsItem", allStudentsVal);
    });

    $('#students').change(function() { 
    let studentsVal = $(this).val();
        sessionStorage.setItem("studentsItem", studentsVal);
        document.cookie = "myJavascriptVar = " + studentsVal; 
    })

</script> 

<?php
$studentsVal= $_COOKIE['myJavascriptVar'];
$nameExplo = explode("-",$studentsVal);
$name = array_values($nameExplo)[0];
$date = date("Y-m-d"); 
$currStudentTotal = $conn->query("SELECT name, price FROM allorders WHERE name ='$name' AND dates='$date'"); 
$total = 0;

echo "<br>";

$rows = [];
$allTotals = [];
while($row = $currStudentTotal->fetch_assoc()){
    $total = $total + floatval($rows["price"]);
    $total = $total + floatval($rows["price"]);

    $rows[] = $row['price'];
    $floats = array_map('floatval', $rows);

    $arrSum = array_sum($floats);
    $totalsFormated = number_format($arrSum, 2, '.', '');
    array_push($allTotals, $totalsFormated);
}

require('classTotals.php');
require('classOrderTable.php');

$currStuTotal = end($allTotals);
echo '<div id="currStuTotal">',$name,' owes $'.$currStuTotal,'</div>';

if($studentsVal != null){
    echo "<script type='text/javascript'>
    var x = document.getElementById('currStuTotal');
    x.style.display = 'grid';
    </script>";
}

?>

<button id="goBackBtn" class="backBtn"><a id='a'>Go Back</a></button>
<button id="logoutBtn"><a href="logout.php">Log Out</a></button>

<script> 
    let errorMsg = "<?php echo $message; ?>";
    document.getElementById("oneStudentMsg").innerHTML = errorMsg;

    let newClass = "<?php echo $messages; ?>";
    document.getElementById("studentToDiffClassMsg").innerHTML = newClass;

    let p = "<?php echo $p; ?>";
    let goBackBtn = document.getElementById("goBackBtn");
    let a = document.getElementById("a");

    if(p == 'epBNsTp581Y') {
        goBackBtn.addEventListener("click", function(){
            
        a.href = "../HomePage/officeStaffAccess.php?p=epBNsTp581Y"
    })
    }
    else if(p == 'nHb8fN6m6mY') {
        goBackBtn.addEventListener("click", function(){
          
        a.href = "../HomePage/teacherAccess.php?p=nHb8fN6m6mY"
    })
    }

    let grade = "<?php echo $grades; ?>";
    let titles = "<?php echo $title; ?>";
    if (grade === "Office Staff") {
        document.getElementById('orderLunchTitle').innerHTML = 'Special Orders';
        document.getElementById('students').style.display = 'none';
        document.getElementById('quantities').style.gridColumn = 'span 2';
    } 

</script>
 
</body>
</html>