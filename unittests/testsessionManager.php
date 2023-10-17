<?php
include_once 'unittests/isessionmanager.php';

class testsessionManager implements isessionmanager{
    public $sqlQueries = array();  
    public $arrayToReturn = array();  
    public $objToReturn = null;

    public function GetLoginPassword(){
        array_push($this -> sqlQueries, "getLogInPassword");    
        return $this->objToReturn;
    }
    public function getCart(){
        array_push($this -> sqlQueries, "readCart");    
        return $this->arrayToReturn;
    }
    public function readCart(){
        array_push($this -> sqlQueries, "readCart");    
        return $this->arrayToReturn;
    }
    public function AddProductToCart(){
        array_push($this -> sqlQueries, "AddProductToCart");    
        return $this->arrayToReturn;
    }
    public function RemoveProductFromCart(){
        array_push($this -> sqlQueries, "AddProductToCart");    
        return $this->arrayToReturn;
    }
    public function getLogInUserId(){
        array_push($this -> sqlQueries, "getLogInUserId");    
        return $this->objToReturn;
    }
    public function CleanCart(){
        array_push($this -> sqlQueries, "CleanCart");    
        return $this->arrayToReturn;
    }
    public function LogoutUserSession(){
        array_push($this -> sqlQueries, "LogoutUserSession");    
        return $this->arrayToReturn;
    }
    public function LogInUserSession(){
        array_push($this -> sqlQueries, "LogInUserSession");    
        return $this->arrayToReturn;
    }
}