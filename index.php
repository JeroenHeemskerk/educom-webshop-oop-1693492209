<?php
session_start();
include_once 'controllers/page-controller-class';
include_once 'factories/crud-factory.php';
include_once 'factories/model-factory.php';
$crud = new crud();
$crudfactory = new crudfactory($crud);
$modelfactory = new modelfactory($crudfactory);

$pagecontroller = new PageController($modelfactory);
$pagecontroller -> HandleRequests();
?>