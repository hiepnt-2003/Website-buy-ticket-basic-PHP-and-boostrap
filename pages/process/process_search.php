<?php
session_start();
require_once('./process/config.php');

if (isset($_SESSION['fullname']) && $_SESSION['fullname'] != '') {
  $fullname = $_SESSION['fullname'];
}

$products = array();
$connection = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search_content'])) {
  $search_content = $_POST['search_content'];
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
}


if (isset($_POST['btn_search_submit'])) {

  if ($_POST['price'] == '500k') {
    $price = "price < 500000";
  } elseif ($_POST['price'] == '1tr') {
    $price = "price BETWEEN 500000 AND 1000000";
  } elseif ($_POST['price'] == '>1tr') {
    $price = "price > 1000000";
  } else {
    $price = "price > 1";
  }

  $date_from = $_POST['from_date'];
  $date_to = $_POST['to_date'];
  if ($date_from == '' && $date_to == '') {
    $date_from = '1999-01-01';
    $date_to = '2999-01-01';
    $sql_date = "even_date BETWEEN '$date_from' AND '$date_to'";
  }elseif($date_from == ''){
    $date_from = '1999-01-01';
    $sql_date = "even_date BETWEEN '$date_from' AND '$date_to'";
  }elseif($date_to == ''){
    $date_to = '2999-01-01';
    $sql_date = "even_date BETWEEN '$date_from' AND '$date_to'";
  }else{
    $sql_date = "even_date BETWEEN '$date_from' AND '$date_to'";
  }

  $sql = "SELECT * FROM products WHERE ";
  $sql = $sql . "($price) AND ($sql_date);";
  $_SESSION['sql'] = $sql;

  $result = mysqli_query($connection, $sql);
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
}
mysqli_close($connection);
