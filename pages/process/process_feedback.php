<?php
session_start();
require_once('./process/config.php');

if (isset($_SESSION['fullname']) && $_SESSION['fullname'] != '') {
    $fullname = $_SESSION['fullname'];
}

if (isset($_POST['btn-feedback'])) {
    $feedback_first_name = $_POST['first_name'];
    $feedback_last_mame = $_POST['last_name'];
    $feedback_email = $_POST['email'];
    $feedback_phone = $_POST['phone'];
    $feedback_subject = $_POST['subject'];
    $feedback_content = $_POST['content'];

    $connection = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    $sql = "INSERT INTO feedback (first_name, last_name, email, phone_number, subject_name, note) 
    VALUES ('$feedback_first_name', '$feedback_last_mame', '$feedback_email', '$feedback_phone', '$feedback_subject', '$feedback_content');";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        echo "<script>alert('Gửi phản hồi thành công!')</script>";
    } else {
        echo "<script>alert('Gửi phản hồi thất bại!')</script>";
    }
    
    mysqli_close($connection);
}