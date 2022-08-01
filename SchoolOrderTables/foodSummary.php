<?php
   include("../conn.php");
   $result = $conn->query("SELECT item, price FROM $restaurant order by item ASC"); 
?>


<!DOCTYPE html> 
<html> 
	<body> 
	<table id="foodSummaryTable" align="center"> 
	<tr> 
		<th colspan="4" id="foodSumTitle"><h2>Food Summary</h2></th> 
    </tr>

    <tr>
        <td>Food Item</td> 
        <td>Qty</td>  
        <td>Price</td>
        <td>Total</td> 
    </tr>

<?php while($rows = $result->fetch_assoc())
{ 
?> 
<tr id>
    <td><?php echo $rows['item']; ?></td> 
    <td class='td2'></td>
    <td class='td3'><?php echo $rows['price']; ?></td>
    <td class='td4'></td>
</tr> 
         
<?php   
} 
?> 

</table>
</body>
</html>
