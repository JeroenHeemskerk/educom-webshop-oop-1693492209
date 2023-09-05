<?php
  include_once "../views/WebshopItemDoc.php";

$data = array ('page' => 'webshopitem', 'header' => 'Webshopitem');
$view = new WebshopItemDoc($data);
$view  -> show();

?>