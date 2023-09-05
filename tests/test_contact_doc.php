<?php
  include_once "../views/ContactDoc.php";

$data = array ('page' => 'contact');
$view = new ContactDoc($data);
$view  -> show();

?>