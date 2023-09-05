<?php
  include_once "../views/WebshopDoc.php";

$data = array ('page' => 'webshop', 'name' => 'stoel', 'filename' => '../Images/stoel.jpg');
$view = new WebshopDoc($data);
$view  -> show();

?>