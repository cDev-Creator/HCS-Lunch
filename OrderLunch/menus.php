<?php
define('TIMEZONE', 'America/Chicago');
date_default_timezone_set(TIMEZONE);
$mydate=getdate(date("U"));
echo "Date: ";
echo "$mydate[month] $mydate[mday], $mydate[year]";
echo"</br>";
echo "Day of the week : ";
$weekday = "Friday";
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

    <select name="menuItems">
    <option value='' selected='selected'>select</option>;
    <?php
    while($rows = $resultSet->fetch_assoc())
    {
        $item = $rows['item'];
        $price = $rows['price'];
        echo "<option id='menuItems' value='$item'> $item - $price</option>";
    }
    ?>
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
        echo "<option id='menuItems' value='$item'> $item - $price</option>";
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
        echo "<option id='menuItems' value='$item'> $item - $price</option>"; 
    }

    ?>
    </select>
    <?php
    }
    break;

case "Thursday":
    ?>
    <?php
    if($weekday == "Thursday") {
    $mysqli = new mysqli('localhost','root','','menus');
    $resultSet = $mysqli->query("SELECT item, price FROM chickfila");
    ?>

    <select name="menuItems">
    <option value='' selected='selected'>select</option>;
    <?php
    while($rows = $resultSet->fetch_assoc())
    {
        $item = $rows['item'];
        $price = $rows['price'];
        echo "<option id='menuItems' value='$item' >$item - $price</option>";  
    }
    ?>

    </select>
    <?php
    }
    break;

///////////////////////////////// THIS IS THE WORKING DAY/////////////////////////////////
case "Friday":
    ?>
    <?php
    if($weekday == "Friday") {
    $mysqli = new mysqli('localhost','root','','menus');
    $resultSet = $mysqli->query("SELECT item, price FROM greatharvest");
    ?>

    <select name="menuItems" id="menuItems">
    <option value='' selected='selected'>select</option>;
    <?php
    while($rows = $resultSet->fetch_assoc())
    {
        $item = $rows['item'];
        $price = $rows['price'];
        $price * 2;
        echo "<option id='menuItems' value='$item'> $item - $price</option>";

    }
    ?>
    </select>

    <form  onsubmit="populateTable(); return false;">
    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" id="quantity" min="1" max="20" required>

    <button type="submit" id="submitbtn">Ok</button>
    </form>











    <h1>Orders</h1>
    <table border="1" id="orderTable">
        <tr>
            <td>Student Name</td>
            <td>Menu Item</td>
            <td>Quantity</td>
            <td>Price</td>
        </tr>
    </table>

    <?php
 /*    if(isset($_POST['quantity'])); {
        $quantity = $_POST['quantity'];
        echo $quantity;
    } */
    ?>

    <script>
        function populateTable(){
            let table = document.getElementById("orderTable")
            let row = table.insertRow();
            let cell1 = row.insertCell();
            let cell2 = row.insertCell();
            let cell3 = row.insertCell();
            let cell4 = row.insertCell();

            cell1.innerHTML = document.getElementById("students").value;
            cell2.innerHTML = document.getElementById("menuItems").value;
            cell3.innerHTML = document.getElementById("quantity").value;
            /* cell4.innerHTML = document.getElementById("").value; */  
        }
    </script>

    <?php
        }
        break;
    default:
        echo " School is not in session!";
    }
    ?>

