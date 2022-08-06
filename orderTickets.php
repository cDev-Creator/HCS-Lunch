<?php
session_start();
include("conn.php");
define('TIMEZONE', 'America/Chicago');
date_default_timezone_set(TIMEZONE);

$date = date("Y-m-d"); 
$result = $conn->query ("SELECT name,grade, GROUP_CONCAT(item, ' — ', quantity SEPARATOR '</br>') AS item 
FROM allorders WHERE dates = '$date' GROUP BY name");
if(!isset($_SESSION['user'])){
    header("Location:index.php");
}
?>

<!DOCTYPE html> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
</head>

<html > 
	<body style="background-color:white;">
	<div id="lunchTickets"> 
		<?php while($rows = $result->fetch_assoc())
		{ 
		?> 
        <div class='ticket'><?php echo '</br>','<b>', $rows['grade'],'</br>',  $rows['name'],'</b>', '</br>', '</br>', '</br>', '<div id="orderedItem">', $rows['item'], "</div>" ?></div>
	<?php 
    } 
    ?> 
    </div>
    <input type="button" id="printTickets" value="Print Tickets" onClick="window.print()">
	</table> 
	</body> 
</html>