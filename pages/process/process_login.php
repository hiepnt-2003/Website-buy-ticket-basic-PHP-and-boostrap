<?php
session_start();

require_once('./process/config.php');
$errorName = '';

if (isset($_POST['btnLogin']) ) {
    // Lấy dữ liệu từ form
    $account = $_POST['loginAccount'];
    $password = $_POST['loginPassword'];

    // Xử lý đăng nhập
    $connection = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

    $sql = "SELECT * FROM user WHERE account = '$account'";
    $result = mysqli_query($connection, $sql);
    mysqli_close($connection); // Đóng kết nối

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result); // Lấy thông tin của người dùng
        $hashed_password = $user['password']; // Lấy mật khẩu đã hash từ cơ sở dữ liệu

        // So sánh mật khẩu đã hash từ cơ sở dữ liệu với mật khẩu người dùng nhập vào
        if (md5($password) == $hashed_password) {
            $_SESSION['fullname'] = $user['fullname'];
            header('Location: http://localhost/TicketShop');
            exit();
        }
    }
    $errorName = 'Tên đăng nhập hoặc mật khẩu không chính xác!';
}
