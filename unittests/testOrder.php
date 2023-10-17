<?php

class testOrder{
    public $userid;
    public $productid;

    public function __construct($testuserid, $testproductid){
        $this -> userid = $testuserid;
        $this -> productid = $testproductid;
    }
}