<?php 
session_start();
$username=$_POST['username'];
$password=$_POST['password'];

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
            header("location: officeStaffAccess.php");
            $_SESSION['user']=$_POST['username'];

        } else {
            $message = urlencode("Invalid Password");
            header("Location:index.php?message=".$message);
            die;
        }
        } elseif($status === 0) {
            if($data['password'] === $password){
                header("location: teacherAccess.php");
                $_SESSION['user']=$_POST['username'];
    
            } else {
                $message = urlencode("Invalid Password");
                header("Location:index.php?message=".$message);
                die;
            }
        }
    }else {
        $message = urlencode("Invalid Username or Password");
        header("Location:index.php?message=".$message);
        die;
    }
}
?>