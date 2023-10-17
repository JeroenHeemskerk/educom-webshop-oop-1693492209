<?php 
include_once 'unittests/iusercrud.php';

class testusercrud implements iusercrud {  
    public $sqlQueries = array();  
    public $arrayToReturn = array();  
    public $objToReturn = null;

    public function UpdateUser() {
        array_push($this -> sqlQueries, "UpdateUser");    
        return $this->objToReturn;
    } 
    public function SaveUser() {
        array_push($this -> sqlQueries, "SaveUser");    
        return $this->objToReturn;
    } 
    public function createUser() {
        array_push($this -> sqlQueries, "createUser");    
        return $this->objToReturn;
    } 
    public function readUserByUserId() {
        array_push($this -> sqlQueries, "readUserByUserId");    
        return $this->objToReturn;
    }
    public function readUserByEmail() {
        array_push($this -> sqlQueries, "readUserByEmail");    
        return $this->objToReturn;
    }
}