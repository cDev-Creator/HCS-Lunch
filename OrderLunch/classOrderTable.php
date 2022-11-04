
<?php
include("../conn.php");

session_start();
if(isset($_SESSION['test'])){
    $addedfrom = $_SESSION['test'];
}

if(isset($_GET['p'])){
    $p = $_GET['p'];
}
$pSession = $_SESSION['p'] = $p;

$grades = $_SESSION["grade"] = $_POST['grade'] ?? $_SESSION["grade"];
$date = date("Y-m-d"); 
$resultTeacher = $conn->query("SELECT ID, grade, name, item, quantity, dates, price, inserted FROM allorders WHERE grade = '$grades' AND dates = '$date'"); 
$resultOffice = $conn->query("SELECT ID, grade, name, item, quantity, dates, price, inserted FROM allorders WHERE inserted = 1 AND dates = '$date'"); 
?>

<!DOCTYPE html> 
<html> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<script src="https://kit.fontawesome.com/fa7c02709f.js" crossorigin="anonymous"></script>
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
		<?php 

		function test($result) {
			while($rows = $result->fetch_assoc())
			{ 
			echo '<tr id="'.(($rows['inserted'] == 1) ? 'addedFromOtherClass' : 'addedFromSameClass'). '">'.$row['inserted'].''
			?>
				<td data-label='grade' id="gradess"><?php echo $rows['grade']; ?></td> 
	
				<td data-label='name'><?php echo $rows['name']; ?></td> 
				<td data-label='item'><?php echo $rows['item']; ?></td> 
				<td data-label='quantity'><?php echo $rows['quantity']; ?></td> 
				<td data-label='price'><?php echo '$',$rows['price']; ?></td>
				<?php $total = $total + floatval($rows["price"]);?>
				<td data-label='total'><?php echo '$',number_format((float)$total, 2, '.', ''); ?></td>
				<td data-label='delete' id="deleteOrderLabel"> 
					<form id="deleteBtnForm" action="deleteProcess.php" method="post">
					<input type="hidden" name="ID" value="<?php echo $rows['ID'] ?>">
					<button id="deleteStuOrder" type="submit" name="delete">
					<i class="fa-solid fa-trash-can fa-lg"></i>
					</button>
					</form>
				</td>
			</tr> 


		<?php 
		} 
	}






	if($addedfrom == 1 && $grades == "Office Staff"){
		test($resultOffice);
		test($resultTeacher);
		?>
		<script type="text/javascript">
		function run(){
			var element = document.getElementById("addedFromOtherClass");
			element.removeAttribute('id');
		}

	<?php
		echo "run();";
	?>
	</script>
	<?php
			
	}
	else{
		test($resultTeacher);
	}
	?> 


</tbody>
</table>

</body> 
</html>

<script>

	function run1(){
		var elms = document.querySelectorAll("[id='addedFromOtherClass']");
 		for(var i = 0; i < elms.length; i++) {
		console.log(elms[i]);
		console.log('ratssss');
		}
	}
	run1();

</script>