<?php
include('menuPrice.php')
?>


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
    <form method="POST"> 
    <select name="menuItems" id="menuItems" onchange="menuItem(this.value)" class="dropdown_change">
    <option value='' selected='selected'>select</option>;

    <?php
    while($rows = $resultSet->fetch_assoc())
    {
        $item = $rows['item'];
        $price = $rows['price'];
        echo "<option id='menuSelection' value='$item~$price'> $item - $price</option>";  
        
    }
    ?>
    
    <label for="quantity">Quantity:</label>
    <input type="number" step="0.01" name="quantity" id="quantity" required>
   
    </form>

    <!-------------------- ONLY CALLED FOR TESTING NOT CRUCIAL TO PROGRAM (ONCHANGE) ----------------->

     <script> 
        const name = document.createElement("p");
        function menuItem(val) {
            name.innerText = val;
            document.body.appendChild(name);
            this.value = name.innerText;

            var item = this.value;
            var itemToal = item.split("~",1);
            console.log(itemToal);


            var dead = item.split('~')[1];
            console.log(dead);
        
            return item;
        }
        name.innerText = '';
    </script>
    </select>

    <h1>Orders</h1>
    <table border="1" id="orderTable">
        <tr>
            <td>Student Name</td>
            <td>Menu Item</td>
            <td>Quantity</td>
            <td>Price</td>
        </tr>
    </table>

<script>
   
    function populateTable(){
 
        let table = document.getElementById("orderTable")
        let row = table.insertRow();
        let cell1 = row.insertCell();
        let cell2 = row.insertCell();
        let cell3 = row.insertCell();
        let cell4 = row.insertCell();

        cell1.innerHTML = document.getElementById("students").value;

        var menuItemValue = document.getElementById("menuItems").value;
        var item = menuItemValue.split("~",1);
        cell2.innerHTML = item;

        cell3.innerHTML = document.getElementById("quantity").value;


        var quantity = document.getElementById("quantity").value;

        var price = menuItemValue.split('~')[1];
        var totalCost = price * quantity;
        let totalCostDecimal = totalCost.toFixed(2);

        cell4.innerHTML = totalCostDecimal;
    }

    </script>

    <?php
        }
        break;
    default:
        echo " School is not in session!";
    }
    ?>
