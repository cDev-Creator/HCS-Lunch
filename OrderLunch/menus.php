<?php
/* include('menuPrice.php'); */
?>


<?php
define('TIMEZONE', 'America/Chicago');
date_default_timezone_set(TIMEZONE);
$mydate=getdate(date("U"));
echo "Date: ";
echo "$mydate[month] $mydate[mday], $mydate[year]";
echo"</br>";
echo "Day of the week : ";
/* $weekday = "$mydate[weekday]"; */
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
    $resultSet = $mysqli->query("SELECT item, ID, price FROM greatharvest order by item ASC");
    ?>
    <form method="POST"> 
    <select name="menuItems" id="menuItems" class="dropdown_change">
    <option value='' selected='selected'>select</option>;

    <?php
    while($rows = $resultSet->fetch_assoc())
    {
        $item = $rows['item'];
        $price = $rows['price'];
        $ID = $rows['ID'];

        echo "<option id='menuSelection' value='$item~$price'> $item - $price - $ID</option>";  

    }
    ?>
    
    <input type="number" name="quantity" id="quantity" placeholder="Quantity" required/>
    </form>

    <!-------------------- ONLY CALLED FOR TESTING NOT CRUCIAL TO PROGRAM (ONCHANGE) ----------------->

    </select>
    <h1>Orders</h1>

    <form method="post" name="order-table-form" id="orderTableForm" method="GET" action="orderForm.php">

       <!-------------------- USE HIDDEN TO GET VALUES ----------------->
    <input type="text" name="classTotal" id="classTotal" hidden required/>

    <table border="1" id="orderTable">
        <tr>
            <td>Grade</td>
            <td>Student Name</td>
            <td>Menu Item</td>
            <td>Quantity</td>
            <td>Price</td>
            <td>Total Cash</td>
        </tr>
    </table>
 
    <button type="submit" name="submit" id="submitMainTable">Submit</button>
    </form>

   

<script>

let menuItemsArr = [];

    function populateTable(){
        let table = document.getElementById("orderTable")
        let row = table.insertRow();
        let cell1 = row.insertCell();
        let cell2 = row.insertCell();
        let cell3 = row.insertCell();
        let cell4 = row.insertCell();
        let cell5 = row.insertCell();
        let cell6 = row.insertCell();
        let cell7 = row.insertCell();

        let gradeStudents = document.getElementById("students");
        let allStudents = document.getElementById("allStudents");
       
        if(gradeStudents.value == '') {
            let grade = allStudents.value;
            grade = grade.split('~')[1];
            cell1.innerHTML = grade;

            let student = allStudents.value;
            student = student.split("~",1);
            cell2.innerHTML = student;
        }

        else if(allStudents.value == '') {
            let grade = gradeStudents.value;
            grade = grade.split('~')[1];
            cell1.innerHTML = grade;

            let student = gradeStudents.value;
            student = student.split("~",1);
            cell2.innerHTML = student;
        }

        else if(allStudents.value !== '' && allStudents.value !== '') {
            alert("Please only select one student.")
        }
        
        let menuItemValue = document.getElementById("menuItems").value;
        let item = menuItemValue.split("~",1);
        cell3.innerHTML = item;
        cell3.classList.add("orderedItem")

        if(item == "Tomato soup"){
            console.log("rat")

        
        }


    

        cell4.innerHTML = document.getElementById("quantity").value;

        cell4.classList.add("itemQuantity");
        let quantity = document.getElementById("quantity").value;   

        let price = menuItemValue.split('~')[1];
        let totalCost = price * quantity;
        let totalCostDecimal = totalCost.toFixed(2);
       
        cell5.innerHTML = totalCostDecimal;


        table = document.getElementById("orderTable"), cost = 0;
        for(var i = 1; i < table.rows.length; i++)
            {
                cost = cost + parseFloat(table.rows[i].cells[4].innerHTML);
            }    
        let classCostDecimal = cost.toFixed(2)
        cell6.innerHTML = classCostDecimal;

        document.getElementById("classTotal").value = classCostDecimal;
        
        cell7.innerHTML = `<a id='delete' onClick="onDelete(this)">Delete</a>`;

  
        for(var count = 0; count < quantity; count++){
            var menuItem = item.toString();
            menuItemsArr.push(menuItem);
        }
        console.log(menuItemsArr);


        function getOccurrence(array, value) {
        return array.filter((v) => (v === value)).length;
        }
        console.log(getOccurrence(menuItemsArr, 'Turkey Cobb'));   
    }
      
    
   
    </script>

    <!----------------------------------------- DELETE CLASS AND INDIVIDUAL ORDER -------------------------------------->
    <button id="clearClassOrder">Clear All</button>
    <script>
        let table = document.getElementById("orderTable")
        let clearBtn = document.getElementById("clearClassOrder")
        .addEventListener('click', function() { 
            if (confirm('Are you sure you want to clear all orders?')) {
                for(var i = 1;i<table.rows.length;){table.deleteRow(i);}
            }
        });

        function onDelete(td) {
        if (confirm('Are you sure you want to delete this order?')) {
        row = td.parentElement.parentElement;
        document.getElementById("orderTable").deleteRow(row.rowIndex);

    }
} 
    </script>

    <style>
        #delete {
            color: red;
            cursor: pointer;
        }
        tr:nth-child(even),table.list thead>tr { background-color: #dddddd; }
    </style>

    <?php
        }
        break;
    default:
        echo " School is not in session!";
    }
    ?>
<!-----------------------------------------SHOW HTML TABLE DATA-------------------------------------->

<?php
include('menuPrice.php');
?>