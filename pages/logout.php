<?php
session_start();
unset($_SESSION['fullname']);
unset($_SESSION['role_id']);

header('Location: http://localhost/TicketShop');
exit();