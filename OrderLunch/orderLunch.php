<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<?php
include('menus.php')
?>

<?php
$staffID = $_POST['staffID'];
$grade = $_POST['grade'];

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
$grade = $_POST['grade'];
?>

<!-- STUDENTS FROM OTHER CLASSES  -->
<?php
$mysqli = new mysqli('localhost','root','','students');
$grade = $_POST['grade'];

/* $result = $mysqli->query("SELECT * FROM names WHERE grade='$grade' ORDER BY grade, firstName ASC"); */
$result = $mysqli->query("SELECT * FROM names ORDER BY grade, firstName ASC"); 
?>

<form name="lunch-form" id="lunch-form" method="POST" onsubmit="populateTable(); return false;"> 

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
<?php
$grade = $_POST['grade'];
echo  $grade. " Students:";
?>

<!-- STUDENTS FROM CHOSEN CLASS  -->
<?php
$mysqli = new mysqli('localhost','root','','students');
$resultSet = $mysqli->query("SELECT firstName, lastName, grade FROM names");
$grade = $_POST['grade'];
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

</select>
<button type="submit" name="submit" id="submitBtn">Submit Test</button>
</form>

<!--AJAX-->
<p id="message"></p>  
 <script>
    $(document).ready(function() {
        $("#lunch-form").submit(function(e) {
            e.preventDefault();
            $.ajax( {
                url: "ordersDB.php",
                method: "post",
                data: $("form").serialize(),
                dataType: "text",
                success: function(strMessage) {
                    $("#message").text(strMessage);
                    $("#lunch-form")[0].reset();
                }
            });
        });
    });
</script>