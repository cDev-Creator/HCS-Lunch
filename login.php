<?php 
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
$rat ='rat';
$conn = new mysqli('localhost','root','','menus');
if($conn->connect_error){
    die("Error connecting : ".$conn->connect_error);
} else {
    $stmt = $conn->prepare("select * from loginform where username = ? LIMIT 1");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        $status = $data['status'];

        if ($status === 1) {
        if($data['password'] === $password){
            $_SESSION['user']=$_POST['username'];
            $p = urlencode("epBNnTp581Y");
            header("location: officeStaffAccess.php?p=".$p);
           /*  $message = urlencode("Welcome back " .$_POST['username']);
            header("location: officeStaffAccess.php?message=".$message); */

        } else {
            $message = urlencode("*The password you entered is incorrect.");
            header("Location:index.php?message=".$message);
            die;
        }
        } elseif($status === 0) {
            if($data['password'] === $password){
                $p = urlencode("nHb8fN6m6mY");
                header("location: teacherAccess.php?p=".$p);
                $_SESSION['user']=$_POST['username'];
    
            } else {
                $message = urlencode("*The password you entered is incorrect.");
                header("Location:index.php?message=".$message);
                die;
            }
        }
    }else {
        $message = urlencode("*The username or password you entered is incorrect.");
        header("Location:index.php?message=".$message);
        die;
    }
}
?>