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

<!-- STUDENTS FROM OTHER CLASSES  -->
<?php
$mysqli = new mysqli('localhost','root','','students');
$resultSet = $mysqli->query("SELECT firstName, lastName, grade FROM names");
?>

<select name="students" id="allStudents">
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
$result = $mysqli->query("SELECT * FROM names WHERE grade='$grade' order by firstName ASC ");

/* $resultSet = $mysqli->query("SELECT lastName FROM names"); */
?>



<form method="POST" onchange="run()" onsubmit="populateTable(); return false;"> 
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
</select>
<p>Your student is: </p><p id="result2"></p>
<button type="submit" name="submit" id="submitBtn">Submit</button>
</form>

<script>
    function run() {
    document.getElementById("result2")
    .innerHTML = document.getElementById("students").value;
    }




   ////////////////////////////////// NOT WORKING CURRENTLY, COME BACK///////////////////////////
   
/*  function resetPage() {
        let submitBtn = document.getElementById("submitBtn")
        let input = document.querySelector(".input");
        submitBtn.addEventListener('click', ()=> {
            console.log("sas");
            input.value = '';
      
        })
    }
    setTimeout(function() { resetPage(); }, 1000); */


</script>



<!-- STUDENTS FROM CHOSEN CLASS  -->