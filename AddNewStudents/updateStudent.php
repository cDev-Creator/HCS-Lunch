<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Update Student Information</title>
    <link rel="stylesheet" href="../css/officeTables.css">

</head>
<body>
    <?php
    include("../conn.php");
    $id = $_POST['id'];
    $query = "SELECT * FROM names WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        while($row = mysqli_fetch_array($query_run))
        {
            ?>   
            <form id="updateStudent" action="" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
            <div class="form-group">
         
            <input type="text" name="firstName" placeholder="First Name" value="<?php echo $row['firstName'] ?>" required>
            <input type="text" name="lastName" placeholder="Last Name" value="<?php echo $row['lastName'] ?>"  required>
                  
            <select name="grade" required>
            <option value='' selected='selected'>--Grade--</option>;
            <option value="Office Staff">Office Staff</option>
            <option value="02 Day Preschool">2 Day Preschool</option>
            <option value="03 Day Preschool">3 Day Preschool</option>
            <option value="1st Grade">1st Grade</option> 
            <option value="2nd Grade">2nd Grade</option>  
            <option value="3rd Grade">3rd Grade</option>  
            <option value="4th Grade">4th Grade</option>  
            <option value="5th Grade">5th Grade</option>  
            <option value="6th Grade">6th Grade</option>  
            <option value="7th Grade">7th Grade</option>  
            <option value="8th Grade">8th Grade</option>     
            </select>
       
            <button id="updateData" type="submit" name="updates"> Update</button>
            <button id="cancelBtn"><a href="addNew.php">Cancel</a></button>
            </form>

            <?php
                if(isset($_POST['updates']))
                {
                    $firstName = $_POST['firstName'];
                    $lastName = $_POST['lastName'];
                    $grade = $_POST['grade'];

                    $query = "UPDATE names SET firstName='$firstName', lastName='$lastName', grade='$grade' WHERE id='$id' ORDER BY grade, firstName";
                    $query_run = mysqli_query($conn, $query);
                    if($query_run)
                    {
                        header("location:addNew.php");
                        echo '<script> alert("Data Updated"); </script>';
                    }
                    else
                    {
                        echo '<script> alert("Data Not Updated"); </script>';
                    }
                }
                ?>
            <?php
        }
    }
    else
    {
        echo '<script> alert("No Record Found"); </script>';
    }