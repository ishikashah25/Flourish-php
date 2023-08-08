<?php
session_start();
if(!isset($_SESSION['adminlogin'])){
  header("Location: index.php"); 
} 
?>
<?php 
include_once('connection.php');
include_once('header.php');
$id=$_GET['order_id'];
$select="SELECT * FROM `ordertbl` WHERE order_id='$id' ";
$result=mysqli_query($connection,$select) or die(mysqli_error($connection));
?>
<html>
<head>
	<title>Kamal Prakashan</title>
	<?php include_once 'head.php'; ?>
	<style type="text/css">
	.table{
        width:40%;
        height:200px;
        margin:auto;
        word-spacing:5px;
        text-align:left;
        margin-top: 20px;
        margin-bottom: 15px;
        padding:15px;
        border:1px solid black;

    }
    textarea{
        width: 100%;
    } 
    input{
        width: 100%;
    }
    select, select[size] {
        height: 30;
        width: 100%;
    }
</style>
<script>
	function goBack() {
		window.history.back();
	}
</script>
</head>	
<body>
	<div class="contact">
		<div class="container">
			<h1 align="center">Edit Order</h1>
			<form name="category" method="post" action="updateorder.php">
				<?php 
				while($row=mysqli_fetch_array($result))
				{	
					$order_id=$row['order_id'];
					$PaymentType=$row['PaymentType'];
					$order_status=$row['order_status'];
					$TotalItem=$row['TotalItem'];
					$TotalAmount=$row['total_amount'];
					$user_id=$row['registration_id'];
					$cart_id=$row['cart_id'];
					?>
					<input type="hidden" name="order_id" value="<?php echo $order_id;?>"/>
					<table border="1px solid black" align="center">
						<tr>
							<td> Order Id:</td>
							<td> <input type="text" name="order_id" style="color: black;" readonly="" value="<?php echo $order_id ?>" required></td>
						</tr>
						<tr>
				            <td> Order Status : </td>
				            <td>        
				                <select name="order_status" id="order_status">
				                    <option value="Pending">Pending</option>
				                    <option value="Processing">Processing</option>
				                    <option value="Complete">Complete</option>
				                </select>
				            </td>
				        </tr>
				        <tr>
				            <td> Assigne Supplier : </td>
				            <td>        
				                <select name="courier_name" id="courier_name">
				                    <?php
				                    $select="SELECT * FROM courier";
				                    $result=mysqli_query($connection,$select)or die(mysqli_error($connection));
				                    while($row=mysqli_fetch_array($result)) {
				                        $courier_id=$row['courier_id'];
				                        $courier_name=$row['courier_name'];
				                        ?>
				                        <option value="<?php echo $courier_name; ?>"> <?php echo $courier_name; ?></option>
				                    <?php } ?>
				                </select>
				            </td>
				        </tr>
				        <tr>
							<td> User Id:</td>
							<td> <input style="color: black;" type="text" name="user_id" readonly="" value="<?php echo $user_id ?>" required></td>
						</tr>
						<tr>
							<td><button style="text-align: center;">Edit</button></td>
							<td><button onclick="goBack()">Go Back</button></td>
						</tr>
					</table>
				<?php } ?>
			</form>
		</div>
		<div class="clearfix"></div>
	</div>
</body>
</html>
<?php include_once 'footer.php';  ?>