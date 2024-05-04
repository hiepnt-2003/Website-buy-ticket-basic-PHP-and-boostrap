<?php
require_once('./process/process_account.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/general.css">
</head>

<body>

    <header class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="http://localhost/TicketShop/">
                <img src="../img/logo.png" alt="Logo" height="50px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-tarPOST="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active text-nav" aria-current="page" href="http://localhost/TicketShop/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-nav" href="#">Solo Show</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-nav" href="#">Band Show</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-nav" href="#">Music Festival</a>
                    </li>
                </ul>

                <form class="d-flex search_form">
                    <input class="form-control me-2" type="search" placeholder="Search events ..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>

                <div class="dropdown px-2">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $fullname; ?>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="./account.php">Account</a></li>
                        <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <div class="container main py-5">
        <div class="row">
            <div class="col-sm-3 " style="border: 1px solid #000;">
                <div class="row py-3">
                    <form action="account.php" method="POST">
                        <input type="submit" value="Thông tin cá nhân" class="btn" name="information">
                    </form>
                </div>

                <div class="row py-3" style="border-top: 1px solid #000;">
                    <form action="account.php" method="POST">
                        <input type="submit" value="Lịch sử đặt vé" class="btn" name="bought-ticket">
                    </form>
                </div>

            </div>
            <div class="col-sm-9 py-3 content" style="border: 1px solid #000;">
                <?php if (isset($_POST['bought-ticket']) && ($_POST['bought-ticket'])) : ?>
                    <h5 class="text-center">Lịch sử đặt vé</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tên show</th>
                                <th>Người nhận</th>
                                <th>Địa chỉ nhận</th>
                                <th>Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ticked as $item) : ?>
                                <tr>
                                    <td><?php echo $item['Tên show']; ?></td>
                                    <td><?php echo $item['Tên người nhận']; ?></td>
                                    <td><?php echo $item['Địa chỉ người nhận']; ?></td>
                                    <td><?php echo $item['Giá']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                <?php else : ?>
                    <h5 class="text-center">Thông tin cá nhân</h5>
                    <form action="account.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Họ tên</label>
                            <input type="text" class="form-control" value="<?= $fullname ?>" name="changeName" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mật khẩu mới</label>
                            <input type="password" class="form-control" name="changePassword" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" name="returnPassword" required>
                        </div>
                        <div class="d-flex justify-content-center">
                            <input type="submit" value="Xác nhận" class="btn btn-success" name="changeAccount">
                        </div> 
                        <?php if ($status == 'Cập nhật thành công') : ?>
                            <h4 class="text-center py-2" style="color: green; font-size: 16px;"><?php echo $status ?></h4>
                        <?php else : ?>
                            <h4 class="text-center py-2" style="color: red; font-size: 16px;"><?php echo $status ?></h4>
                        <?php endif; ?>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <footer>
        <div class="container py-3">
            <div class="row">
                <div class="col">
                    <h5>Giới thiệu</h5>
                    <p>TicketShop là website đặt vé uy tín<br>
                        được nhiều ca nghệ sĩ nổi tiếng<br>
                        trong nước và quốc tế tin tưởng hợp tác<br>
                        phát hành vé tham gia liveshow của mình.<br>
                        <strong>Địa chỉ:</strong> Q.Thanh Xuân,TP.Hà Nội<br>
                        <strong>Đăng ký hoạt động:</strong> T8/2024
                    </p>
                </div>
                <div class="col">
                    <h5>Liên hệ</h5>
                    <p>Facebook: <a href="#">Nguyễn Tiến Hiệp</a></p>
                    <p>Zalo: <a href="#">Nguyễn Tiến Hiệp</a></p>
                    <p>Hotline: 0338948581</p>
                </div>
                <div class="col">
                    <h5>Chính sách</h5>
                    <p><a href="#">Chính sách thanh toán</a></p>
                    <p><a href="#">Chính sách bảo mật</a></p>
                    <p><a href="#">Chính sách chăm sóc khách hàng</a></p>
                </div>
            </div>
        </div>

    </footer>


</body>

</html>