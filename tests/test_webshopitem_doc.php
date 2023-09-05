<?php
  include_once "../views/WebshopItemDoc.php";

$data = array ('page' => 'webshopitem', 'name' => 'stoel', 'price' => '20', 'description' => 'het is een stoel',
'filename' => '../Images/stoel.jpg');
$view = new WebshopItemDoc($data);
$view  -> show();

?>