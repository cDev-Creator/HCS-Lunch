<?php
if(isset($_GET['message'])){
    $message = $_GET['message'];
    /* echo "<script>alert('$message');</script>"; */
    echo $message;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="scss/main.css">
    <title>Document</title>

</head>

<body>
    <div class="container">
        <h1>HCS Lunch</h1>

        <form action="login.php" method="POST">
        <div>
            <label for="username">username:</label>
            <input type="text" id="username" name="username" required>
        </div>

        <div>
            <label for="password">password:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit" id="submitbtn" name="loginsubmit">Login</button>
        </form>
   

</body>
</html>
