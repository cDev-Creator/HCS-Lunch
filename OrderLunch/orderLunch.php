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
/* $grade = $_POST['grade']; */

/* $result = $mysqli->query("SELECT * FROM names WHERE grade='$grade' ORDER BY grade, firstName ASC"); */
$result = $mysqli->query("SELECT * FROM names ORDER BY grade, firstName ASC"); 

?>

<form name="lunch-form" id="lunch-form" method="POST" onsubmit="populateTable(); return false;"> 

<select name="students" id="allStudents">
<option value='' selected='selected'>--All Students--</option>;


<?php
while($rows = $result->fetch_assoc())
{
    $first_name = $rows['firstName'];
    $last_name = $rows['lastName'];
    $grade = $rows['grade'];
    echo "<option id='allStudents' value='$first_name $last_name~$grade'> $first_name $last_name - $grade</option>"; 
}

?>
</select>

<!-- STUDENTS FROM CHOSEN CLASS  -->
<?php

$mysqli = new mysqli('localhost','root','','students');
$resultSet = $mysqli->query("SELECT firstName, lastName, grade FROM names");
/* $grade = $_POST['grade']; */


$result = $mysqli->query("SELECT * FROM names WHERE grade='$grades' order by firstName ASC ");

?>
<select name="students" id="students">
<option value='' selected='selected'><?php echo'--'.$grades,' Students--'?></option>;
<?php
while($rows = $result->fetch_assoc())
{
    $first_name = $rows['firstName'];
    $last_name = $rows['lastName'];
    $grade = $rows['grade'];

    echo "<option value='$first_name $last_name~$grade' id='name'> $first_name $last_name</option>";
} 
?>

</select>

<br>
<br>

<button type="submit" name="submit" id="submitBtn">Submit Test</button>
</form>


<!--AJAX-->

<?php
require('menus.php');
require('classOrderTable.php');
?>

 <script>
    $(document).ready(function() {
 
        
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
                }
            });
        });
    });
</script>