<?php
  include_once "../views/LoginDoc.php";

$data = array ('page' => 'login');
$view = new LoginDoc($data);
$view  -> show();

?>