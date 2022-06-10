<?php
define('TIMEZONE', 'America/Chicago');
date_default_timezone_set(TIMEZONE);
$mydate=getdate(date("U"));
echo "Date: ";
echo "$mydate[month] $mydate[mday], $mydate[year]";
echo"</br>";
echo "Day of the week : ";
$weekday = "Thursday";
echo $weekday;
echo"</br>";
echo"</br>";

//CLEAN UP REPETITIVE CODE
echo "Menu:";
switch ($weekday) {

case "Monday":
    ?>
    <?php
    if($weekday == "Monday") {
    $mysqli = new mysqli('localhost','root','','menus');
    $resultSet = $mysqli->query("SELECT item, price FROM 54pizza");
    ?>

    <select name="menuItems" onchange="menuPrice(this.value)">
    <option value='' selected='selected'>select</option>;
    <?php
    while($rows = $resultSet->fetch_assoc())
    {
        $item = $rows['item'];
        $price = $rows['price'];
        echo "<option id='menuItems' value='$price'> $item</option>";
    }
    ?>
        <script> 
        const price = document.createElement("p");
        function menuPrice(val) {
            price.innerText = "Price: " + val;
            document.body.appendChild(price);
        }
        price.innerText = '';
    </script>
    </select>
    <?php
    }
    break;

case "Tuesday":
    ?>
    <?php
    if($weekday == "Tuesday") {
    $mysqli = new mysqli('localhost','root','','menus');
    $resultSet = $mysqli->query("SELECT item, price FROM arbys");
    ?>

   <select name="menuItems">
    <?php
    while($rows = $resultSet->fetch_assoc())
    {
        $item = $rows['item'];
        $price = $rows['price'];
        echo "<option id='menuItems' value='$item'> $item</option>";
    }
    ?>
    </select>
    <?php
    }
    break;

case "Wednesday":
    ?>
    <?php
    if($weekday == "Wednesday") {
    $mysqli = new mysqli('localhost','root','','menus');
    $resultSet = $mysqli->query("SELECT item, price FROM ritzys");
    ?>

    <select name="menuItems">
    <?php
    while($rows = $resultSet->fetch_assoc())
    {
        $item = $rows['item'];
        $price = $rows['price'];
        echo "<option id='menuItems' value='$item'> $item</option>"; 
    }

    ?>
    </select>
    <?php
    }
    break;

// THIS IS THE WORKING DAY!!!!!
case "Thursday":
    ?>
    <?php
    if($weekday == "Thursday") {
    $mysqli = new mysqli('localhost','root','','menus');
    $resultSet = $mysqli->query("SELECT item, price FROM chickfila");
    ?>

    <select name="menuItems" onchange="menuPrice(this.value)" >
    <option value='' selected='selected'>select</option>;
    <?php
    while($rows = $resultSet->fetch_assoc())
    {
        $item = $rows['item'];
        $price = $rows['price'];
        
        echo "<option id='menuItems' value='$item' >$item $price</option>";  
    }

    ?>
    <script> 
        const price = document.createElement("p");
        function menuPrice(rat) {
            <?php echo "var rat ='$price';";?>
            console.log(rat);

            price.innerText = "Price: " + rat;
            document.body.appendChild(price);
        }
        price.innerText = '';
    </script>
    </select>
    <?php
    }
    break;

case "Friday":
    ?>
    <?php
    if($weekday == "Friday") {
    $mysqli = new mysqli('localhost','root','','menus');
    $resultSet = $mysqli->query("SELECT item, price FROM greatharvest");
    ?>

    <select name="menuItems" onchange="menuPrice(this.value)" >
    <option value='' selected='selected'>select</option>;
    <?php
    while($rows = $resultSet->fetch_assoc())
    {
        $item = $rows['item'];
        $price = $rows['price'];
        echo "<option id='menuItems' value='$price'> $item</option>";
    }

    ?>
    <script> 
        const price = document.createElement("p");
        function menuPrice(val) {
            price.innerText = "Price: " + val;
            document.body.appendChild(price);
        }
        price.innerText = '';
    </script>
    
    </select>
    <?php
    }
    break;
default:
    echo "School is not in session!";
}

