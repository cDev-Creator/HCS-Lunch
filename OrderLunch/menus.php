<?php
include('menuPrice.php');
$grade = $_GET['grade'];
echo "Grade: ".$grade;
echo "<br>"
?>

<script>
    var gradeVar = <?php echo json_encode($grade); ?>;
    window.onload = function() {
        localStorage.setItem("gradeVar",gradeVar);
    }

</script>


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
?>
    
    <?php 
    $mysqli = new mysqli('localhost','root','','menus');
     ////////////////////////// GO BACK AND MAKE ARRAY DYNAMICALLY CREATED INSTEAD OF HARD CODED/////////////////////////////////////////
    $restaurants = array("54pizza", "arbys", "ritzys", "chickfila", "greatharvest");

    
    if($weekday == 'Monday' ){
        $restaurant = $restaurants[0];
    }
    else if($weekday == 'Tuesday' ){
        $restaurant = $restaurants[1];
    }
    else if($weekday == 'Wednesday' ){
        $restaurant = $restaurants[2];
    }
    else if($weekday == 'Thursday' ){
        $restaurant = $restaurants[3];
    }
    else if($weekday == 'Friday' ){
        $restaurant = $restaurants[4];
    }
    else {
        echo "School is not in session!";
    }
    
    $resultSet = $mysqli->query("SELECT item, price FROM $restaurant order by item ASC");

    ?>

    <form method="POST"> 
    <select name="menuItems" id="menuItems" class="dropdown_change">
    <option value='' selected='selected'>select</option>;

    <?php
    while($rows = $resultSet->fetch_assoc())
    {
        $item = $rows['item'];
        $price = $rows['price'];

        echo "<option id='menuSelection' class='menuSelection' value='$item~$price'> $item - $price</option>";  

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

    <input type="text" name="menuItem1" id="menuItem1" hidden required/>
    <input type="text" name="menuItem2" id="menuItem2" hidden required/>
    <input type="text" name="menuItem3" id="menuItem3" hidden required/>
    <input type="text" name="menuItem4" id="menuItem4" hidden required/>
    <input type="text" name="menuItem5" id="menuItem5" hidden required/>
    <input type="text" name="menuItem6" id="menuItem6" hidden required/>
    <input type="text" name="menuItem7" id="menuItem7" hidden required/>
    <input type="text" name="menuItem8" id="menuItem8" hidden required/>

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

  
        var menuItem = item.toString();
        for(var count = 0; count < quantity; count++){
         menuItem = item.toString();
           /*  console.log(menuItem); */
            menuItemsArr.push(menuItem);
        }


       ///////////////////////////*  NOT WORKING YET BUT RIGHT START FOR DELETE *//////////////////////
        document.getElementById('delete').addEventListener("click", function() {
            let rats = cell4.innerHTML-cell4.innerHTML;
            console.log(rats);
        });






 /*        console.log("Ordered Items:");
        console.log(menuItemsArr); */
       
        let menuItemsDropdown = document.querySelectorAll(".menuSelection");
        let dayOfWeekMenu = []
        for (let i=0, element; element = menuItemsDropdown[i]; i++) {
            let menuItems = element.value;
            menuItems = menuItems.split("~",1);
            menuItems = menuItems.toString();
            dayOfWeekMenu.push(menuItems);
        }
/*         console.log("Day of week menu:");
        console.log(dayOfWeekMenu); */
      
        function getOccurrence(array, value) {
        return array.filter((v) => (v === value)).length;
        }

        console.log(`${dayOfWeekMenu[0]}`, getOccurrence(menuItemsArr, dayOfWeekMenu[0]));
        console.log(`${dayOfWeekMenu[1]}`, getOccurrence(menuItemsArr, dayOfWeekMenu[1]));   
        console.log(`${dayOfWeekMenu[2]}`, getOccurrence(menuItemsArr, dayOfWeekMenu[2]));   
        console.log(`${dayOfWeekMenu[3]}`,getOccurrence(menuItemsArr, dayOfWeekMenu[3]));   
        console.log(`${dayOfWeekMenu[4]}`,getOccurrence(menuItemsArr, dayOfWeekMenu[4]));   
        console.log(`${dayOfWeekMenu[5]}`,getOccurrence(menuItemsArr, dayOfWeekMenu[5]));   
        console.log(`${dayOfWeekMenu[6]}`,getOccurrence(menuItemsArr, dayOfWeekMenu[6]));   
        console.log(`${dayOfWeekMenu[7]}`,getOccurrence(menuItemsArr, dayOfWeekMenu[7]));  
        
        let menuItem1 = getOccurrence(menuItemsArr, dayOfWeekMenu[0])
        let menuItem2 = getOccurrence(menuItemsArr, dayOfWeekMenu[1])
        let menuItem3 = getOccurrence(menuItemsArr, dayOfWeekMenu[2])
        let menuItem4 = getOccurrence(menuItemsArr, dayOfWeekMenu[3])
        let menuItem5 = getOccurrence(menuItemsArr, dayOfWeekMenu[4])
        let menuItem6 = getOccurrence(menuItemsArr, dayOfWeekMenu[5])
        let menuItem7 = getOccurrence(menuItemsArr, dayOfWeekMenu[6])
        let menuItem8 = getOccurrence(menuItemsArr, dayOfWeekMenu[7])

        document.getElementById("menuItem1").value = menuItem1;
        document.getElementById("menuItem2").value = menuItem2;
        document.getElementById("menuItem3").value = menuItem3;
        document.getElementById("menuItem4").value = menuItem4;
        document.getElementById("menuItem5").value = menuItem5;
        document.getElementById("menuItem6").value = menuItem6;
        document.getElementById("menuItem7").value = menuItem7;
        document.getElementById("menuItem8").value = menuItem8;

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

   