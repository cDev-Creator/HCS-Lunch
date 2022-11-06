<?php
include("../conn.php");
$result = $conn->query("SELECT id, firstName, lastName, grade FROM names ORDER BY grade, firstName ASC"); 
?>
<script src="https://kit.fontawesome.com/fa7c02709f.js" crossorigin="anonymous"></script>
<!DOCTYPE html> 
<html> 
	<head>
        <link rel="stylesheet" href="../css/officeTables.css">
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
				<button type="submit" id="updateStudentBtn" name="update">
					<i class="fa-solid fa-user-pen fa-lg"></i>
				</button> 
				</form>
		    </td>

			<td> 
				<form action="deleteStudent.php" method="post">
				<input type="hidden" name="id" value="<?php echo $rows['id'] ?>">
				<button type="submit" id="deleteStudentBtn" name="delete">
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