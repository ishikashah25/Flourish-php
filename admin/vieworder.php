<?php
session_start();
if(!isset($_SESSION['adminlogin'])){
  header("Location: index.php"); 
} 
require_once("header.php");
require_once("perpage.php");  
require_once("dbcontroller.php");
$db_handle = new DBController();
$name = "";
$orderstatus = "";
$queryCondition = "";
if(!empty($_POST["search"])) {
  foreach($_POST["search"] as $k=>$v){
    if(!empty($v)) {
      $queryCases = array("payment_type","order_status");
      if(in_array($k,$queryCases)) {
        if(!empty($queryCondition)) {
          $queryCondition .= " AND ";
        } else {
          $queryCondition .= " WHERE ";
        }
      }
      switch($k) {
        case "payment_type":
        $name = $v;
        $queryCondition .= "payment_type LIKE '" . $v . "%'";
        break;
        case "order_status":
        $orderstatus = $v;
        $queryCondition .= "order_status LIKE '" . $v . "%'";
        break;
      }
    }
  }
}
$orderby = " ORDER BY order_id ASC"; 
$sql = "SELECT * FROM ordertbl " . $queryCondition;
$href = 'vieworder.php'; 
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
<script>
  function confirmdata(id)
  {
    var ans = confirm('Are you sure want to delete ?');
    console.log(ans);
  if(ans == false) {
      return false;
    } else {
      window.location = 'deleteorder.php?order_id='+id; 
    }
  }
</script>
</head>
<body>
  <h1 class="h1">ORDER</h1>
  <table align="center" cellpadding="5" cellspacing="0" >
      <?php 
      if(isset($_GET['update']) && $_GET['update'] == "success"){
        ?>
      <tr align="center">
        <td class="suc" colspan="3">Your data is successfully update..!!</td>
      </tr>
      <?php 
    }
    ?>
  </table>
  <div>
      <form name="frmSearch" method="post" action="vieworder.php">
      <div class="search-box">
        <p><input type="text" placeholder="Payment Type" name="search[payment_type]" class="demoInputBox" value="<?php echo $name; ?>"  />   <input type="text" placeholder="Order Status" name="search[order_status]" class="demoInputBox" value="<?php echo $orderstatus; ?>" />  <input type="submit" name="go" class="btnSearch" value="Search"> <input type="reset" class="btnSearch" value="Reset" onclick="window.location='vieworder.php'"></p>
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
            <th><strong>Registration Id</strong></th>
            <th><strong>Cart Id</strong></th>
            <th><strong>Action</strong></th>
          </tr>
        </thead>
        <tbody>
          <?php
          if(!empty($result)) {
            foreach($result as $k=>$v) {
              if(is_numeric($k)) {
                ?>
                <tr>
                  <td><?php echo $result[$k]["order_id"]; ?></td>
                  <td><?php echo $result[$k]["PaymentType"]; ?></td>
                  <td><?php echo $result[$k]["order_status"]; ?></td>
                  <td><?php echo $result[$k]["TotalItem"]; ?></td>
                  <td><?php echo $result[$k]["total_amount"]; ?></td>
                  <td><?php echo $result[$k]["courier_name"]; ?></td>
                  <td><?php echo $result[$k]["date_time"]; ?></td>
                  <td><?php echo $result[$k]["registration_id"]; ?></td>
                  <td><?php echo $result[$k]["cart_id"]; ?></td>
                  <td>
                    <a href="editorder.php?order_id=<?php echo $result[$k]["order_id"]; ?>">Edit</a> |  <a href="javascript:void(0);" onClick="return confirmdata('<?php echo $result[$k]["order_id"];?>');">Delete</a>
                  </td>
                </tr>
                <?php
              }
            }
          }
          if(isset($result["perpage"])) {
            ?>
            <tr>
              <td colspan="10" align="center"> <?php echo $result["perpage"]; ?></td>
            </tr>
          <?php } ?>
        <tbody>
      </table>
    </form> 
  </div>
  <?php include_once 'footer.php'; ?>
</body>
</html>