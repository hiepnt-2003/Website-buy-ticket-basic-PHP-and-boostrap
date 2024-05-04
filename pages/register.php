<?php
require_once('./process/process_register.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="../img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/general.css">
</head>

<body>

    <div class="wrapper d-flex justify-content-center align-items-center vh-100" style="background-color: var(--ground-color);">
        <div class="container p-3 bg-white rounded py-5" style="width: 400px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
            <h2 class="text-center">Đăng ký</h2>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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
                    <button type="submit" class="btn btn-primary" name="btnRegister">Đăng ký</button>
                    <h4 class="error py-2"><?php echo $errorName; ?></h4>
                    <a href="./login.php">Đã có tài khoản? Đăng nhập ngay</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>