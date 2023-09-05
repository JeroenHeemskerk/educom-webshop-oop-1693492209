<?php
  include_once "../views/ContactDoc.php";

$data = array ('page' => 'contact', 'header' => 'Contact');
$view = new ContactDoc($data);
$view  -> show();

?>