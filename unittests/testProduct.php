<?php

class testProduct{
    public $id;
    public $name;

    public function __construct($testid = 6){
        $this -> id = $testid;
        $this -> name = "product_$testid";
    }
}