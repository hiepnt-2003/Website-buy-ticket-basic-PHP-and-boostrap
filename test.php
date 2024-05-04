<?php
session_start();
if (isset($_SESSION['HTTP_REFERER']) && ($_SESSION['HTTP_REFERER']) != '') {
    $product_id = $_SESSION['HTTP_REFERER'];
}

  echo $product_id;

?>
