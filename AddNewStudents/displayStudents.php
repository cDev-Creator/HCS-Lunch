<?php
$mysqli = new mysqli('localhost','root','','students');
$result = $mysqli->query("SELECT id, firstName, lastName, grade FROM names ORDER BY grade, firstName ASC"); 
?>

<!DOCTYPE html> 
<html> 
	<body> 
	<table id="s" align="center" border="1px" style="width:600px; line-height:40px;"> 
	<tr> 
		<th colspan="7"><h2>Students</h2></th> 
		</tr>
            <th> Grade </th> 
            <th> Name </th> 
            <th> Update </th> 
            <th> Edit </th>
		</tr> 
		
        <?php $total = 0;?>
		<?php while($rows = $result->fetch_assoc())
		{ 
		?> 

		
        <form action="updateStudent.php" method="post">
            <td name='grade'><?php echo $rows['grade']; ?></td> 
            <td><?php echo $rows['firstName']." ".$rows['lastName']; ?>
        </form>
      
        
			<td> 
				<form action="updateStudent.php" method="post">
				<input type="hidden" name="id" value="<?php echo $rows['id'] ?>">
				<input type="submit" name="update" value="update"> 
				</form>
		    </td>

			<td> 
				<form action="deleteStudent.php" method="post">
				<input type="hidden" name="id" value="<?php echo $rows['id'] ?>">
				<input type="submit" name="delete" value="DELETE"> 
				</form>
		    </td>

		</tr> 
          
	<?php 
    
        } 
    ?> 
	</table> 


	</body> 
	</html>