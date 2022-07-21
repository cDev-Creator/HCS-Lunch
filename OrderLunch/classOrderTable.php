<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<?php
$mysqli = new mysqli('localhost','root','','orders');
$result = $mysqli->query("SELECT ID, grade, name, item, quantity, price FROM allorders WHERE grade='$grades' AND DATE(dates) = DATE(NOW()) "); 
?>

<!DOCTYPE html> 
<html> 
	<body> 
	<table id="classOrderTable" align="center" border="1px" style="width:600px; line-height:40px;"> 
	<tr> 
		<th colspan="7"><h2>Student Orders</h2></th> 
		</tr> 
            <th> Grade </th> 
			<th> Name </th> 
			<th> Item </th> 
			<th> Quantity </th> 
            <th> Price </th> 
            <th> Total </th> 
			<th> Action </th> 
		</tr> 
		
        <?php $total = 0;?>

		<?php while($rows = $result->fetch_assoc())
		{ 
		?> 


		<tr>
            <td><?php echo $rows['grade']; ?></td> 
            <td><?php echo $rows['name']; ?></td> 
            <td><?php echo $rows['item']; ?></td> 
            <td><?php echo $rows['quantity']; ?></td> 
            <td><?php echo $rows['price']; ?></td>
            <?php $total = $total + floatval($rows["price"]);?>
            <td><?php echo number_format((float)$total, 2, '.', ''); ?></td>
			<td> 
				<form action="deleteProcess.php" method="post">
				<input type="hidden" name="ID" value="<?php echo $rows['ID'] ?>">
				<input type="submit" name="delete" class="btn btn-danger" value="DELETE"> 
				</form>
		    </td>



		</tr> 
       
            
	<?php 
    
        } 
    ?> 
	</table> 


	</body> 
	</html>