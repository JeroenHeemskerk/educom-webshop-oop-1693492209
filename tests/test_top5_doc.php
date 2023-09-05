<?php
  include_once "../views/Top5Doc.php";

$data = array ('page' => 'top5', 'header' => 'Top5');
$view = new Top5Doc($data);
$view  -> show();

?>