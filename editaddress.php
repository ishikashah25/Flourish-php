<?php 
	require_once('header.php');
	require_once('connection.php');
	$user_id=$_GET['user_id']; 
	$select="SELECT * from registration where registration_id='$user_id' ";
	$result=mysqli_query($connection,$select);
	$row1 = mysqli_fetch_array($result);
    $first_name=$row1['first_name'];
    $last_name = $row1['last_name'];
    $address = $row1['address'];
    $city=$row1['city'];
    $state=$row1['state'];
    $country=$row1['country'];
    $phone_number=$row1['phone_no'];
?>
<!DOCTYPE html>
<html>
<head>
  <?php include_once 'head.php'; ?>
  <style type="text/css">
  table {
        border-collapse: collapse;
        width: 50%;

    }
    tr, td {
        padding: 8px;
    }
    b{
        font-size: 30px;
    }
    .addsubcat{
        text-align: center;
        margin-bottom: 10px;
    }
    input{
        width: 100%;
        height: 30px
    }	
    textarea{
        width: 100%;
        height:50px;
    }
  </style>
</head>	
<body>
<div> 
    <div>
        <h1><center>Edit Address</center></h1>
		<form method="POST" id="updateaddress" enctype="multipart/form-data" action="updateaddress.php">
		    <input type="hidden" name="user_id" value="<?php echo $user_id;?>" />
				<table border="2" align="center">
    				<tr>
    					<td>First name:</td>
    					<td>
							<input type="text" name="first_name" value="<?php echo $first_name; ?>">
                        </td>
                    </tr>
					<tr>
						<td>Last Name</td>
                        <td>
							<input type="text" name="last_name" value="<?php echo $last_name; ?>">
                        </td>
                    </tr>
					<tr>
						<td>Address</td>						
                        <td>
							<input type="text" name="address" value="<?php echo $address; ?>"/>
                        </td>
                    </tr>
            		<tr>
						<td>City</td>
                        <td>
							<input type="text" name="city" value="<?php echo $city; ?>"/>
                        </td>
                    </tr>
					<tr>
						<td>State</td>
                        <td>
						    <input type="text" name="state" value="<?php echo $state; ?>">
                        </td>
                    </tr>
                    <br>
					<tr>
						<td>Country</td>
                        <td>
							<input type="text" name="country" value="<?php echo $country; ?>">
                        </td>
                    </tr>
                    <br>
                    <tr>
			            <td>Phone Number</td>
                        <td>
							<input type="text" name="phone_number" value="<?php echo $phone_number; ?>"></td>
					</tr>
                    <tr>
		        		<td>
							<button type="submit" class="btn" name="submitEditaddreesForm" value="submit file">Edit</button>
                        </td>
                        <td>
                            <button type="button" class="btn" onclick="history.back();">Back</button>
                    </td>
                    </tr>
                </div>
            </table>
        </form>
    </div>
 </div>
<?php include_once 'footer.php';  ?>
</body>
</html>