<?php
$staffID = $_GET['staffID'];
$grade = $_GET['grade'];

echo "Staff ID: ".$staffID; 
echo "<br/>";
echo "Teaching: ".$grade;
?>


<!-- STUDENTS FROM OTHER CLASSES  -->
<?php
$mysqli = new mysqli('localhost','root','','students');
$resultSet = $mysqli->query("SELECT firstName, lastName, grade FROM names");
?>

<select name="students">
<?php
while($rows = $resultSet->fetch_assoc())
{
    $first_name = $rows['firstName'];
    $last_name = $rows['lastName'];
    $grade = $rows['grade'];

    echo "<option value='$first_name $last_name $grade'> $first_name $last_name $grade</option>";
    
    /* echo "<option value='$lastName'>$lastName</option>"; */
}

?>
</select>
<!-- STUDENTS FROM OTHER CLASSES  -->


<?php
$mysqli = new mysqli('localhost','root','','students');
$resultSet = $mysqli->query("SELECT firstName, lastName, grade FROM names");
$grade = $_GET['grade'];
$result = $mysqli->query("SELECT * FROM names WHERE grade='$grade'");

/* $resultSet = $mysqli->query("SELECT lastName FROM names"); */
?>

<select name="students">
<?php
while($rows = $result->fetch_assoc())
{
    $first_name = $rows['firstName'];
    $last_name = $rows['lastName'];
    $grade = $rows['grade'];

    echo "<option value='$first_name $last_name $grade'> $first_name $last_name $grade</option>";
    
    /* echo "<option value='$lastName'>$lastName</option>"; */
}

?>
</select>