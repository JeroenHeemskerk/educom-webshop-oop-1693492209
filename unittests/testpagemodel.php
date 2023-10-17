<?php 
class testpagemodel {  
    public $sessionManager;
    public $page = 'test';
    public $newpage = 'new';
    public $menu;
    public $errors = array();
    public $genericErr = "";
    public $isPost;

    public function __construct($testsession = ''){
        $this -> sessionManager = $testsession;
    }
}