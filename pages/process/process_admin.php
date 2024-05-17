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
        if ($row['category_id'] == 1) {
            $category = 'Solo Show';
        } else if ($row['category_id'] == 2) {
            $category = 'Band Show';
        } else {
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
            'thumbnail' => $row['thumbnail'],
            'description' => $row['description'],
            'locations' => $row['locations'],
            'even_date' => $row['even_date'],
            'deleted' => $deleted
        );
    }
}
mysqli_close($connection);


$show_change_liveshow = false;
if (isset($_POST['change_liveshow'])) {
    $product_change_id = $_POST['value_change_liveshow'];
    foreach ($products as $product) {
        if ($product['id'] == $product_change_id) {
            $product_change = $product;
            $show_change_liveshow = true;
            break;
        }
    }
}
$update_status = '';
if (isset($_POST['chane_detail_liveshow'])) {
    $ID_change = $_POST['ID_change'];
    $category_change = $_POST['category_change'];
    $title_change = $_POST['title_change'];
    $price_change = $_POST['price_change'];
    $thumbnail_change = $_POST['thumbnail_change'];
    $description_change = $_POST['description_change'];
    $even_date_change = $_POST['even_date_change'];
    $locations_change = $_POST['locations_change'];
    $deleted_change = $_POST['deleted_change'];

    $sql_change = "UPDATE products SET category_id = '$category_change', title = '$title_change', 
                            price = '$price_change', thumbnail = '$thumbnail_change', description = '$description_change', 
                            even_date = '$even_date_change', locations = '$locations_change', deleted = '$deleted_change' WHERE id = '$ID_change'";
    $connection = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    $result_change = mysqli_query($connection, $sql_change);
    mysqli_close($connection);
    $update_status = 'Cập nhật thành công';
}

$show_add_liveshow = false;
if (isset($_POST['add_liveshow'])) {
    $show_add_liveshow = true;
}

$add_status = '';
if (isset($_POST['btn_add'])) {
    $category_add = $_POST['category_add'];
    $title_add = $_POST['title_add'];
    $price_add = $_POST['price_add'];
    $thumbnail_add = $_POST['thumbnail_add'];
    $description_add = $_POST['description_add'];
    $even_date_add = $_POST['even_date_add'];
    $locations_add = $_POST['locations_add'];
    $deleted_add = $_POST['deleted_add'];

    $sql_add = "INSERT INTO products (category_id, title, price, thumbnail, description, even_date, locations, deleted) 
            VALUES ('$category_add', '$title_add', '$price_add', '$thumbnail_add', '$description_add', '$even_date_add', '$locations_add', '$deleted_add')";  
    $connection = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    $result_add = mysqli_query($connection, $sql_add);
    mysqli_close($connection);
    $add_status = 'Thêm thành công';
}
