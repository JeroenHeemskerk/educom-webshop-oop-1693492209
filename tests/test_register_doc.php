<?php
  include_once "../views/RegisterDoc.php";

$data = array ('page' => 'register');
$view = new RegisterDoc($data);
$view  -> show();

?>