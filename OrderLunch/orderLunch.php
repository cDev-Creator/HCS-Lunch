<?php
session_start();
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<?php
$staffID = $_SESSION["staffID"] = $_POST['staffID'] ?? $_SESSION["staffID"];
$grades = $_SESSION["grade"] = $_POST['grade'] ?? $_SESSION["grade"];


$mydate=getdate(date("U"));
echo "Date: ";
echo "$mydate[month] $mydate[mday], $mydate[year]";
echo "<br/>";
echo "Staff ID: ".$staffID; 
echo "<br/>";
echo "Teaching: ".$grades;
echo "<br/>";
echo "<br/>";
?>

<!-- STUDENTS FROM OTHER CLASSES  -->
<?php
$mysqli = new mysqli('localhost','root','','students');
$result = $mysqli->query("SELECT * FROM names ORDER BY grade, firstName ASC"); 

?>

<form name="lunch-form" id="lunch-form" method="post" action="ordersDB.php"> 

<select name="allNames" id="allStudents">
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

$mysqli = new mysqli('localhost','root','','students');
$resultSet = $mysqli->query("SELECT firstName, lastName, grade FROM names");

$result = $mysqli->query("SELECT * FROM names WHERE grade='$grades' order by firstName ASC ");
?>
<select name="names" id="students">
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

<br>
<br>

<?php 

define('TIMEZONE', 'America/Chicago');
date_default_timezone_set(TIMEZONE);
$mydate=getdate(date("U"));
/* $weekday = "$mydate[weekday]"; */
$weekday = "Friday";

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

    <select name="items" id="menuItems" required>
    <option value='' selected='selected'>--Menu Items--</option>;

  <?php
    while($rows = $results->fetch_assoc())
    {
      $item = $rows['item'];
      $price = $rows['price'];


      echo "<option id='menuSelection' class='menuSelection' name='items' value='$item-$price'>$item - $price</option>";  
        
    }
   
  ?>   


<input type="number" name="quantities" id="quantities" placeholder="Quantity" min='1' max='20' required/>
<button type="submit" name="submit" id="submitBtn">Submit Test</button>
</form>


<!--AJAX-->

<?php
/* require('menus.php'); */

require('classOrderTable.php');

?>

<p id="successMsg"> <p>



 <script>
/*     $(document).ready(function() {
        $("#lunch-form").submit(function(e) {
            e.preventDefault();
            $.ajax( {
                url: "ordersDB.php",
                method: "POST",
                data: $("form").serialize(),
                dataType: "text",
                success: function() {
                    $("#lunch-form")[0].reset();
                    location.reload();
                },
                error: function(){
                    alert("error")
                }
            });
        });
    }); */
</script>
