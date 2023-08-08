<?php
session_start();
if(!isset($_SESSION['adminlogin'])){
  header("Location: index.php"); 
} 
require_once("header.php");
require_once("perpage.php");  
require_once("dbcontroller.php");
$db_handle = new DBController();
$paymenttype = "";
$couriername = "";
$queryCondition = "";
if(!empty($_POST["search"])) {
  foreach($_POST["search"] as $k=>$v){  
    if(!empty($v)) {
      $queryCases = array("payment_type","courier_name");
      if(in_array($k,$queryCases)) {
        if(!empty($queryCondition)) {
          $queryCondition .= " AND ";
        } else {
          $queryCondition .= " WHERE ";
        }
      }
      switch($k) {
        case "payment_type":
        $paymenttype = $v;
        $queryCondition .= "payment_type LIKE '" . $v . "%'";
        break;
        case "courier_name":
        $couriername = $v;
        $queryCondition .= "courier_name LIKE '" . $v . "%'";
        break;
      }
    }
  }
}
$orderby = " ORDER BY order_id ASC"; 
$sql = "SELECT * FROM ordertbl " . $queryCondition;
$href = 'viewreturn.php'; 
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
  <h1 class="h1">RETURN</h1>
  <div>
      <form name="frmSearch" method="post" action="viewreturn.php">
      <div class="search-box">
        <p><input type="text" placeholder="Payment Type" name="search[payment_type]" class="demoInputBox" value="<?php echo $paymenttype; ?>"  />   <input type="text" placeholder="Courier Name" name="search[courier_name]" class="demoInputBox" value="<?php echo $couriername; ?>" />  <input type="submit" name="go" class="btnSearch" value="Search"> <input type="reset" class="btnSearch" value="Reset" onclick="window.location='viewreturn.php'"></p>
      </div>
      <table border="1" cellpadding="10" cellspacing="1" align="center">
        <thead>
          <tr>
            <th><strong>Order Id</strong></th>
            <th><strong>Payment Type</strong></th>          
            <th><strong>Order Status</strong></th>
            <th><strong>Total Item</strong></th>
            <th><strong>Total Amount</strong></th>
            <th><strong>Courier Name</strong></th>
            <th><strong>Date Time</strong></th>
          </tr>
        </thead>
        <tbody>
          <?php
          if(!empty($result)) {
            foreach($result as $k=>$v) {
              $status = $result[$k]["order_status"];
              if ($status == "cancel") {
                if(is_numeric($k)) {
                  ?>
                  <tr>
                    <td><?php echo $result[$k]["order_id"]; ?></td>
                    <td><?php echo $result[$k]["payment_type"]; ?></td>
                    <td><?php echo $result[$k]["order_status"]; ?></td>
                    <td><?php echo $result[$k]["total_item"]; ?></td>
                    <td><?php echo $result[$k]["total_amount"]; ?></td>
                    <td><?php echo $result[$k]["courier_name"]; ?></td>
                    <td><?php echo $result[$k]["date_time"]; ?></td>
                  </tr>
                  <?php
                }
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