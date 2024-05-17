<?php
session_start();
require_once('./process/config.php');
$errorName = '';

if (isset($_POST['btnRegister'])) {

    $fullname = $_POST['registerName'];
    $account = $_POST['registerAccount'];
    $password = $_POST['registerPassword'];
    $return_password = $_POST['returnPassword'];

    if ($password != $return_password) {
        $errorName = 'Nhập lại mật khẩu không đúng!';
    } else {

        $connection = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
        $sql = "SELECT * FROM user WHERE account = '$account'";
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            $errorName = 'Tên đăng nhập đã tồn tại';
        } else {
            $password = md5($password);
            $sql_insert = "INSERT INTO user (role_id, fullname, account, password,deleted) 
                                    VALUE (2, '$fullname', '$account', '$password',0);";
            mysqli_query($connection, $sql_insert);

            $sql_select_id = "SELECT * FROM user WHERE account = '$account'";
            $result_id = mysqli_query($connection, $sql_select_id);
            if (mysqli_num_rows($result_id) > 0) {
                $user = mysqli_fetch_assoc($result_id);
                $_SESSION['user_id'] = $user['id'];
            }
            mysqli_close($connection);

            $_SESSION['fullname'] = $fullname;
            $_SESSION['account'] = $account;
            $_SESSION['role_id'] = 2;
            header('Location: http://localhost/TicketShop');
            exit();
        }
    }
}
