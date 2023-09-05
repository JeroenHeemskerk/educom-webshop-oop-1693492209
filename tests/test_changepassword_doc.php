<?php
  include_once "../views/ChangePasswordDoc.php";

$data = array ('page' => 'changepassword', 'header' => 'Changepassword');
$view = new ChangePasswordDoc($data);
$view  -> show();

?>