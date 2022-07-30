<?php
$mysqli = new mysqli('localhost','root','','menus');
/* $result = $mysqli->query("SELECT grade, name, item, quantity FROM allorders WHERE DATE(dates) = DATE(NOW()) ORDER BY grade, name ASC"); 
 */
/* $result = $mysqli->query("SELECT grade, name, item, quantity, COUNT(*) FROM allorders WHERE DATE(dates) = DATE(NOW()) GROUP BY name ORDER BY grade, name ASC");  
 */

$result = $mysqli->query ("SELECT name,grade, GROUP_CONCAT(item, ' ─ ', quantity SEPARATOR '</br>') AS item FROM allorders GROUP BY name");




?>

<!DOCTYPE html> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="SCSS/main.css">
</head>

<html > 
	<body style="background-color:white;">
	<div id="lunchTickets"> 
		<?php while($rows = $result->fetch_assoc())
		{ 
		?> 
        <div class='ticket'><?php echo '</br>', $rows['grade'],'</br>',  $rows['name'],'</br>', '</br>', '</br>', '</br>', $rows['item'] ?></div>
	<?php 
    } 
    ?> 
    </div>
    <input type="button" id="printTickets" value="Print Tickets" onClick="window.print()">
	</table> 
	</body> 
</html>