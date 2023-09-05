<?php
  include_once "../views/HomeDoc.php";
  include_once "../views/BasicDoc.php";

$data = array ( 'page' => 'home');
$view = new HomeDoc($data);
$view  -> show();

?>