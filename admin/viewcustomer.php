<?php
session_start();
if(!isset($_SESSION['adminlogin'])){
  header("Location: index.php"); 
} 
require_once("header.php");
require_once("perpage.php");  
require_once("dbcontroller.php");
$db_handle = new DBController();
$fname = "";
$lname = "";
$queryCondition = "";
if(!empty($_POST["search"])) {
  foreach($_POST["search"] as $k=>$v){  
    if(!empty($v)) {
      $queryCases = array("first_name","last_name");
      if(in_array($k,$queryCases)) {
        if(!empty($queryCondition)) {
          $queryCondition .= " AND ";
        } else {
          $queryCondition .= " WHERE ";
        }
      }
      switch($k) {
        case "first_name":
        $fname = $v;
        $queryCondition .= "first_name LIKE '" . $v . "%'";
        break;
        case "last_name":
        $lname = $v;
        $queryCondition .= "last_name LIKE '" . $v . "%'";
        break;
      }
    }
  }
}
$orderby = " ORDER BY registration_id ASC"; 
$sql = "SELECT * FROM registration " . $queryCondition;
$href = 'viewcustomer.php'; 
$perPage = 5; 
$page = 1;
if(isset($_POST['page'])){
  $page = $_POST['page'];
}
$start = ($page-1)*$perPage;
if($start < 0) $start = 0;
$query =  $sql . $orderby .  " limit " . $start . "," . $perPage; 
$result = $db_handle->runQuery($query);
if(!empty($result)) {
  $result["perpage"] = showperpage($sql, $perPage, $href);
}
?>
<!DOCTYPE html>
<html>
<head>
  <?php include_once 'head.php'; ?>
  <style>
  table {
    border-collapse: collapse;
    width: 70%;
    background-color: lightgreen;
    color:black;
  }
  th, td {
    padding: 8px;
  }
  
  th {
    background-color: #000;
    color: black;
    background-color: #ff6666;
  }

  .h1
  {
    font-size: 40px;
    color: #000;
    font-weight: bold;
    text-align: center;
    /*text-decoration-line: underline;*/
  }
  .addnewcategory{
    text-align: center;
    margin-bottom: 10px;
    font-size: 25px;
    font-weight: bold;
    color: black;
  }
  .search-box{
    text-align: center;
    margin-bottom: 10px;
  }
</style>
</head>
<body>
  <h1 class="h1">CUSTOMER</h1>
  <div>
      <form name="frmSearch" method="post" action="viewcustomer.php">
      <div class="search-box">
        <p><input type="text" placeholder="First Name" name="search[first_name]" class="demoInputBox" value="<?php echo $fname; ?>"  />   <input type="text" placeholder="Last Name" name="search[last_name]" class="demoInputBox" value="<?php echo $lname; ?>" />  <input type="submit" name="go" class="btnSearch" value="Search"> <input type="reset" class="btnSearch" value="Reset" onclick="window.location='viewcustomer.php'"></p>
      </div>
      <table border="1" cellpadding="10" cellspacing="1" align="center">
        <thead>
          <tr>
            <th><strong>Registration Id</strong></th>
            <th><strong>First Name</strong></th>          
            <th><strong>Last Name</strong></th>
            <th><strong>Phone No</strong></th>
            <th><strong>Email Id</strong></th>
          </tr>
        </thead>
        <tbody>
          <?php
          if(!empty($result)) {
            foreach($result as $k=>$v) {
              if(is_numeric($k)) {
                ?>
                <tr>
                  <td><?php echo $result[$k]["registration_id"]; ?></td>
                  <td><?php echo $result[$k]["first_name"]; ?></td>
                  <td><?php echo $result[$k]["last_name"]; ?></td>
                  <td><?php echo $result[$k]["phone_no"]; ?></td>
                  <td><?php echo $result[$k]["email_id"]; ?></td>
                </tr>
                <?php
              }
            }
          }
          if(isset($result["perpage"])) {
            ?>
            <tr>
              <td colspan="4" align="center"> <?php echo $result["perpage"]; ?></td>
            </tr>
          <?php } ?>
        <tbody>
      </table>
    </form> 
  </div>
  <?php include_once 'footer.php'; ?>
</body>
</html>