<?php
session_start();
require_once('./process/config.php');

if (isset($_SESSION['fullname']) && $_SESSION['fullname'] != '') {
  $fullname = $_SESSION['fullname'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $search_content = $_POST['search_content'];
}

$connection = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
if ($search_content == 'Solo Show' || $search_content == 'Band Show' || $search_content == 'Music Festival') {
  if ($search_content == 'Solo Show') {
    $search_content = '1';
  } else if ($search_content == 'Band Show') {
    $search_content = '2';
  } else {
    $search_content = '3';
  }

  $sql = "SELECT * FROM products WHERE category_id = '$search_content' ORDER BY products.even_date DESC;";
  $result = mysqli_query($connection, $sql);
} else {
  $sql = "SELECT * FROM products WHERE title LIKE '%$search_content%' ORDER BY products.even_date DESC;";
  $result = mysqli_query($connection, $sql);
}
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
  }
}
