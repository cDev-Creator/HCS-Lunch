<?php
include("../conn.php");
$result = $conn->query("SELECT ID, item, price FROM 54pizza ORDER BY item ASC"); 
?>
<script src="https://kit.fontawesome.com/fa7c02709f.js" crossorigin="anonymous"></script>
<!DOCTYPE html> 
<html> 
	<head>
        <link rel="stylesheet" href="../css/officeTables.css">
    </head>

	<body> 
    <div class="btnsAddNew">
        <button id="backToHome"><a href="../HomePage/officeStaffAccess.php?p=epBNsTp581Y">Back</a></button>
        <button id="addNewMenuItem"><a href='createMenuItem.php'>New Menu Item</a></button>
    </div>

	<table id="menuItemsTable" align="center"> 
	<tr> 
		<th colspan="7"><h2>Menu Items</h2></th> 
		</tr>
            <th> Item </th> 
            <th> Price </th> 
            <th> Update </th> 
            <th> Delete </th>
		</tr> 
		
        <?php $total = 0;?>
		<?php while($rows = $result->fetch_assoc())
		{ 
		?> 
	
        <form action="updateMenu.php" method="post">
            <td name='item'><?php echo $rows['item']; ?></td>
            <td name='price'><?php echo $rows['price'];?>

        </form>
			<td> 
				<form action="updateMenu.php" method="post">
				<input type="hidden" name="ID" value="<?php echo $rows['ID'] ?>">
				<button type="submit" id="updateMenuBtn" name="update">
					<i class="fa-solid fa-user-pen fa-lg"></i>
				</button> 
				</form>
		    </td>

			<td> 
				<form action="deleteMenuItem.php" method="post">
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