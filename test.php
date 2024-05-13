<?php
session_start();
if (isset($_SESSION['sql'])) {
    $product_id = $_SESSION['sql'];
}

  echo $product_id.'<br>';

?>
