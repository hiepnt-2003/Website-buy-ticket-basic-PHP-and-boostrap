<?php
session_start();
require_once('./process/config.php');

$url = 'http://localhost/TicketShop/pages/payment.php';
if (!isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] != $url) {
    header('Location: http://localhost/TicketShop');
}

if (isset($_SESSION['fullname'])) {
    $fullname = $_SESSION['fullname'];
} else {
    header('Location: http://localhost/TicketShop/pages/login.php');
    exit();
}

if(isset($_POST['btnPayment']) ){
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $note = $_POST['note'];
    $method = $_POST['payment_method'];
    $total_money = $_POST['totalMoney'];
    $product_id = $_POST['product_id'];
    $status = 0;
}


$connection = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
$sql = "SELECT * FROM products WHERE id = '$product_id';";
$result = mysqli_query($connection, $sql);
mysqli_close($connection);
if (mysqli_num_rows($result) > 0) {
    $product = mysqli_fetch_assoc($result); // Lấy thông tin của sản phẩm
}


?>