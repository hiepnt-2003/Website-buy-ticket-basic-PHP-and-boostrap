<?php
session_start();
unset($_SESSION['fullname']);

header('Location: http://localhost/TicketShop');
exit();