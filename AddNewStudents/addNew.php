<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location:../index.php");
}	
if(isset($_GET['message'])){
    $message = $_GET['message'];
}
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
<div class="btnsAddNew">
    <button id="backToHome"><a href="../HomePage/officeStaffAccess.php?p=epBNsTp581Y">Back</a></button>
    <button id="addNewStudent"><a href='createStudent.php'>Add New</a></button>
    <button id="graduate">Graduation</a></button>
</div>

<div class="modal-bg">
            <!-- <form method='POST' action="OrderLunch/orderLunch.php" id="form" class="modal-content"> -->
        <form method='POST' action="graduationSubmit.php" id="form" class="modal-content">
            <div class="closeBtn" id="closeBtn"><i class="fa-solid fa-xmark fa-lg"></i></div>
        
            <div>
                <h4>Please enter your credentials: </h4>
            </div>
            <div>
                <input type="text" id="username" name="username" placeholder="Username" required>
            </div>
             
            <div>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>

            <div id="errorMsg"></div>  

            <div>
                <button type="submit" id="submitGraduation" name="submit">Graduation</button>
            </div>

        </form>
    </div>  
</body>
</html>

<?php include('displayStudents.php') ?>

<script src="graduationModal.js"></script>  

<script>
    var errorMsg = "<?php echo $message; ?>";
    document.getElementById("errorMsg").innerHTML = errorMsg;
</script>