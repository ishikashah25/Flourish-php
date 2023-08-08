<!DOCTYPE HTML>
<html>
<head>
  <?php include_once 'head.php'; ?>
</head>
<body>
<?php 
  include_once('connection.php');
  include_once 'topheader.php';
  include_once('header.php');
  include_once('menu.php');
  $userid = $_SESSION['sessionid'];
  if(isset($_SESSION['sessionid']))
  {
    $sessionid = $_SESSION['sessionid'];
  }
  $select="SELECT * FROM `registration` WHERE `email_id` ='".$_SESSION['sessionid']."'";
          $result = mysqli_query($connection,$select) or die(mysqli_error($connection)); 
          $row1 = mysqli_fetch_array($result);
          $user_id=$row1['registration_id'];
          $first_name=$row1['first_name'];
          $last_name = $row1['last_name'];
          $address = $row1['address'];
          $city=$row1['city'];
          $state=$row1['state'];
          $country=$row1['country'];
          $email_id=$row1['email_id'];
          $phone_number=$row1['phone_no'];
          $fullname = $first_name ." ".$last_name; 
?>
<div class="row" style="margin-top: 10px; margin-left: 10px;">
  <div class="col-lg-3 col-md-3 col-sm-12">
      <ul class="list-group">
            <li class="list-group-item"><a class="nav-link active" href="mydashboard.php">My Account Details</a></li>
            <li class="list-group-item"><a class="nav-link" href="vieworder.php">My Order</a></li>
            <li class="list-group-item"><a class="nav-link" href="viewaddress.php">View Address</a></li>
      </ul>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-12">
      <a style="margin-bottom: 10px; float: right; margin-right: 20px;" href="editaddress.php?user_id=<?php echo $user_id; ?>" class="btn btn-success">Edit Profile</a>
      <table class="table table-bordered">
        <tr>
                  <td>Name :</td>
                  <td><input type="text" class="form-control" name="name" value="<?php echo $fullname; ?>" readonly></input></td>
                </tr>
                <br>
                <tr>
                  <td>Address :</td>
                  <td><input type="text" class="form-control" name="address" value="<?php echo $address; ?>" readonly></input></td>
                </tr>
                <tr>
                  <td>City :</td>
                  <td><input type="text" class="form-control" name="city" value="<?php echo $city; ?>" readonly></input></td>
                </tr>
                <tr>
                  <td>State :</td>
                  <td><input type="text" class="form-control" name="state" value="<?php echo $state; ?>" readonly></input>
                <tr>
                  <td>Country :</td>
                  <td><input type="text" class="form-control" name="country" value="<?php echo $country; ?>" readonly></input></td>
                </tr>
                <tr>
                  <td>Email Id :</td>
                  <td><input type="text" class="form-control" name="email_id" value="<?php echo $email_id; ?>" readonly></input></td>
                </tr>
                <tr>
                  <td>Phone Number :</td>
                  <td><input type="text" class="form-control" name="phone_number" value="<?php echo $phone_number; ?>" readonly></input></td>
                </tr>
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"></input>
      </table>
    </div>
</div>
<?php include('footer.php'); ?>
</body>
</html>