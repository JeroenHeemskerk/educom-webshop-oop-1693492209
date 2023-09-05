<?php
  include_once "../views/WebshopDoc.php";

$data = array ('page' => 'webshop', 'header' => 'Webshop');
$view = new WebshopDoc($data);
$view  -> show();

?>