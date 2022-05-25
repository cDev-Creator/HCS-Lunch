<?php
$mysqli = new mysqli('localhost','root','','students');
$resultSet = $mysqli->query("SELECT firstName FROM names");

/* $resultSet = $mysqli->query("SELECT lastName FROM names"); */


?>

<select name="students">
<?php
while($rows = $resultSet->fetch_assoc())
{
    $first_name = $rows['firstName'];
    /* $lastName = $rows['lastName']; */
    echo "<option value='$first_name'>$first_name</option>";
    /* echo "<option value='$lastName'>$lastName</option>"; */
}

?>
</select>




<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Order Lunch</h1>
</body>
</html> -->