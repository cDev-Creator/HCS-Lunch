<?php
$mysqli = new mysqli('localhost','root','','menus');
$result = $mysqli->query("SELECT id, firstName, lastName, grade FROM names ORDER BY grade, firstName ASC"); 


?>

<!DOCTYPE html> 
<html> 
	<head>
        <link rel="stylesheet" href="../SCSS/officeTables.css">
    </head>

	<body> 
	<table id="allStudentsTable" align="center"> 
	<tr> 
		<th colspan="7"><h2>Students and Staff</h2></th> 
		</tr>
            <th> Grade </th> 
            <th> Name </th> 
            <th> Update </th> 
            <th> Delete </th>
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
				<input type="submit" id="updateStudentBtn" name="update" value="update"> 
				</form>
		    </td>

			<td> 
				<form action="deleteStudent.php" method="post">
				<input type="hidden" name="id" value="<?php echo $rows['id'] ?>">
				<input type="submit" id="deleteStudentBtn" name="delete" value="X"> 
				</form>
		    </td>

		</tr> 
          
	<?php 
    
        } 
    ?> 
	</table> 


	</body> 
	</html>