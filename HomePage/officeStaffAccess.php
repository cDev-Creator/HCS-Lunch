<?php
session_start();
if(isset($_GET['p'])){
    $p = $_GET['p'];
}

if(!isset($_SESSION['user'])){
   header("Location:../index.php");
}

unset($_SESSION['restaurant']);

?>
<script src="https://kit.fontawesome.com/fa7c02709f.js" crossorigin="anonymous"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>


<div class="container">
<div class="options">
    <button id="orderLunchBtn" class="mainBtns"><h2>Order Lunch</a></h2></body>
    <button class="mainBtns"><h2><a href="../SchoolOrderTables/schoolOrders.php">School Orders</a></h2></button> 
    <button class="mainBtns"><h2><a href="../orderTickets.php">Lunch Tickets</a></h2></button>
    <button class="mainBtns"><h2><a href="../AddNewStudents/addNew.php">Students / Staff</a></h2></button>
    <button class="mainBtns"><h2><a href="../UpdateMenus/menuRotation.php">Update Menus</a></h2></button>
    <button class="logout"><h2><a href="../OrderLunch/logout.php">
    <i class="fa-solid fa-right-from-bracket fa-xl"></i>
    </a><h2>
    </button>
 
</div>
</div>

    <div class="modal-bg">
            <!-- <form method='POST' action="OrderLunch/orderLunch.php" id="form" class="modal-content"> -->
        <form method='POST' action="../OrderLunch/orderLunch.php?p=<?php echo $p?>" id="form" class="modal-content">

            <div class="closeBtn" id="closeBtn"><i class="fa-solid fa-xmark fa-lg"></i></div>
        
            <div>
    
                <select name="grade" id="grade" class="dropdown" required>
                    <option value="" selected="selected">--Select Class--</option>  
                    <option value="Office Staff">Office Staff</option> 
                    <option value="Office Ordering">Office Ordering</option>  
                    <option value="02 Day Preschool">2 Day Preschool</option>
                    <option value="03 Day Preschool">3 Day Preschool</option>
                    <option value="Kindergarten">Kindergarten</option>
                    <option value="1st Grade">1st Grade</option> 
                    <option value="2nd Grade">2nd Grade</option>  
                    <option value="3rd Grade">3rd Grade</option>  
                    <option value="4th Grade">4th Grade</option>  
                    <option value="5th Grade">5th Grade</option>  
                    <option value="6th Grade">6th Grade</option>  
                    <option value="7th Grade">7th Grade</option>  
                    <option value="8th Grade">8th Grade</option>  
                </select>
            </div>

            <div>
                <button type="submit" id="submitGradeBtn" name="submit">Submit</button>
            </div>

        </form>
    </div>  
  
</body>
</html>
<script src="../HomePage/modal.js"></script>   