<?php
include('menus.php')
?>

<?php
$staffID = $_GET['staffID'];
$grade = $_GET['grade'];

echo "<br/>";
echo "<br/>";
echo "Staff ID: ".$staffID; 
echo "<br/>";
echo "Teaching: ".$grade;
echo "<br/>";
echo "<br/>";
?>

<?php
echo "All Students:";
?>

<!-- STUDENTS FROM OTHER CLASSES  -->
<?php
$mysqli = new mysqli('localhost','root','','students');
$resultSet = $mysqli->query("SELECT firstName, lastName, grade FROM names");
?>

<select name="students">
<option value='' selected='selected'>select</option>;
<?php
while($rows = $resultSet->fetch_assoc())
{
    $first_name = $rows['firstName'];
    $last_name = $rows['lastName'];
    $grade = $rows['grade'];
    echo "<option id='allStudents' value='$first_name $last_name $grade'> $first_name $last_name - $grade</option>";
}
?>
</select>
<!-- STUDENTS FROM OTHER CLASSES  -->

<?php

$grade = $_GET['grade'];
echo "Students in ".$grade.":";
?>
<!-- STUDENTS FROM CHOSEN CLASS  -->
<?php
$mysqli = new mysqli('localhost','root','','students');
$resultSet = $mysqli->query("SELECT firstName, lastName, grade FROM names");
$grade = $_GET['grade'];
$result = $mysqli->query("SELECT * FROM names WHERE grade='$grade'");

/* $resultSet = $mysqli->query("SELECT lastName FROM names"); */
?>
<select name="students">
<option value='' selected='selected'>select</option>;
<?php
while($rows = $result->fetch_assoc())
{
    $first_name = $rows['firstName'];
    $last_name = $rows['lastName'];

    echo "<option value='$first_name $last_name'> $first_name $last_name</option>";
    
    /* echo "<option value='$lastName'>$lastName</option>"; */
}

?>
</select>
<!-- STUDENTS FROM CHOSEN CLASS  -->