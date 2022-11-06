<?php
include("../conn.php");
$query = "SELECT grade FROM names";

$username=$_POST['username'];
$password=$_POST['password'];

$stmt = $conn->prepare("SELECT * from loginform where username = ? LIMIT 1");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt_result = $stmt->get_result();
if($stmt_result->num_rows > 0) {
    $data = $stmt_result->fetch_assoc();

    if($data['password'] === $password){
        $_SESSION['user']=$_POST['username'];
        $graduatingGrade = "DELETE FROM names WHERE grade='8th Grade'";
        $eighthGrade = "UPDATE names SET grade='8th Grade' WHERE grade='7th Grade'";
        $seventhGrade = "UPDATE names SET grade='7th Grade' WHERE grade='6th Grade'";
    
        $sixthGrade = "UPDATE names SET grade='6th Grade' WHERE grade='5th Grade'";
        $fifthGrade = "UPDATE names SET grade='5th Grade' WHERE grade='4th Grade'";
        $fourthGrade = "UPDATE names SET grade='4th Grade' WHERE grade='3rd Grade'";
        $thirdGrade = "UPDATE names SET grade='3rd Grade' WHERE grade='2nd Grade'";
        $secondGrade = "UPDATE names SET grade='2nd Grade' WHERE grade='1st Grade'";
    
        $firstGrade = "UPDATE names SET grade='1st Grade' WHERE grade='Kindergarten'";
        $kindergarten = "UPDATE names SET grade='Kindergarten' WHERE grade='03 Day Preschool'";
        $threeDayPk  = "UPDATE names SET grade='03 Day Preschool' WHERE grade='02 Day Preschool'";
    
        mysqli_query($conn, $graduatingGrade);
        mysqli_query($conn, $eighthGrade);
    
        mysqli_query($conn, $seventhGrade);
        mysqli_query($conn, $sixthGrade);
        mysqli_query($conn, $fifthGrade);
    
        mysqli_query($conn, $fourthGrade);
        mysqli_query($conn, $thirdGrade);
        mysqli_query($conn, $secondGrade);
    
        mysqli_query($conn, $firstGrade);
        mysqli_query($conn, $kindergarten);
        mysqli_query($conn, $threeDayPk);
        
        header("location: addNew.php");
    }

}else {
    $message = urlencode("*The username or password you entered is incorrect.");
    header("Location:addNew.php?message=".$message);
    die;
}
?>