<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/basic.css">
</head>
<body>
    <?php
        session_start();

        require_once('../php/config.php');
        $errorName = '';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lấy dữ liệu từ form
            $account = $_POST['loginAccount'];
            $password = $_POST['loginPassword'];
        
            // Xử lý đăng nhập
            $connection = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
        
            $sql = "SELECT * FROM user WHERE account = '$account'";
            $result = mysqli_query($connection, $sql);
            mysqli_close($connection);// Đóng kết nối

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
    ?>

    <div class="wrapper">
        <div class="container py-5">
        <h2 class="text-center">Đăng nhập</h2>
            <form action="login.php" method="POST">
            <div class="mb-3">
                <label for="loginAccount" class="form-label">Tài khoản</label>
                <input type="text" class="form-control" id="loginAccount" name="loginAccount" required>
            </div>
            <div class="mb-3">
                <label for="loginPassword" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="loginPassword" name="loginPassword" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Đăng nhập</button>
                <h4 class="error py-2"><?php echo $errorName ?></h4>
                <a href="./register.php">Chưa có tài khoản? Đăng ký ngay</a>
            </div>
        </form>
    </div>

</body>
</html>

