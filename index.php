<?php
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
    <link rel="stylesheet" href="css/main.css">
    <title>HCS Lunch Testing</title>

</head>

<body>
<div class="top">
<img src="logo.png" class="centerImg" alt="HCS Logo" width="230" height="70">
</div>
</div>
    <div id="loginContainer">
        <h1 id="title">Lunchroom Login</h1>
       
        <form id="loginForm" action="login.php" method="POST">
            <div class="txtField">
                <input type="text" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="txtField">
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <div id="errorMsg"></div>  
            <button type="submit" id="loginsubmit" name="loginsubmit">Login</button>
        </form>  
    </div>
   
 
  
</body>

</html>

<script>
    var errorMsg = "<?php echo $message; ?>";
    document.getElementById("errorMsg").innerHTML = errorMsg;
</script>