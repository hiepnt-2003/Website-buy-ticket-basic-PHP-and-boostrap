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

$show_order = false;
if (isset($_POST['order'])) {
    $show_order = true;
}

$connection = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
$sql_order = "SELECT 
            orders.id as 'ID order', 
            products.title as 'Tên show', 
            orders.fullname as 'Tên người nhận', 
            orders.address as 'Địa chỉ người nhận',
            products.price as 'Giá',
            orders.status as 'Trạng thái'
        FROM orders
        JOIN detail_order ON orders.id = detail_order.order_id
        JOIN products ON detail_order.product_id = products.id
        GROUP BY orders.id, products.title;";
$result_ticked = mysqli_query($connection, $sql_order);
mysqli_close($connection);

$ticked = array();
if (mysqli_num_rows($result_ticked) > 0) {
    while ($row = mysqli_fetch_assoc($result_ticked)) {
        // Lưu thông tin sản phẩm vào mảng
        $ticked[] = array(
            'ID order' => $row['ID order'],
            'Tên show' => $row['Tên show'],
            'Tên người nhận' => $row['Tên người nhận'],
            'Địa chỉ người nhận' => $row['Địa chỉ người nhận'],
            'Giá' => $row['Giá'],
            'Trạng thái' => $row['Trạng thái']
        );
    }
}

if (isset($_POST['complete_order'])) {
    $show_order = true;
    $id_order = $_POST['id_order'];
    $sql_change = "UPDATE orders SET status = '1' WHERE id = '$id_order'";
    $connection = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    $result_change = mysqli_query($connection, $sql_change);
    mysqli_close($connection);
}

$show_user = false;
$user = array();
$sql_user = 'SELECT * FROM user;';
$connection = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
$result_user = mysqli_query($connection, $sql_user);
mysqli_close($connection);
if (mysqli_num_rows($result_user) > 0) {
    while ($row = mysqli_fetch_assoc($result_user)) {
        // Lưu thông tin người dùng
        $user[] = array(
            'id' => $row['id'],
            'role_id' => $row['role_id'],
            'account' => $row['account'],
            'fullname' => $row['fullname'],
            'deleted' => $row['deleted']
        );
    }
}

if (isset($_POST['account'])) {
    $show_user = true;
}

if (isset($_POST['change_role'])) {
    $show_user = true;
    $id_role_change = $_POST['change_role_value'];
    $sql_change_role = "UPDATE user SET role_id = '1' WHERE id = '$id_role_change'";

    $connection = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    $result_change = mysqli_query($connection, $sql_change_role);
    mysqli_close($connection);
}

$show_feedback = false;
if (isset($_POST['feedback'])) {
    $show_feedback = true;
}