<?php
session_start();
require_once('./process/config.php');

if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != 1) {
    header('Location: http://localhost/TicketShop');
    exit();
}

if (isset($_SESSION['fullname']) && $_SESSION['fullname'] != '') {
    $fullname = $_SESSION['fullname'];
}


$connection = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

$query = "SELECT * FROM `orders`";
$result_order = mysqli_query($connection, $query);

$order = array();
if (mysqli_num_rows($result_order) > 0) {
    while ($row = mysqli_fetch_assoc($result_order)) {
        // Lưu thông tin đơn hàng
        if ($row['status'] == 1) {
            $status = 'Đã xử lý';
        } else if ($row['status'] == 0) {
            $status = 'Chưa xử lý';
        }
        $order[] = array(
            'id' => $row['id'],
            'email' => $row['email'],
            'phone_number' => $row['phone_number'],
            'note' => $row['note'],
            'status' => $status,
            'total_money' => $row['total_money']
        );
    }
}


$sql_user = 'SELECT * FROM user;';
$result_user = mysqli_query($connection, $sql_user);

$user = array();
if (mysqli_num_rows($result_user) > 0) {
    while ($row = mysqli_fetch_assoc($result_user)) {
        // Lưu thông tin người dùng
        $user[] = array(
            'id' => $row['id'],
            'role_id' => $row['role_id'],
            'fullname' => $row['fullname'],
            'deleted' => $row['deleted']
        );
    }
}


$sql_feedback = 'SELECT * FROM feedback;';
$result_feedback = mysqli_query($connection, $sql_feedback);

$feedback = array();
if (mysqli_num_rows($result_feedback) > 0) {
    while ($row = mysqli_fetch_assoc($result_feedback)) {
        // Lưu thông tin phản hồi
        $feedback[] = array(
            'id' => $row['id'],
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'email' => $row['email'],
            'phone_number' => $row['phone_number'],
            'subject_name' => $row['subject_name'],
            'note' => $row['note']
        );
    }
}

$sql = 'SELECT * FROM products;';
$result_products = mysqli_query($connection, $sql);

$products = array();
if (mysqli_num_rows($result_products) > 0) {
    while ($row = mysqli_fetch_assoc($result_products)) {
        // Lưu thông tin sản phẩm
        if ( $row['category_id'] == 1) {
            $category = 'Solo Show';
        } else if ($row['category_id'] == 2) {
            $category = 'Band Show';
        }
        else{
            $category = 'Music Festival';
        }

        if ($row['deleted'] == 1) {
            $deleted = 'Đã xóa';
        } else if ($row['deleted'] == 0) {
            $deleted = 'Chưa xóa';
        }
        $products[] = array(
            'id' => $row['id'],
            'category' => $category,
            'title' => $row['title'],
            'price' => $row['price'],
            'even_date' => $row['even_date'],
            'deleted' => $deleted
        );
    }
}

if (isset($_POST['chane_liveshow'])){
    if($_POST['category'] == 'Solo Show'){
        $category_id = 1;
    } else if($_POST['category'] == 'Band Show'){
        $category_id = 2;
    } else{
        $category_id = 3;
    }

    if($_POST['deleted'] == 'Đã xóa'){
        $deleted = 1;
    } else{
        $deleted = 0;
    }

    $title = $_POST['title'];
    $price = $_POST['price'];
    $even_date = $_POST['even_date'];

    $sql = "INSERT INTO products (category_id, title, price, even_date, deleted) VALUES ('$category_id', '$title', '$price', '$even_date', '$deleted')";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        header('Location: http://localhost/TicketShop/pages/admin.php');
        exit();
    }
}
$show_change_liveshow = false;
if (isset($_POST['change_liveshow'])){
    $product_change_id = $_POST['value_change_liveshow'];
    foreach ($products as $product){
        if($product['id'] == $product_change_id){
            $product_change = $product;
            $show_change_liveshow = true;
            break;
        }
    }
}
