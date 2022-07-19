
<?php
define('TIMEZONE', 'America/Chicago');
date_default_timezone_set(TIMEZONE);
$mydate=getdate(date("U"));

/* $weekday = "$mydate[weekday]"; */
$weekday = "Friday";


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
        echo 'School is not in session!';
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
    </select>
    <h1>Orders</h1>

    <form method="post" name="order-table-form" id="orderTableForm" method="POST">
    <!-------------------- USE HIDDEN TO GET VALUES ----------------->
    <input type="text" name="classTotal" id="classTotal" hidden required/>

    <input type="text" name="grades" id="grades" hidden required/>
    <input type="text" name="names" id="names" hidden required/>
    <input type="text" name="items" id="items" hidden required/>
    <input type="text" name="quantities" id="quantities" hidden required/>
    <input type="text" name="prices" id="prices" hidden required/>
    
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
 
    </form>


<script>
    let restaurants = "<?php echo $restaurant?>";
    console.log(restaurants);
    document.getElementById("restaurants").value = restaurants;
</script>   

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
  


        cell4.innerHTML = document.getElementById("quantity").value;

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



       
        let menuItemsDropdown = document.querySelectorAll(".menuSelection");
        let dayOfWeekMenu = []
        for (let i=0, element; element = menuItemsDropdown[i]; i++) {
            let menuItems = element.value;
            menuItems = menuItems.split("~",1);
            menuItems = menuItems.toString();
            dayOfWeekMenu.push(menuItems);
        }













        let grades = cell1.innerHTML;
        document.getElementById("grades").value = grades;

        let names = cell2.innerHTML;
        document.getElementById("names").value = names;

        let items = cell3.innerHTML;
        document.getElementById("items").value = items;

        let quantities = cell4.innerHTML;
        document.getElementById("quantities").value = quantities;

        let prices = cell5.innerHTML;
        document.getElementById("prices").value = prices;
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