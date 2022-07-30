<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<?php
$mysqli = new mysqli('localhost','root','','menus');
$result = $mysqli->query("SELECT ID, grade, name, item, quantity, price FROM allorders WHERE grade='$grades' AND DATE(dates) = DATE(NOW()) "); 
?>

<!DOCTYPE html> 
<html> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../SCSS/orderTable.css">
</head>
	<body> 

	<table id="classOrderTable"> 
	<thead>
		</tr> 
            <th id="gradeHead"> Grade </th> 
			<th> Name </th> 
			<th> Item </th> 
			<th> Qty </th> 
            <th> Price </th> 
            <th> Total </th> 
			<th id="deleteHead"> Delete </th> 
		</tr> 
	<thead>
		
        <?php $total = 0;?>
		<?php while($rows = $result->fetch_assoc())
		{ 
		?> 

	<tbody>
		<tr>
            <td data-label='grade'><?php echo $rows['grade']; ?></td> 
            <td data-label='name'><?php echo $rows['name']; ?></td> 
            <td data-label='item'><?php echo $rows['item']; ?></td> 
            <td data-label='quantity'><?php echo $rows['quantity']; ?></td> 
            <td data-label='price'><?php echo $rows['price']; ?></td>
            <?php $total = $total + floatval($rows["price"]);?>
            <td data-label='total'><?php echo number_format((float)$total, 2, '.', ''); ?></td>
			<td data-label='delete'> 
				<form id="deleteBtnForm"action="deleteProcess.php" method="post">
				<input type="hidden" name="ID" value="<?php echo $rows['ID'] ?>">
				<button id="deleteStuOrder" type="submit" name="delete">X</button>
				</form>
		    </td>

		</tr> 
          
	<?php 
    
        } 
    ?> 
	</tbody>
	</table> 


	</body> 
	</html>