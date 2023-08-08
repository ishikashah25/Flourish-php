<?php
include('connection.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

$paymenttype = $_POST['cash'];
session_start();
$userid = $_SESSION['sessionid'];
/*if(isset($_SESSION['sessionid']))
{
 	$sessionid = $_SESSION['sessionid'];
}*/

$select="select * from add_to_cart where sessionkey ='$userid' AND active = '1'";
$result = mysqli_query($connection,$select) or die(mysqli_error($connection));
$productcount = mysqli_num_rows($result);
$i=0;
$totalprice=0;
$subtotal=1;
while($row = mysqli_fetch_array($result)){
	$i++; 
	$cartid=$row['cart_id'];
	$productid=$row['product_id'];
	$prdfontimg=$row['product_image'];
	$ProductName = $row['product_name'];
	$ProductQty = $row['product_quantity'];
	$ProductPrice = $row['product_price'];
	$subtotal=$ProductQty*$ProductPrice;
	$totalprice=$totalprice+$subtotal;
}

$selectid = "Select registration_id from `registration` where email_id ='$userid'";
$res = mysqli_query($connection,$selectid);
$rowid = mysqli_fetch_array($res);
$id = $rowid['registration_id'];

if ($paymenttype == "Cash on Delivery") {
	$insert = "INSERT INTO `ordertbl`(`PaymentType`, `order_status`, `TotalItem`, `total_amount`, `registration_id`, `cart_id`, `date_time`, `courier_name`) VALUES ('$paymenttype','Pending','$productcount','$totalprice','$id','$cartid',now(),'ishika')";
	//echo "<pre>";print_r($insert);die;
	$resulorder = mysqli_query($connection,$insert) or die(mysqli_error($connection));
}

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'shahrinku603@gmail.com';               // SMTP username
    $mail->Password   = '603rinku';                             // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('info@flourish.com', 'Flourish Pure Food');
    $mail->addAddress('shahrinku603@gmail.com', 'ishika shah');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $cartid;
    $mail->Body    = "User Email: ".$userid."<br/>"."Product Name: ". $ProductName ."<br/>"."PaymentType: ". $paymenttype ."<br/>"."Total Item: ". $ProductQty ."<br/>"."Total Amount: ". $totalprice ."<br/>"."Order Status: ". "Pending";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    header('Location:ordersuccess.php');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>