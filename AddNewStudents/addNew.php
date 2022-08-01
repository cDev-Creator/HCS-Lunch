<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<div class="btnsAddNew">
    <button id="backToHome"><a href="../HomePage/officeStaffAccess.php?p=epBNsTp581Y">Back</a></button>
    <button id="addNewStudent"><a href='createStudent.php'>Add New</a></button>
</div>

</body>
</html>

<?php include('displayStudents.php') ?>
