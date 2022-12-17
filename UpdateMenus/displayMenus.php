<?php
session_start();
include("../conn.php");
?>

<script src="https://kit.fontawesome.com/fa7c02709f.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!DOCTYPE html> 
<html> 
<head>
    <link rel="stylesheet" href="../css/officeTables.css">
</head>

<body> 

<div class="btnsAddNew">
        <button id="backToHome"><a href="../HomePage/officeStaffAccess.php?p=epBNsTp581Y">Back</a></button>
        <button id="addNewMenuItemBtn"><a href='createMenuItem.php'>New Menu Item</a></button>
</div>

<form action="" method="post" class="tabs">
	<input type="submit" class="tab" name="restaurant1" value="54 Pizza">
	<input type="submit" class="tab" id="rat" name="restaurant2" value="Chick-fil-A">
	<input type="submit" class="tab" name="restaurant3" value="Ritzy's">
	<input type="submit" class="tab" name="restaurant4" value="Arby's">
	<input type="submit" class="tab" name="restaurant5" value="Great Harvest">
</form>

<?php
if (isset($_POST['restaurant1'])) {
	$restaurant = '54pizza';
}

else if (isset($_POST['restaurant2'])) {
	$restaurant = 'chickfila';
}

else if (isset($_POST['restaurant3'])) {
	$restaurant = 'ritzys';
}

else if (isset($_POST['restaurant4'])) {
	$restaurant = 'arbys';
}

else if (isset($_POST['restaurant5'])) {
    $restaurant = 'greatharvest';
}

else {
	$restaurant = '54pizza';
}

$_SESSION['restaurant'] = $restaurant;
$restaurantTest = $_SESSION['test'];
/* echo $restaurantTest; */

if(!isset($_POST['restaurant1']) && !isset($_POST['restaurant2'])  && !isset($_POST['restaurant3']) 
&& !isset($_POST['restaurant4']) && !isset($_POST['restaurant5'])) {
	$restaurant = $restaurantTest;
}

?>
<table id="menuItemsTable" align="center"> 
	<tr> 
		<th colspan="7" ><h2 id="menusTitle" >Menu Items</h2></th> 
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
</body> 
</html>