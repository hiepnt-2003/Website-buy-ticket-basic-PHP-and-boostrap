<?php
require_once('./process/process_confirm_payment.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận thanh toán</title>
    <link rel="icon" href="../img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/general.css">
</head>

<body>
    <script>
        function SentValueToSearchPage(value_click) {
            document.getElementById('search_content').value = value_click;
            document.getElementById('Form_sent_page_search').submit();
        }
    </script>

    <form id="Form_sent_page_search" action="./search.php" method="post">
        <input type="hidden" id="search_content" name="search_content">
    </form>

    <header class="navbar navbar-expand-lg">
        <div class="container d-flex justify-content-center align-items-center">
            <a class="navbar-brand" href="http://localhost/TicketShop/">
                <img src="../img/logo.png" alt="Logo" height="50px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active text-nav" aria-current="page" href="http://localhost/TicketShop/">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link text-nav" type="submit" onclick="SentValueToSearchPage('Solo Show')">Solo Show</div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link text-nav" type="submit" onclick="SentValueToSearchPage('Band Show')">Band Show</div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link text-nav" type="submit" onclick="SentValueToSearchPage('Music Festival')">Music Festival</div>
                    </li>
                </ul>

                <form class="d-flex search_form" action="./search.php" method="post">
                    <input class="form-control me-1" type="search" name="search_content" placeholder="Tìm kiếm liveshow ..." required>
                    <button class="btn btn-outline-success" type="submit" name="SearchProducts">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>

                <?php if (isset($fullname)) : ?>
                    <div class="dropdown px-2">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $fullname; ?>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="./pages/account.php">Tài khoản</a></li>
                            <li><a class="dropdown-item" href="./pages/logout.php">Đăng xuất</a></li>
                        </ul>
                    </div>

                <?php else : ?>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-nav " href="./pages/register.php">Đăng ký</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-nav" href="./pages/login.php">Đăng nhập</a>
                        </li>
                    </ul>
                <?php endif; ?>

            </div>
        </div>
    </header>


    <div class="container main" style="background-color: aliceblue; border-radius: 10px;">
        <div class="row py-5">
            <h2 class="text-center">Xác nhận thông tin</h2>
            <div class="col-md-6">
                <div class="container">
                    <h6 class="pb-3" style="margin-left: 150px;">Họ tên: <?php echo $fullname  ?></h6>
                    <h6 class="pb-3" style="margin-left: 150px;">Email: <?php echo $email  ?></h6>
                    <h6 class="pb-3" style="margin-left: 150px;">SĐT: <?php echo $phone  ?></h6>
                    <h6 class="pb-3" style="margin-left: 150px;">Địa chỉ: <?php echo $address  ?></h6>
                    <h6 class="pb-3" style="margin-left: 150px;">Ghi chú: <?php echo $note  ?></h6>
                    <h6 class="pb-3" style="margin-left: 150px;">Phương thức thanh toán: <?php echo $method  ?></h6>
                    <h6 class="pb-3" style="margin-left: 150px;">Tổng tiền: <?php echo $total_money  ?> VND</h6>
                    <form action="" method="post">
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-success" type="submit" name="btnPayment" style="width: 40%;">
                                Xác nhận thanh toán
                            </button>
                        </div>

                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="container">
                    <div class="card h-100">
                        <img src="<?php echo '.' . $product['thumbnail']; ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['title']; ?></h5>
                            <p class="card-text">
                                <i class="fa-solid fa-calendar-days" style="color: var(--note-color);"></i>
                                Thời gian: <?php echo $product['even_date']; ?>
                            </p>
                            <p class="card-text">
                                <i class="fa-solid fa-location-dot" style="color: var(--note-color);"></i>
                                Địa điểm: <?php echo $product['locations']; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <h6>Giới thiệu</h6>
                    <p>TicketShop là website đặt vé uy tín<br>
                        được nhiều ca nghệ sĩ nổi tiếng<br>
                        trong nước và quốc tế tin tưởng hợp tác<br>
                        phát hành vé tham gia liveshow của mình.<br>
                        <strong>Địa chỉ:</strong> Q.Thanh Xuân,TP.Hà Nội<br>
                        <strong>Đăng ký hoạt động:</strong> T8/2024
                    </p>
                </div>
                <div class="col">
                    <h6>Liên hệ</h6>
                    <p>Facebook: <a href="#">Nguyễn Tiến Hiệp</a></p>
                    <p>Zalo: <a href="#">Nguyễn Tiến Hiệp</a></p>
                    <p>Hotline: 0338948581</p>
                </div>
                <div class="col">
                    <h6>Chính sách</h6>
                    <p><a href="#">Chính sách thanh toán</a></p>
                    <p><a href="#">Chính sách bảo mật</a></p>
                    <p><a href="#">Chính sách chăm sóc khách hàng</a></p>
                </div>
            </div>
        </div>

    </footer>


    <!-- <div class="modal" id="confirmModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Thanh toán</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <h2 class="text-center">Thông tin thanh toán</h2>
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="../img/qr_code.jpg" alt="Ảnh QR" height="150px">
                        </div>
                        <h6 class="text-center">Ngân hàng: MBBank</h6>
                        <h6 class="text-center">Số tài khoản: 883883678</h6>
                        <h6 class="text-center">Chủ stk: Nguyễn Tiến Hiệp</h6>
                        <h6 class="text-center">Nội dung: "Tên tài khoản" + id:<?php echo $_SESSION['product_id']; ?></h6>
                        <div style="display: flex;">
                            <span style="margin: 5px 0px 0px 100px;">Tổng tiền:</span>
                            <span>
                                <input type="text" class="form-control text-center border-0 shadow-none" id="total_money" value="<?php echo $product['price']; ?>" style="width: 120px;" readonly>
                            </span>
                            <span style="margin-top: 5px;">VND</span>
                        </div>
                        <p class="text-center" style="color: blue;">Khi nhấn xác nhận đồng nghĩa với việc bạn đồng ý<br>
                                                về chính sách thanh toán của chúng tôi<br>
                                                .Nếu có bất kỳ vấn đề gì xin liên hệ hotline: 0338948581
                        </p>
                    </div>

                    <form action="bought.php" method="POST">
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" name="confirm_payment">Xác nhận</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Hủy</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->
</body>

</html>