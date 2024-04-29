<?php
// Bắt đầu session
session_start();

unset($_SESSION['fullname']);

// Chuyển hướng người dùng về trang chủ hoặc trang đăng nhập
header('Location: http://localhost/TicketShop');
exit();