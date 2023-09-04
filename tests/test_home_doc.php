<?php
  include_once "../views/HomeDoc.php";
  include_once "../views/BasicDoc.php";

$data = array ( 'page' => 'home', 'header' => 'Home', /* other fields */ );
$view = new HomeDoc($data);
$view  -> show();

?>