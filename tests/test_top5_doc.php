<?php
  include_once "../views/Top5Doc.php";

$data = array ('page' => 'top5', 'place' => '1', 'name' => 'stoel', 'filename' => '../Images/stoel.jpg');
$view = new Top5Doc($data);
$view  -> show();

?>