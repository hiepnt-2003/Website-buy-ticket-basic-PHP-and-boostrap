<?php
session_start();
require_once('./pages/php/config.php');

// xử lý đăng nhập/đăng xuất
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
  <title>Trang chủ</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="./pages/css/basic.css">

  <link rel="stylesheet" href="./pages/css/index.css">
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
          <img src="./img/logo.png" alt="Logo" height="50px">
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

          <?php if (isset($fullname)) : ?>
            <div class="dropdown px-2">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo $fullname; ?>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="./pages/account.php">Account</a></li>
                <li><a class="dropdown-item" href="./pages/php/logout.php">Logout</a></li>
              </ul>
            </div>

          <?php else : ?>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link text-nav " href="./pages/php/register.php">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-nav" href="./pages/php/login.php">Login</a>
              </li>
            </ul>
          <?php endif; ?>

        </div>
      </div>
    </nav>

    <div class="container main">

      <div class="photo_dynamic">
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
          <!-- Slides -->
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="<?php echo $products[0]['thumbnail']; ?>" class="d-block w-70" alt="Image 1">
            </div>
            <div class="carousel-item">
              <img src="<?php echo $products[1]['thumbnail']; ?>" class="d-block w-70" alt="Image 2">
            </div>
            <div class="carousel-item">
              <img src="<?php echo $products[2]['thumbnail']; ?>" class="d-block w-70" alt="Image 3">
            </div>
          </div>

          <!-- Controls -->
          <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>

      <div class="d-flex justify-content-center align-items-center">
        <img src="./img/features_events.jpg" height="250px">
      </div>

      <div class="container list_events">
        <div class="row">
          <?php for ($i = 0; $i < 9; $i++) : ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <img src="<?php echo $products[$i]['thumbnail']; ?>" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $products[$i]['title']; ?></h5>
                  <p class="card-text">Time: <?php echo $products[$i]['even_date']; ?></p>
                  <p class="card-text">Price: <?php echo $products[$i]['price']; ?>VND</p>
                </div>
              </div>
            </div>
          <?php endfor; ?>
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
  </div>

</body>

</html>