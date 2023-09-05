<?php
  include_once "../views/ShoppingcartDoc.php";

$data = array ('page' => 'shoppingcart', 'header' => 'Shoppingcart');
$view = new ShoppingcartDoc($data);
$view  -> show();

?>