<?php
session_start();
require_once('./process/config.php');

if (isset($_SESSION['fullname']) && $_SESSION['fullname'] != '') {
    $fullname = $_SESSION['fullname'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
}

$connection = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
$sql = "SELECT thumbnail, title, even_date, price, locations, description FROM products WHERE id = '$product_id';";
$result = mysqli_query($connection, $sql);
mysqli_close($connection);
if (mysqli_num_rows($result) > 0) {
    $product = mysqli_fetch_assoc($result); // Lấy thông tin của sản phẩm
}
?>