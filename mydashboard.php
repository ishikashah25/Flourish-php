<html>
<head>
  <title>Flourish Pure Food</title>
  <?php include_once 'head.php'; ?>
  <style type="text/css">
    a:link {
      color: black;
    }
  </style>
</head>
<body>
<?php include_once 'topheader.php';?>
<?php include('header.php'); ?>
<?php include('menu.php'); ?>
<?php
    include_once 'connection.php';
    $username = $_SESSION['sessionid'];
    $select="select * from registration where email_id ='$username'";
    $result = mysqli_query($connection,$select) or die(mysqli_error($connection)); 
    $row = mysqli_fetch_array($result);
    $id=$row['registration_id']; 
    $first_name=$row['first_name'];
    $last_name=$row['last_name'];
    $phone_number = $row['phone_no'];     
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
    <div class="card">
      <div class="card-header">My Account</div>
      <div class="card-body">
          <p style="margin-bottom: 20px;">Welcome to  your Account Dashboard you have the ability to view your recent account activity and update your account information. Select a link below to view or edit your information.</p>
          <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>Full Name</th>
                      <th>Email</th>
                      <th>Phone No</th>
                  </tr>
              </thead>

              <tbody>
                <tr>
                  <td><?php echo $first_name ." ". $last_name; ?></td>
                  <td><?php echo $username; ?></td>
                  <td><?php echo $phone_number; ?></td>
                </tr>
                
              </tbody>
          </table>
      </div>
      </div>
  </div>
</div>
<?php include('footer.php'); ?>
</body>
</html>