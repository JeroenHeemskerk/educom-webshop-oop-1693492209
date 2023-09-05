<?php
  include_once "../views/ChangePasswordDoc.php";

$data = array ('page' => 'changepassword');
$view = new ChangePasswordDoc($data);
$view  -> show();

?>