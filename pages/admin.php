<?php
require_once('./process/process_admin.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
                    <li class="nav-item">
                        <a class="nav-link" href="./admin.php">Admin</a>
                    </li>
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

    <div class="container-fluid main">
        <div class="row" style="background-color: var(--abc-color);">
            <div class="col-3 rounded bg-dark py-3">
                <h2 class="text-center text-danger pt-4">Menu </h2>
                <form action="admin.php" method="post">

                    <button type="submit" class="btn btn-secondary mt-1 h-75 w-100" style="height: 50px" name="general">Tổng quan
                    </button>

                    <button type="submit" class="btn btn-secondary mt-1 h-75 w-100" style="height: 50px" name="add_liveshow">Thêm LiveShow
                    </button>

                    <button type="submit" class="btn btn-secondary mt-1 h-75 w-100" style="height: 50px" name="order">Đơn hàng
                    </button>

                    <button type="submit" class="btn btn-secondary mt-1 h-75 w-100" style="height: 50px" name="account">Người dùng
                    </button>

                    <button type="submit" class="btn btn-secondary mt-1 h-75 w-100" style="height: 50px" name="feedback">Phản hồi
                    </button>

                </form>
            </div>
            <div class="col-9 py-3">
                <?php if ($show_change_liveshow == true) : ?>
                    <h2 class="text-center text-danger py-3">Thay đổi thông tin LiveShow</h2>
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="container w-50">
                            <form method="POST" action="admin.php">
                                <div class="mb-3">
                                    <label class="form-label">ID</label>
                                    <input type="text" class="form-control" id="ID_change" value="<?php echo $product_change['id']; ?>" name="ID_change" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Danh mục(1-Solo Show 2-Band Show 3-Festival)</label>
                                    <input type="text" class="form-control" id="category_change" name="category_change" value="<?php echo $product_change['category']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tiêu đề</label>
                                    <input type="text" class="form-control" id="title_change" name="title_change" value="<?php echo $product_change['title']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Giá thay đổi</label>
                                    <input type="text" class="form-control" id="price_change" name="price_change" value="<?php echo $product_change['price']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Đường dẫn hình ảnh</label>
                                    <input type="text" class="form-control" id="thumbnail_change" name="thumbnail_change" value="<?php echo $product_change['thumbnail']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Miêu tả</label>
                                    <input type="text" class="form-control" id="description_change" name="description_change" value="<?php echo $product_change['description']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Địa điểm</label>
                                    <input type="text" class="form-control" id="locations_change" name="locations_change" value="<?php echo $product_change['locations']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Ngày diễn ra</label>
                                    <input type="date" class="form-control" id="even_date_change" name="even_date_change" value="<?php echo $product_change['even_date']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Trạng thái(1-Đã hết vé 0-Chưa hết vé)</label>
                                    <input type="text" class="form-control" id="deleted_change" name="deleted_change" value="<?php echo $product_change['deleted']; ?>" required>
                                </div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <button type="submit" class="btn btn-primary my-2" name="chane_detail_liveshow">Xác nhận thay đổi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php elseif ($show_add_liveshow == true) : ?>
                    <h2 class="text-center text-danger py-3">Thêm LiveShow</h2>
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="container w-50">
                            <form method="POST" action="admin.php">
                                <div class="mb-3">
                                    <label class="form-label">Danh mục(1-Solo Show 2-Band Show 3-Festival)</label>
                                    <input type="text" class="form-control" id="category_add" name="category_add" placeholder="" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tiêu đề</label>
                                    <input type="text" class="form-control" id="title_add" name="title_add" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Giá</label>
                                    <input type="text" class="form-control" id="price_add" name="price_add" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Đường dẫn hình ảnh</label>
                                    <input type="text" class="form-control" id="thumbnail_add" name="thumbnail_add" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Miêu tả</label>
                                    <input type="text" class="form-control" id="description_add" name="description_add" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Địa điểm</label>
                                    <input type="text" class="form-control" id="locations_add" name="locations_add" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Ngày diễn ra</label>
                                    <input type="date" class="form-control" id="even_date_add" name="even_date_add" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Trạng thái(1-Đã hết vé 0-Chưa hết vé)</label>
                                    <input type="text" class="form-control" id="deleted_add" name="deleted_add" required>
                                </div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <button type="submit" class="btn btn-primary my-2" name="btn_add">Xác nhận thêm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php elseif ($show_order == true) : ?>
                    <h2 class="text-center text-danger py-3">Thông tin Đơn hàng</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tên show</th>
                                <th>Người nhận</th>
                                <th>Địa chỉ nhận</th>
                                <th>Giá</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ticked as $item) : ?>
                                <tr>
                                    <td><?php echo $item['Tên show']; ?></td>
                                    <td><?php echo $item['Tên người nhận']; ?></td>
                                    <td><?php echo $item['Địa chỉ người nhận']; ?></td>
                                    <td><?php echo $item['Giá']; ?></td>
                                    <td>
                                        <?php if ($item['Trạng thái'] == '0') {
                                            echo 'Chưa hoàn thành';
                                        } else {
                                            echo 'Đã hoàn thành';
                                        }  ?>
                                    </td>
                                    <td>
                                        <form action="./admin.php" method="post">
                                            <input type="hidden" name="id_order" value="<?php echo $item['ID order']; ?>">
                                            <button type="submit" class="btn btn-success" name="complete_order">Đã xong</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php elseif ($show_user == true) : ?>
                    <h2 class="text-center text-danger py-3">Thông tin Người dùng</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Quyền</th>
                                <th>Tài khoản</th>
                                <th>Tên</th>
                                <th>Trạng thái</th>
                                <th>Cấp quyền admin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($user as $item) : ?>
                                <tr>
                                    <td><?php echo $item['id']; ?></td>
                                    <td>
                                        <?php if ($item['role_id'] == '1') {
                                            echo 'ADMIN';
                                        } else {
                                            echo 'NGƯỜI DÙNG';
                                        }  ?>
                                    </td>
                                    <td><?php echo $item['account']; ?></td>
                                    <td><?php echo $item['fullname']; ?></td>
                                    <td>
                                        <?php if ($item['deleted'] == '0') {
                                            echo 'Hoạt động';
                                        } else {
                                            echo 'Đã xóa';
                                        }  ?>
                                    </td>
                                    <td>
                                        <form action="./admin.php" method="post">
                                            <input type="hidden" name="change_role_value" value="<?php echo $item['id']; ?>">
                                            <button type="submit" class="btn btn-success" name="change_role">Cấp quyền</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php elseif ($show_feedback == true) : ?>
                    <h2 class="text-center text-danger py-3">Phản hồi</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Họ</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">SĐT</th>
                                <th scope="col">Chủ đề</th>
                                <th scope="col">Nội dung</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($feedback as $row) : ?>
                                    <td>
                                        <?php echo $row['id'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['first_name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['last_name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['email'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['phone_number'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['subject_name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['note'] ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <h2 class="text-center text-danger py-3">Thông tin LiveShow</h2>
                    <div class="d-flex justify-content-center align-items-center">
                        <label class="text-center" style="font-size: 20px; color: green"><?php echo $update_status; ?></label>
                        <label class="text-center" style="font-size: 20px; color: green"><?php echo $add_status; ?></label>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Danh Mục</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $row) : ?>
                                <tr>
                                    <td>
                                        <?php echo $row['id'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['category'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['title'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['price'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['deleted'] ?>
                                    </td>
                                    <td>
                                        <form action="./admin.php" method="post">
                                            <input type="hidden" value="<?php echo $row['id'] ?>" name="value_change_liveshow"></input>
                                            <button type="submit" class="btn btn-primary" name="change_liveshow">Chỉnh sửa</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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
<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Modal Heading</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Modal body..
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

</html>