<?php 
include_once 'unittests/ishopcrud.php';

class testshopcrud implements ishopcrud {  
    public $sqlQueries = array();  
    public $arrayToReturn = array();  
    public $objToReturn = null;

    public function readProductByProductId() {
        array_push($this -> sqlQueries, "readProductByProductId");    
        return $this->objToReturn;
    } 
    public function readAllProducts() {
        array_push($this -> sqlQueries, "readAllProducts");    
        return $this->arrayToReturn;
    }
    public function readTop5Products() {
        array_push($this -> sqlQueries, "readTop5Products");    
        return $this->arrayToReturn;
    }
    public function createOrder() {
        array_push($this -> sqlQueries, "createOrder");    
        return $this->objToReturn;
    }
}