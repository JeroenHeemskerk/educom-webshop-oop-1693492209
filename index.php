<?php
session_start();
include_once 'controllers/page-controller-class';
$crud = new crud();
$pagemodel = new PageModel(null, $crud);
$pagecontroller = new PageController($pagemodel);
$pagecontroller -> HandleRequests();
?>