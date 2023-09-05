<?php
  include_once "../views/RegisterDoc.php";

$data = array ('page' => 'register', 'header' => 'Register');
$view = new RegisterDoc($data);
$view  -> show();

?>