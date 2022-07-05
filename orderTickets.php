<?php
$mysqli = new mysqli('localhost','root','','orders');

$result = $mysqli->query("SELECT ID, grade, name, item, quantity, price FROM allorders ORDER BY grade,name ASC"); 


?>


<!DOCTYPE html> 
<html> 
	<body> 
	<table align="center" border="1px" style="width:600px; line-height:40px;"> 
	<tr> 
		<th colspan="7"><h2>Student Orders</h2></th> 
		</tr> 
			<th> ID </th> 
            <th> Grade </th> 
			<th> Name </th> 
			<th> Item </th> 
			<th> Quantity </th> 
            <th> Price </th> 
            <th> Total </th> 
		</tr> 
		
        <?php $total = 0;?>
        <?php echo substr_count("Hello world. The world is nice","world"); ?>

		<?php while($rows = $result->fetch_assoc())
		{ 
		?> 
		<tr>
            <td><?php echo $rows['ID']; ?></td> 
            <td><?php echo $rows['grade']; ?></td> 
            <td><?php echo $rows['name']; ?></td> 
            <td><?php echo $rows['item']; ?></td> 
            <td><?php echo $rows['quantity']; ?></td> 
            <td><?php echo $rows['price']; ?></td>

            <?php $total = $total + floatval($rows["price"]);?>
          
           


            <td><?php echo number_format((float)$total, 2, '.', ''); ?></td>
		</tr> 
       
            
	<?php 
    
        } 
    ?> 

	</table> 
	</body> 
	</html>