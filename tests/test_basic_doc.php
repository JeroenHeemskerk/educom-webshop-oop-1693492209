<?php
  include_once "../views/BasicDoc.php";

  $data = array ( 'page' => 'basic', 'header' => 'Basic' /* other fields */ );

  $view = new BasicDoc($data);
  $view  -> show($data);
?>