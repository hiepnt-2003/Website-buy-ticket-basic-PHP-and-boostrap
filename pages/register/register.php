<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../base.css">
    <link rel="stylesheet" href="./register.css">
</head>
<body>

    <?php
        require_once('../config.php');
        $errorName = '';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
                    $errorName = 'Tên đăng nhập đã tồn tại' ;
                } else {
                    
                    $password = md5($return_password);
                    $sql_insert = "INSERT INTO user (role_id, fullname, account, password,deleted) 
                                    VALUE (2, '$fullname', '$account', '$password',0);";
                    mysqli_query($connection, $sql_insert);
                    mysqli_close($connection);

                    header('Location: http://localhost/TicketShop');
                    // echo "đăng ký thành công";
                    exit();
                }

                mysqli_close($connection);
            }
        }
    ?>

    <div class="wrapper">
        <div class="container py-5">
            <h2 class="text-center" >Đăng ký</h2>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
                <div class="mb-3">
                    <label for="registerName" class="form-label">Họ tên</label>
                    <input type="text" class="form-control" id="registerName" name="registerName" required>
                </div>
                <div class="mb-3">
                    <label for="registerEmail" class="form-label">Tài khoản</label>
                    <input type="text" class="form-control" id="registerAccount" name="registerAccount" required>
                </div>
                <div class="mb-3">
                    <label for="registerPassword" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" id="registerPassword" name="registerPassword" required>
                </div>
                <div class="mb-3">
                    <label for="returnPassword" class="form-label">Nhập lại mật khẩu</label>
                    <input type="password" class="form-control" id="returnPassword" name="returnPassword" required>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
                    <label class="form-check-label" for="defaultCheck1">
                        Tôi đồng ý với điều khoản sử dụng và chính sách bảo mật của Ticket Shop 
                    </label>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Đăng ký</button>
                        <h4 class="error" ><?php echo $errorName;?></h4>
                        <a href="http://localhost/TicketShop/pages/login/login.php">Đã có tài khoản? Đăng nhập ngay</a>
                    </div>
            </form>
        </div>
    </div>
</body>
</html>

