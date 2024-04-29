<?php
session_start();
require_once('./php/config.php');

if (isset($_SESSION['fullname']) && $_SESSION['fullname'] != '') {
    $fullname = $_SESSION['fullname'];
}

$connection = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
$sql = 'SELECT thumbnail, title, even_date, price FROM products ORDER BY products.even_date DESC;';
$result = mysqli_query($connection, $sql);
mysqli_close($connection);

$products = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Lưu thông tin sản phẩm vào mảng
        $products[] = array(
            'thumbnail' => $row['thumbnail'],
            'title' => $row['title'],
            'even_date' => $row['even_date'],
            'price' => $row['price']
        );
        // Nếu đã lấy đủ 9 sản phẩm thì dừng vòng lặp
        if (count($products) == 9) {
            break;
        }
    }
}
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
    <link rel="stylesheet" href="./css/basic.css">
    <link rel="stylesheet" href="./css/account.css">
</head>

<body>

    <div class="wrapper">
        <!-- navbar-expand-lg: Class này kiểm soát thời điểm mà thanh điều hướng
      sẽ chuyển từ chế độ ngang (horizontal) sang chế độ xổ xuống (collapsed). 
      Trong trường hợp này, thanh điều hướng sẽ chuyển sang chế độ xổ xuống 
      khi kích thước màn hình nhỏ hơn điểm ngắt cho kích thước lớn (large). -->
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="http://localhost/TicketShop/">
                    <img src="../img/logo.png" alt="Logo" height="50px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
        </nav>

        <div class="container main">
        <h2 class="mt-5 mb-3">Account Information</h2>
        <form>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Username">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
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
    </div>

</body>

</html>