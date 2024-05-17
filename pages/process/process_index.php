<?php
session_start();
require_once('./pages/process/config.php');

// xử lý đăng nhập/đăng xuất
if (isset($_SESSION['fullname']) && $_SESSION['fullname'] != '') {
  $fullname = $_SESSION['fullname'];
}

$connection = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
$sql = 'SELECT id, thumbnail, title, even_date, price FROM products 
        WHERE products.deleted = 0
        ORDER BY products.even_date DESC;';
$result = mysqli_query($connection, $sql);
mysqli_close($connection);

$products = array();
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    // Lưu thông tin sản phẩm vào mảng
    $products[] = array(
      'id' => $row['id'],
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
