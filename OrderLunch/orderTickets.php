<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


<?php
$mysqli = new mysqli('localhost','root','','orders');

echo $grades;
echo '<br>';
echo $staffID;

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

			<!-- <td><a href="deleteProcess.php?userid=<?php /* echo $row["ID"]; */ ?>">Delete</a></td> -->

		<!-- 	<button type="submit" name="deletedata" class="btn btn-primary">Delete</button> -->
		</tr> 
       
            
	<?php 
    
        } 
    ?> 

	</table> 
	</body> 
	</html>