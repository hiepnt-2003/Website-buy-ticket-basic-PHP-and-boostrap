<?php
session_start();
require_once('./process/config.php');

if (isset($_SESSION['fullname']) && $_SESSION['fullname'] != '') {
    $fullname = $_SESSION['fullname'];
}

$connection = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
$sql = "SELECT 
            products.title as 'Tên show', 
            orders.fullname as 'Tên người nhận', 
            orders.address as 'Địa chỉ người nhận',
            products.price as 'Giá'
        FROM orders
        JOIN detail_order ON orders.id = detail_order.order_id
        JOIN products ON detail_order.product_id = products.id
        WHERE orders.fullname = '$fullname'
        GROUP BY orders.id, products.title;";
$result_ticked = mysqli_query($connection, $sql);
mysqli_close($connection);

$ticked = array();
if (mysqli_num_rows($result_ticked) > 0) {
    while ($row = mysqli_fetch_assoc($result_ticked)) {
        // Lưu thông tin sản phẩm vào mảng
        $ticked[] = array(
            'Tên show' => $row['Tên show'],
            'Tên người nhận' => $row['Tên người nhận'],
            'Địa chỉ người nhận' => $row['Địa chỉ người nhận'],
            'Giá' => $row['Giá']
        );
    }
}
$status = '';
if (isset($_POST['changeAccount']) && ($_POST['changeAccount'])) {
    $fullname_change = $_POST['changeName'];
    $password_change = $_POST['changePassword'];
    $returnPassword = $_POST['returnPassword'];
    if ($password_change == $returnPassword) {
        $connection = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
        $password_change = md5($returnPassword);
        $sql = "UPDATE user 
                SET fullname = '$fullname_change', 
                    password = '$password_change' 
                WHERE fullname = '$fullname';";
        $result = mysqli_query($connection, $sql);
        mysqli_close($connection);
        $_SESSION['fullname'] = $fullname_change;
        $status = 'Cập nhật thành công';
    } else {
        $status = 'Mật khẩu không trùng khớp';
    }
}
?>