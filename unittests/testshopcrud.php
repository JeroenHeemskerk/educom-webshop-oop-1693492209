<?php 
class testshopcrud implements ishopcrud {  
    public $sqlQueries = array();  
    public $arrayToReturn = array();  
    public function getAllProducts() {
        array_push($this->$sqlQueries, "getAllProducts");    
        return $this->arrayToReturn;
    }
}