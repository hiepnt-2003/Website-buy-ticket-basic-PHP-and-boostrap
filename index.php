<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./Bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./asset/css/main.css">
  <link rel="stylesheet" href="./asset/css/base.css">
</head>
<body>
  <header class="header">
    <div class="container py-3">
      <div class="row">
        <div class="col-sm-1">
            <img class="img-fluid" src="./asset/img/logo.png" alt="Logo">
        </div>

        <div class="col-sm-7">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Từ Khóa tìm kiếm...">
            <button class="btn btn-success" type="submit">
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="row">
            <div class="col-sm-4">
              <button type="button" class="btn btn-success">Tạo sự kiện</button>
            </div>
  
            <div class="col-sm-2">
              <button type="button" class="btn">
                <i class="fa-solid fa-ticket"></i>
              </button>
            </div>
            <div class="col-sm-6">
              <a class="login_register" href="">Đăng ký</a>
              <span class="login_register">|</span>
              <a class="login_register" href="">Đăng nhập</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </header>
  
  <div class="main_menu">
    <button type="button" class="btn">Trang chủ</button>
  </div>

  <div class="main"></div>

  <footer class="footer"></footer>

  <script src="./Bootstrap/js//bootstrap.bundle.min.js"></script>
</body>
</html>
