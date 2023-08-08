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
$description = "";
$queryCondition = "";
if(!empty($_POST["search"])) {
  foreach($_POST["search"] as $k=>$v){
    if(!empty($v)) {
      $queryCases = array("subcategory_name","subcategory_description");
      if(in_array($k,$queryCases)) {
        if(!empty($queryCondition)) {
          $queryCondition .= " AND ";
        } else {
          $queryCondition .= " WHERE ";
        }
      }
      switch($k) {
        case "subcategory_name":
        $name = $v;
        $queryCondition .= "subcategory_name LIKE '" . $v . "%'";
        break;
        case "subcategory_description":
        $description = $v;
        $queryCondition .= "subcategory_description LIKE '" . $v . "%'";
        break;
      }
    }
  }
}
$orderby = " ORDER BY subcategory_id ASC"; 
$sql = "SELECT * FROM subcategory " . $queryCondition;
$href = 'viewsubcategory.php'; 
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
      window.location = 'deletesubcategory.php?subcategory_id='+id; 
    }
  }
</script>
</head>
<body>
  <h1 class="h1">SUBCATEGORY</h1>
  <table align="center" cellpadding="5" cellspacing="0" >
    <?php
    if(isset($_GET['insert']) && $_GET['insert'] == "success"){
      ?>
      <tr align="center">
        <td class="suc" colspan="3">Your data is successfully inserted..!!</td>
      </tr>
      <?php 
    }
    else if(isset($_GET['delete']) && $_GET['delete'] == "success"){
      ?>
      <tr align="center">
        <td class="suc" colspan="3">Your data is successfully deleted..!!</td>
      </tr>
      <?php 
    }
    else if(isset($_GET['update']) && $_GET['update'] == "success"){
      ?>
      <tr align="center">
        <td class="suc" colspan="3">Your data is successfully update..!!</td>
      </tr>
      <?php 
    }
    ?>
  </table>
  <div>
    <div class="addnewcategory">
      <a id="btnAddAction" href="addsubcategory.php"><h1 class="addnewcategory">Add New SubCategory</h1></a>
    </div>
    <form name="frmSearch" method="post" action="viewsubcategory.php">
      <div class="search-box">
        <p><input type="text" placeholder="SubCategory Name" name="search[subcategory_name]" class="demoInputBox" value="<?php echo $name; ?>"  />   <input type="text" placeholder="SubCategory Description" name="search[subcategory_description]" class="demoInputBox" value="<?php echo $description; ?>" />  <input type="submit" name="go" class="btnSearch" value="Search"> <input type="reset" class="btnSearch" value="Reset" onclick="window.location='viewsubcategory.php'"></p>
      </div>
      <table border="1" cellpadding="10" cellspacing="1" align="center">
        <thead>
          <tr>
            <th><strong>SubCatgeory Id</strong></th>
            <th><strong>SubCatgeory Name</strong></th>          
            <th><strong>SubCatgeory Description</strong></th>
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
                  <td><?php echo $result[$k]["subcategory_id"]; ?></td>
                  <td><?php echo $result[$k]["subcategory_name"]; ?></td>
                  <td><?php echo $result[$k]["subcategory_description"]; ?></td>
                  <td>
                    <a href="editsubcategory.php?subcategory_id=<?php echo $result[$k]["subcategory_id"]; ?>">Edit</a>  |  <a href="javascript:void(0);" onClick="return confirmdata('<?php echo $result[$k]["subcategory_id"];?>');">Delete</a>
                  </td>
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