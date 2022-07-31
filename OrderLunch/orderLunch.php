
<?php
session_start();
error_reporting(0);
if(isset($_GET['message'])){
    $message = $_GET['message'];
}
if(isset($_GET['messages'])){
    $messages = $_GET['messages'];
}

if(isset($_GET['p'])){
    $p = $_GET['p'];
}


?>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
<?php
$grades = $_SESSION["grade"] = $_POST['grade'] ?? $_SESSION["grade"];

$title = "Lunch Orders for ".$grades;
?>

<!-- STUDENTS FROM OTHER CLASSES  -->
<?php
$mysqli = new mysqli('localhost','root','','menus');
$result = $mysqli->query("SELECT * FROM names ORDER BY grade, firstName ASC"); 

?>

<h1 id="orderLunchTitle"><?php echo $title?></h1>
<p id="oneStudentMsg"><p>
<p id="studentToDiffClassMsg"><p>


<form name="lunch-form" id="lunch-form" method="post" action="ordersDB.php"> 
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

$mysqli = new mysqli('localhost','root','','menus');
$resultSet = $mysqli->query("SELECT firstName, lastName, grade FROM names");

$result = $mysqli->query("SELECT * FROM names WHERE grade='$grades' order by firstName ASC ");
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
$weekday = "Thursday";

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
    
    $results = $mysqli->query("SELECT item, price FROM $restaurant order by item ASC");

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

<input type="number" name="quantities" id="quantities" placeholder="Qty" min='1' max='20' required/>
<button type="submit" name="submit" id="submitOrderBtn">Order</button>

</form>

<?php
require('classOrderTable.php');
?>

<button id="goBackBtn" class="backBtn">Go Back</button>

<!-- <button class="backBtn"><a href="../officeStaffAccess.php">Go Back</a></button> -->
<button id="logoutBtn"><a href="logout.php">Log Out</a></button>

<script> 
    let errorMsg = "<?php echo $message; ?>";
    document.getElementById("oneStudentMsg").innerHTML = errorMsg;

    let newClass = "<?php echo $messages; ?>";
    document.getElementById("studentToDiffClassMsg").innerHTML = newClass;

    let p = "<?php echo $p; ?>";
    let goBackBtn = document.getElementById("goBackBtn");

    if(p == 'epBNnTp581Y') {
        goBackBtn.addEventListener("click", function(){
        window.location.replace("../officeStaffAccess.php");
    })
    }
    else if(p == 'nHb8fN6m6mY') {
        goBackBtn.addEventListener("click", function(){
        window.location.replace("../teacherAccess.php");
    })
    }
</script>