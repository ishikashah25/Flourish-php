<?php
if (isset($_POST['submitEditaddreesForm'])) {
    include 'connection.php';
    $user_id = $_POST['user_id'];
    $first_name = trim($_POST['first_name'], " ");
    $last_name = trim($_POST['last_name'], " ");
    $address = trim($_POST['address'], " ");
    $city = trim($_POST['city'], " ");
    $state = trim($_POST['state'], " ");
    $country = trim($_POST['country'], " ");
    $phone_number = trim($_POST['phone_number'], " ");

    $update = "UPDATE registration SET first_name='$first_name',last_name='$last_name', address='$address', city='$city', state='$state', country='$country', phone_no='$phone_number' WHERE registration_id='$user_id' ";
    $result = mysqli_query($connection,$update) or die(mysqli_error($connection));
    header('Location:viewaddress.php?update=suc');
}
?>