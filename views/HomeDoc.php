<?php
include_once "views/BasicDoc.php";

class HomeDoc extends BasicDoc {
    // private $pagemodel;
    // private $pagecontroller;
    // public function __construct($pagecontroller, $pagemodel) {
    //     $this -> pagecontroller = $pagecontroller;
    //     $this -> pagemodel = $pagemodel;
    // }

    protected function showTitleName(){
        echo 'home';
    }
    protected function showHeader(){
        echo "Home";
    }
    protected function showContent(){
        echo '
        <p>Welkom bij de website.</p>
        <p>We hopen dat u ervan geniet.</p>';
    }
}