<?php
$mysqli = new mysqli('localhost','root','','orders');
$result = $mysqli->query("SELECT grade, name, item, quantity FROM allorders WHERE DATE(dates) = DATE(NOW()) ORDER BY grade, name ASC"); 
?>

<!DOCTYPE html> 

<link rel="stylesheet" href="test.css">
<html> 
	<body> 
        <h1>Lunch Tickets</h1>
	<div id="lunchTickets"> 
		<?php while($rows = $result->fetch_assoc())
		{ 
		?> 
       
        <div class='ticket'><?php echo '</br>', $rows['grade'], '</br>', $rows['name'], '</br>', '</br>', '</br>', '</br>', $rows['item'], ' ── ', $rows['quantity'];?></div>
	<?php 
    
        } 
    ?> 
    </div>
    <input type="button" value="Print Tickets" onClick="window.print()">
	</table> 
	</body> 
	</html>