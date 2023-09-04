<?php
  include_once "../views/AboutDoc.php";
  include_once "../views/BasicDoc.php";

$data = array ( 'page' => 'about', 'header' => 'About', /* other fields */ );
$view = new AboutDoc($data);
$view  -> show();

?>