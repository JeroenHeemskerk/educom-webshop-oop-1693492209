<?php
  include_once "../views/LoginDoc.php";

$data = array ('page' => 'login', 'header' => 'Login');
$view = new LoginDoc($data);
$view  -> show();

?>