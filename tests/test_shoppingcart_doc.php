<?php
  include_once "../views/ShoppingcartDoc.php";

$data = array ('page' => 'shoppingcart', 'total' => '2', 'name' => 'stoel', 'price' => '20', 'description' => 'het is een stoel',
'cost' => '40', 'filename' => '../Images/stoel.jpg');
$view = new ShoppingcartDoc($data);
$view  -> show();

?>