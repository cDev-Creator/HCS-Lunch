<?php
include('menus.php')
?>

<?php
$staffID = $_GET['staffID'];
$grade = $_GET['grade'];

echo "<br/>";
echo "<br/>";
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

<?php
$grade = $_GET['grade'];
?>

<!-- STUDENTS FROM OTHER CLASSES  -->
<?php
$mysqli = new mysqli('localhost','root','','students');
$grade = $_GET['grade'];

/* $result = $mysqli->query("SELECT * FROM names WHERE grade='$grade' ORDER BY grade, firstName ASC"); */
$result = $mysqli->query("SELECT * FROM names ORDER BY grade, firstName ASC"); 
?>

<form method="POST" onsubmit="populateTable(); return false;"> 
<select name="students" id="allStudents">
<option value='' selected='selected'>select</option>;
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

<button type="submit" name="submit" id="submitBtn">Submit</button>
</form>

<?php
$grade = $_GET['grade'];
echo  $grade. " Students:";
?>

<!-- STUDENTS FROM CHOSEN CLASS  -->
<?php
$mysqli = new mysqli('localhost','root','','students');
$resultSet = $mysqli->query("SELECT firstName, lastName, grade FROM names");
$grade = $_GET['grade'];
$result = $mysqli->query("SELECT * FROM names WHERE grade='$grade' order by firstName ASC ");

?>

<select name="students" id="students">
<option value='' selected='selected'>select</option>;
<?php
while($rows = $result->fetch_assoc())
{
    $first_name = $rows['firstName'];
    $last_name = $rows['lastName'];
    $grade = $rows['grade'];

    echo "<option value='$first_name $last_name~$grade' id='name'> $first_name $last_name</option>";
} 
?>



