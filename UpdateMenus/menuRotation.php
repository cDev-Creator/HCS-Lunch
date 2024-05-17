<?php
error_reporting(0);
session_start();
include("../conn.php");
$restaurant = $_SESSION['restaurant'];

$restaurantNamesTable = $conn->query("SELECT ID, restaurantName FROM restaurants ORDER BY ID"); 
if ($restaurantNamesTable->num_rows > 0) {
    while ($row = $restaurantNamesTable->fetch_assoc()) {
        $restaurantNames[] = $row['restaurantName'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // see if a restaurant button is clicked
    foreach ($restaurantNames as $index => $restaurantName) {
        if (isset($_POST['restaurant' . ($index + 1)])) {
            $activeTabValue = $restaurantName; 
            break; 
        }

    }
}

if (empty($activeTabValue) && !empty($restaurantNames)) {
    $activeTabValue = $restaurantNames[0];
}
?>

<script src="https://kit.fontawesome.com/fa7c02709f.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!DOCTYPE html> 
<html> 
<head>
    <link rel="stylesheet" href="../css/officeTables.css">
</head>

<div class="btnsAddNew">
        <button id="backToHome" name="backToHome"><a href="../HomePage/officeStaffAccess.php?p=epBNsTp581Y">Back</a></button>
        <button id="addNewMenuItemBtn"><a href='createMenuItem.php'>New Menu Item</a></button>
</div>

<form action="updateMenu.php" method="post" class="tabs">
    <?php
    // loop through restaurant names to generate submit buttons
    for ($i = 0; $i < count($restaurantNames) && $i < 5; $i++) {
        $isActive = ($restaurantNames[$i] === $activeTabValue) ? 'active' : '';
        echo '<input type="submit" class="tab ' . $isActive . '" name="restaurant' . ($i + 1) . '" value="' . $restaurantNames[$i] . '">';
        echo '<input type="hidden" name="ID"  value="' . $rows['ID'] . '">';
        echo '<button type="submit" name="update" id="updateRestaurantBtn"><i class="fa-solid fa-pencil fa-lg"></i></button>';
    }
    ?>
</form>

<?php

if (isset($_POST['restaurant1'])) {
	$restaurant = '54pizza';
	$_SESSION['restaurant'] = $restaurant;
}

else if (isset($_POST['restaurant2'])) {
	$restaurant = 'chickfila';
	$_SESSION['restaurant'] = $restaurant;
}

else if (isset($_POST['restaurant3'])) {
	$restaurant = 'ritzys';
	$_SESSION['restaurant'] = $restaurant;
}

else if (isset($_POST['restaurant4'])) {
	$restaurant = 'arbys';
	$_SESSION['restaurant'] = $restaurant;
}

else if (isset($_POST['restaurant5'])) {
    $restaurant = 'greatharvest';
	$_SESSION['restaurant'] = $restaurant;
}

else if($restaurant === null){
	$restaurant = '54pizza';
    $_SESSION['restaurant'] = '54pizza';
}
echo $activeRestaurant
?>

<table id="menuItemsTable" align="center"> 
	<tr> 
		<th colspan="7" ><h2 id="menusTitle" >Menu Items <?php echo $activeTabValue ?></h2></th> 
		</tr>
            <th> Item </th> 
            <th> Price </th> 
            <th> Update </th> 
            <th> Delete </th>
		</tr> 

        <?php
		$result = $conn->query("SELECT ID, item, price FROM $restaurant ORDER BY item ASC"); 
		$total = 0;
		?>
		<?php while($rows = $result->fetch_assoc())
		{ 
		?> 
        <form action="updateMenu.php" method="post">
            <td name='item'><?php echo $rows['item']; ?></td>
            <td name='price'><?php echo $rows['price'];?>

        </form>
			<td> 
				<form id="udateMenuForm" action="updateMenu.php" method="post">
				<input type="hidden" name="ID" value="<?php echo $rows['ID'] ?>">
				<button type="submit" id="updateMenuBtn" name="update">
					<i class="fa-solid fa-pencil fa-lg"></i>
				</button> 
				</form>
		    </td>

			<td> 
				<form id="deleteMenuItem" action="deleteMenuItem.php" method="post">
				<input type="hidden" name="ID" value="<?php echo $rows['ID'] ?>">
				<button type="submit" id="deleteMenuItemBtn" name="deleteItem">
					<i class="fa-solid fa-trash-can fa-lg"></i>
				</button> 
				</form>
		    </td>
		</tr>
		
	<?php 
        } 
    ?> 
	</table> 
	<?php 

	// array of restaurant names, remove
	echo "<pre>";
	print_r($restaurantNames);
	echo "</pre>";
	?> 

</body> 
</html>