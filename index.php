<?php
require_once('./pages/process/process_index.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang chủ</title>
  <link rel="icon" href="./img/logo.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="./pages/css/general.css">
  <link rel="stylesheet" href="./pages/css/index.css">

  <script>
    function SentValueToProductPage(value_click) {
      // Hàm này tìm kiếm thẻ input có id là product_id trong form 
      // rồi gán giá trị của thẻ input đó = value_click.
      document.getElementById('product_id').value = value_click;
      // Gửi form có id là Form_sent_page_product lên sever
      document.getElementById('Form_sent_page_product').submit();
    }
  </script>

  <script>
    function SentValueToSearchPage(value_click) {
      document.getElementById('search_content').value = value_click;
      document.getElementById('Form_sent_page_search').submit();
    }
  </script>
</head>

<body>
  <form id="Form_sent_page_product" action="./pages/products.php" method="post">
    <input type="hidden" id="product_id" name="product_id">
  </form>

  <form id="Form_sent_page_search" action="./pages/search.php" method="post">
    <input type="hidden" id="search_content" name="search_content">
  </form>

  <!-- navbar-expand-lg: Class này kiểm soát thời điểm mà thanh điều hướng
      sẽ chuyển từ chế độ ngang (horizontal) sang chế độ xổ xuống (collapsed). 
      Trong trường hợp này, thanh điều hướng sẽ chuyển sang chế độ xổ xuống 
      khi kích thước màn hình nhỏ hơn điểm ngắt cho kích thước lớn (large). -->
  <header class="navbar navbar-expand-lg">
    <div class="container d-flex justify-content-center align-items-center">
      <a class="navbar-brand" href="http://localhost/TicketShop/">
        <img src="./img/logo.png" alt="Logo" height="50px">
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
            <div class="nav-link text-nav" type="submit" id="search_content" onclick="SentValueToSearchPage('Solo Show')">Solo Show</div>
          </li>
          <li class="nav-item">
            <div class="nav-link text-nav" type="submit" id="search_content" onclick="SentValueToSearchPage('Band Show')">Band Show</div>
          </li>
          <li class="nav-item">
            <div class="nav-link text-nav" type="submit" id="search_content" onclick="SentValueToSearchPage('Music Festival')">Music Festival</div>
          </li>
        </ul>

        <form class="d-flex search_form" action="./pages/search.php" method="post">
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

  <div class="container main">

    <div class="photo_dynamic pt-4">
      <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Slides -->
        <div class="carousel-inner" type="submit" style="width: 100%;">
          <div class="carousel-item active" onclick="SentValueToProductPage('<?php echo $products[0]['id']; ?>')">
            <img src="<?php echo $products[0]['thumbnail']; ?>" class="d-block w-70" alt="Image 1">
          </div>
          <div class="carousel-item" onclick="SentValueToProductPage('<?php echo $products[1]['id']; ?>')">
            <img src="<?php echo $products[1]['thumbnail']; ?>" class="d-block w-70" alt="Image 2">
          </div>
          <div class="carousel-item" onclick="SentValueToProductPage('<?php echo $products[2]['id']; ?>')">
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
      <img src="./img/features_events.jpg" height="200px">
    </div>

    <div class="container list_events">
      <div class="row">
        <?php for ($i = 0; $i < 9; $i++) : ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100" type="submit" onclick="SentValueToProductPage('<?php echo $products[$i]['id']; ?>')">
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

</body>

</html>