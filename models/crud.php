<?php
class crud {
    private function connection(){
        $servername = "localhost";
        $username = "stijn_webshop_educom";
        //super goed wachtwoord ik weet
        $sqlpassword = "Stijnstijn12";
        $dbname = "stijn_webshop";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $sqlpassword);
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
    private function prepareBindAndExecute($sql, $params = '') {
        $this -> conn = $this -> connection(); 
        $stmt = $this -> conn -> prepare($sql); 
        if(!empty($params)){
            foreach($params as $key => $value){ 
                $stmt -> bindValue(":".$key, $value); 
            } 
        }
        $stmt -> setFetchMode(PDO::FETCH_OBJ);
        $stmt -> execute();
        return $stmt; 
    }
    public function createrow($sql, $params){
        $this -> prepareBindAndExecute($sql, $params);
    }
    public function readOneRow($sql, $params){
        $stmt = $this -> prepareBindAndExecute($sql, $params);
        return $stmt -> fetch();
    }
    public function readMultipleRows($sql){
        $stmt = $this -> prepareBindAndExecute($sql);
        return $stmt -> fetchAll();
    }
    public function updaterow($sql, $params){
        $this -> prepareBindAndExecute($sql, $params);
    }
    public function deleterow($sql, $params){
        $this -> prepareBindAndExecute($sql, $params);
    }
}