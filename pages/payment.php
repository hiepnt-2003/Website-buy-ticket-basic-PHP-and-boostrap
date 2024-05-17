<?php
require_once('./process/process_payment.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt vé</title>
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

                <?php if (isset($fullname)) : ?>
                    <div class="dropdown px-2">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $fullname; ?>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="./account.php">Tài khoản</a></li>
                            <li><a class="dropdown-item" href="./logout.php">Đăng xuất</a></li>
                        </ul>
                    </div>

                <?php else : ?>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-nav " href="./register.php">Đăng ký</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-nav" href="./login.php">Đăng nhập</a>
                        </li>
                    </ul>
                <?php endif; ?>

            </div>
        </div>
    </header>
    <div class="container rounded main" style="background-color: aliceblue;">
        <div class="row">
            <div class="col-md-6">
                <div class="container py-5">
                    <h2 class="text-center">Thông tin thanh toán</h2>
                    <form action="confirm_payment.php" method="POST">
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $fullname; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                        <div class="mb-3">
                            <label for="note" class="form-label">Ghi chú</label>
                            <input type="text" class="form-control" id="note" name="note" required>
                        </div>
                        <div class="mb-3">
                            <label for="payment_method" class="form-label">Phương thức thanh toán</label>
                            <select class="form-control" id="payment_method" name="payment_method" required>
                                <option value="">Chọn phương thức thanh toán</option>
                                <option value="momo">Momo</option>
                                <option value="banking">Chuyển khoản ngân hàng</option>
                            </select>
                        </div>
                        <input type="hidden" id="totalMoney" name="totalMoney" value="<?php echo $product['price']; ?>">
                        <input type="hidden" id="product_id" name="product_id" value="<?php echo $product['id']; ?>">
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-success" type="submit" name="btnPayment" style="width: 30%;">
                                Tiếp tục
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="container py-5">
                    <h2 class="text-center">Thông tin sản phẩm</h2>
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
                            <p class="card-text">
                                <i class="fa-solid fa-money-check-dollar" style="color: var(--note-color);"></i>
                                Giá: <?php echo $product['price']; ?>VND
                            </p>
                        </div>

                        <form action="payment.php" method="post">
                            <div class="input-group pb-3">
                                <label class="ms-3 pt-1">Số lượng</label>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <button class="btn btn-outline-secondary" type="button" id="sub-btn">-</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control text-center" value="1" id="quantity" readonly>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <button class="btn btn-outline-secondary" type="button" id="add-btn">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row ms-1 pb-4">
                            <div class="col-sm-3 pt-1">
                                <span for="">Tổng tiền:</span>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control text-center border-0 shadow-none" id="total_money" value="<?php echo $product['price']; ?>" readonly>
                            </div>
                            <div class="col-sm-2 pt-1">
                                <span for="">VND</span>
                            </div>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#add-btn').click(function() {
                var quantity = parseInt($('#quantity').val());
                $('#quantity').val(quantity + 1);
            });

            $('#sub-btn').click(function() {
                var quantity = parseInt($('#quantity').val());
                if (quantity > 1) {
                    $('#quantity').val(quantity - 1);
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#add-btn').click(function() {
                var quantity = parseInt($('#quantity').val());
                var price = parseInt(<?php echo $product['price']; ?>);
                var total = quantity * price;
                $('#total_money').val(total);
                $('#totalMoney').val(total);
            });

            $('#sub-btn').click(function() {
                var quantity = parseInt($('#quantity').val());
                var price = parseInt(<?php echo $product['price']; ?>);
                var total = quantity * price;
                $('#total_money').val(total);
                $('#totalMoney').val(total);
            });

        });
    </script>

</body>

</html>