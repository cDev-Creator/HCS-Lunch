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

    
    <select name="menuItems" id="menuItems" onchange="menuItem(this.value)">
    <option value='' selected='selected'>select</option>;
    <?php
    while($rows = $resultSet->fetch_assoc())
    {
        $item = $rows['item'];
        $price = $rows['price'];
        echo "<option id='menuItems' value='$item'> $item - $price</option>";

    }
    ?>

    <label for="price">Price:</label>
    <input type="number" step="0.01" name="price" id="price" required>

    <label for="quantity">Quantity:</label>
    <input type="number" step="0.01" name="quantity" id="quantity" required>
    <button type="submit" name="submit" id="submitBtn">Submit</button>


</form>

     <script> 
        const name = document.createElement("p");
        name.id = "menu";
        var cat;
        function menuItem(val) {
            name.innerText = val;
            document.body.appendChild(name);
            this.value = name.innerText;

            cat = this.value
            return cat;
        }
        name.innerText = '';
    </script>
    </select>

<?php

if (isset($_POST['price'])){
///////////////////////////////IS THIS NEEDED? TEST TO SEE IF SIMPLE MULTIPLIER WILL WORK/////////////////////////////////////
    $price  = $_POST['price'];
    $quantity = $_POST['quantity'];
    $priceNoCur  = preg_replace( '/&.*?;/', '', $price ); 
    $priceNoCurDot = preg_replace( '/,/', '.', $priceNoCur);  
    $priceFinalDot = floatval($priceNoCurDot) * $quantity;
    echo "Total Cost: ",$priceFinalDot; 
    echo"</br>";
}

else{
    echo '';
}
?>


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
   

</script>


<script>

    function rat() { 
        console.log('rat');
    }

    function populateTable(){
        var totalCost = "<?= $priceFinalDot ?>";
        console.log (totalCost);

        let table = document.getElementById("orderTable")
        let row = table.insertRow();
        let cell1 = row.insertCell();
        let cell2 = row.insertCell();
        let cell3 = row.insertCell();
        let cell4 = row.insertCell();

        cell1.innerHTML = document.getElementById("students").value;
        cell2.innerHTML = document.getElementById("menuItems").value;
        cell3.innerHTML = document.getElementById("quantity").value;
        cell4.innerHTML = totalCost;
    }


    




    </script>

    <?php
        }
        break;
    default:
        echo " School is not in session!";
    }
    ?>

