<?php
  include_once "../views/AboutDoc.php";
  include_once "../views/BasicDoc.php";

$data = array ( 'page' => 'about');
$view = new AboutDoc($data);
$view  -> show();

?>