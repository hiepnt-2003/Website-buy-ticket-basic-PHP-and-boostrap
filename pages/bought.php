<?php
require_once('./process/process_account.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Shop</title>
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
                    <?php if (isset($_SESSION['role_id']) && $_SESSION['role_id'] == 1) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./admin.php">Admin</a>
                        </li>
                    <?php endif; ?>
                </ul>

                <form class="d-flex search_form" action="./search.php" method="post">
                    <input class="form-control me-1" type="search" name="search_content" placeholder="Tìm kiếm liveshow ..." required>
                    <button class="btn btn-outline-success" type="submit" name="SearchProducts">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
                <div class="dropdown px-2">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $fullname; ?>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="./account.php">Tài khoản</a></li>
                        <li><a class="dropdown-item" href="./logout.php">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <div class="container main py-5">
        sasdsd
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