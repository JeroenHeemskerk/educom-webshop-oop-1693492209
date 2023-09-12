<?php
session_start();
include_once 'controllers/page-controller-class';
$pagecontroller = new PageController();
$pagecontroller -> HandleRequests();
?>