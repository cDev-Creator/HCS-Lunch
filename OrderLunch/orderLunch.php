<!-- STUDENTS FROM OTHER CLASSES  -->
<?php
$mysqli = new mysqli('localhost','root','','students');
$resultSet = $mysqli->query("SELECT firstName, lastName, grade FROM names");

/* $resultSet = $mysqli->query("SELECT lastName FROM names"); */

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
$result = $mysqli->query("SELECT * FROM names WHERE grade='1st Grade'");


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




